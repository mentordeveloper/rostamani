<?php

require( '../../app/config/constants.php');
require( '../../app/library/common.php');
require( '../../app/library/thumbnail.class.php');
// Define a destination
$name_d = '';
if (isset($_POST['name'])) {
    $name_d = $_POST['name'];
}
if (isset($_POST['timestamp'])) {
    $verifyToken = md5('unique_salt' . $_POST['timestamp']);
} else {
    header("location: http://" . $_SERVER['HTTP_HOST']);
    exit;
}
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    $path = $_REQUEST['path'];
    $type = $_REQUEST['type'];
    $hash = $_REQUEST['token'];
    $s_id = $_REQUEST['s_id'];
    if (isset($_POST['o_h']) && !empty($_POST['o_h']))
        $hash = $_POST['o_h'];


    $schooltargetFolder = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $s_id; // Relative to the root
//    $schooltargetFolder = $_SERVER['DOCUMENT_ROOT'] . 'uploads/' . $s_id; // Relative to the root
    $rtargetFolder = $schooltargetFolder . $path; // Relative to the root
    $ctargetFolder = '/uploads/' . $s_id . $path; // Relative to the root
    if (!is_dir($schooltargetFolder)) {
        @mkdir($schooltargetFolder, 0777);
        @chmod($schooltargetFolder, 0777);
        json_encode("directory_created" . $schooltargetFolder);
    }
    if (!is_dir($rtargetFolder)) {
        @mkdir($rtargetFolder, 0777);
        @chmod($schooltargetFolder, 0777);
        json_encode("directory_created" . $rtargetFolder);
    }

    $targetFolder = $rtargetFolder . '/' . $type; // Relative to the root
    $ftargetFolder = $ctargetFolder . '/' . $type; // Relative to the root

    if (!is_dir($targetFolder)) {
        @mkdir($targetFolder, 0777);
        @chmod($schooltargetFolder, 0777);
    }

    $targetFolder = $rtargetFolder . '/' . $type . '/' . date('Y-m-d'); // Relative to the root
    $ftargetFolder = $ctargetFolder . '/' . $type . '/' . date('Y-m-d'); // Relative to the root

    if (!is_dir($targetFolder)) {
        @mkdir($targetFolder, 0777);
        @chmod($schooltargetFolder, 0777);
    }

    $is_img = 2;
    $is_vid = 2;
    // Validate the file type
    $fileTypes = array('zip'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);

    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $targetFolder;

    $replace_arr = array(' ', '%', '_', '-', '+');
    $f_name_hash = str_replace($replace_arr, '-', $fileParts['filename']) . '_' . time() . '_' . rand(0, 5000);
//    $f_name_hash = md5($_FILES['Filedata']['name'] . '_' . time()) . '_' . rand(0, 5000);
    $file_name = $f_name_hash . '.' . $fileParts['extension'];
    $targetFile = rtrim($targetPath, '/') . '/' . $file_name;
    $targetZipFolder = rtrim($targetPath, '/') . '/' . $f_name_hash;
    $filePath = rtrim($ftargetFolder, '/') . '/' . $file_name;
    if (in_array($fileParts['extension'], $fileTypes)) {
        if (move_uploaded_file($tempFile, $targetFile)) {

            /*             * *****************************Un-zip the Product Images folder after uploading ******************************************************** */

            /* This panel of code for uploading Zip file of images and extract it dyanamically */

            // Extract a $targetFile and overwrite existing files. NOTE: It doesn't create a map with the zip-file-name!
            unzip($targetFile, false, true, true);
            /* Scan the extracted zip Folder for checking some basic files */


            $theme_query = '';
            $theme_folder = $targetZipFolder . '/';

            $data_theme = array();
            $file_flag = true;
            $dir_list = scandir($targetZipFolder);


            $files = glob($targetZipFolder . "/*");
            if (!empty($files) && is_array($files)) {
                $database = require( '../../app/config/database.php');
                if (is_array($database)) {
                    //  print_r($database);
                    $default = $database['default'];
                    $conn_arr = $database['connections'][$default];
                    $link = mysql_connect($conn_arr['host'], $conn_arr['username'], $conn_arr['password']) or die('Could not connect: ' . mysql_error());
                    mysql_query("SET NAMES utf8", $link);
                    mysql_select_db($conn_arr['database']) or die('Could not select database');
                    mysql_query("set character_set_results='utf8'", $link);
                }

                foreach ($files as $key => $dir_file_name) {
                    $file_flag = false;
                    if (!empty($dir_file_name) && ($dir_file_name != '.' || $dir_file_name != '..')) {
                        $file_path_arr = explode('/', $dir_file_name);
                        $new_file_name = strtolower($file_path_arr[sizeof($file_path_arr) - 1]);
                        unset($file_path_arr[sizeof($file_path_arr) - 1]);
                        $destinationPath = implode('/', $file_path_arr) . '/';
                        $res = resize_image($destinationPath, $new_file_name);
                        
                        $product_image = $ctargetFolder . '/products/'.$new_file_name;
                        $thumb_products_path = $ctargetFolder . '/products/'.$res;
                        $update_query = "Update products SET image='".$product_image."', thumb_image='".$thumb_products_path."' Where image_name = '".$new_file_name."'";
                        @mysql_query($update_query) or die(@mysql_error());
                        $file_flag = false;
                    }
                }
                @mysql_close();
            }
            if ($file_flag) {
                unlink($targetFile);
                recursiveRemoveDirectory($targetZipFolder);
                @unlink($targetZipFolder . "*"); # "*" being a match for all strings
                @rmdir($targetZipFolder);
                $data = array(
                    'response' => "2",
                    'msg' => "Error occured uploaded zip not contain any file",
                    'tdata' => $data_theme
                );
            } else {
                $view_theme_folder = '../../public' . $ctargetFolder . '/products';
                $data_theme['name'] = $view_theme_folder;
                $data_theme['image'] = '';
                $data_theme['main_page'] = '';
                /* recursivily copy files and folders in view dashboard folder */
                recurse_copy($targetZipFolder, $view_theme_folder);
                $data = array(
                    'response' => "1",
                    'msg' => "Zip Images Uploaded and set images respective products",
                    'tdata' => $data_theme
                );
            }
            echo json_encode($data);
        } else {
            $data = array(
                'response' => "3",
                'msg' => "Error occured zip not uploaded",
                'tdata' => $data_theme
            );
            echo json_encode($data);
        }
    } else {
        $data = array(
            'response' => "3",
            'msg' => "Invalid File Types",
            'tdata' => $data_theme
        );
        echo json_encode($data);
    }
}

/**
 * Unzip the source_file in the destination dir
 *
 * @param   string      The path to the ZIP-file.
 * @param   string      The path where the zipfile should be unpacked, if false the directory of the zip-file is used
 * @param   boolean     Indicates if the files will be unpacked in a directory with the name of the zip-file (true) or not (false) (only if the destination directory is set to false!)
 * @param   boolean     Overwrite existing files (true) or not (false)
 *
 * @return  boolean     Succesful or not
 */
function unzip($src_file, $dest_dir = false, $create_zip_name_dir = true, $overwrite = true) {
    if ($zip = zip_open($src_file)) {
        if ($zip) {
            $splitter = ($create_zip_name_dir === true) ? "." : "/";
            if ($dest_dir === false)
                $dest_dir = substr($src_file, 0, strrpos($src_file, $splitter)) . "/";

            // Create the directories to the destination dir if they don't already exist
            create_dirs($dest_dir);

            // For every file in the zip-packet
            while ($zip_entry = zip_read($zip)) {
                // Now we're going to create the directories in the destination directories
                // If the file is not in the root dir
                $pos_last_slash = strrpos(zip_entry_name($zip_entry), "/");
                if ($pos_last_slash !== false) {
                    // Create the directory where the zip-entry should be saved (with a "/" at the end)
                    create_dirs($dest_dir . substr(zip_entry_name($zip_entry), 0, $pos_last_slash + 1));
                }

                // Open the entry
                if (zip_entry_open($zip, $zip_entry, "r")) {

                    // The name of the file to save on the disk
                    $file_name = $dest_dir . zip_entry_name($zip_entry);

                    // Check if the files should be overwritten or not
                    if ($overwrite === true || $overwrite === false && !is_file($file_name)) {
                        // Get the content of the zip entry
                        $fstream = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

                        @file_put_contents($file_name, $fstream);
                        // Set the rights
                        @chmod($file_name, 0777);
//                        echo "save: " . $file_name . "<br />";
                    }

                    // Close the entry
                    zip_entry_close($zip_entry);
                }
            }
            // Close the zip-file
            zip_close($zip);
        }
    } else {
        return false;
    }

    return true;
}

/**
 * This function creates recursive directories if it doesn't already exist
 *
 * @param String  The path that should be created
 *
 * @return  void
 */
function create_dirs($path) {
    if (!is_dir($path)) {
        $directory_path = "";
        $directories = explode("/", $path);
        array_pop($directories);

        foreach ($directories as $directory) {
            $directory_path .= $directory . "/";
            if (!is_dir($directory_path)) {
                @mkdir($directory_path);
                @chmod($directory_path, 0777);
            }
        }
    }
}

function recursiveRemoveDirectory($directory) {
    foreach (glob("{$directory}/*") as $file) {
        if (is_dir($file)) {
            recursiveRemoveDirectory($file);
        } else {
            @unlink($file);
        }
    }
    @rmdir($directory);
}

/*
 * Recursivly copy folder from public uploads folder
 * views dashboard folder for custom themeing
 *
 */

function recurse_copy($src, $dst) {
    $dir = opendir($src);
    if (!is_dir($dst))
        @mkdir($dst);
    while (false !== ( $file = readdir($dir))) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    @closedir($dir);
}

function make_path_dynamic($filename = '', $db_path = false, $folder_name = '') {

    if (!empty($folder_name))
        $save_path = '/uploads/' . Auth::user()->s_id . '/' . Auth::user()->id . '/' . $folder_name . '/';
    else {
        $save_path = '/uploads/' . Auth::user()->s_id . '/' . Auth::user()->id . '/image/';
    }

    if ($db_path) {
        return $save_path;
    }

    return rtrim($_SERVER['DOCUMENT_ROOT'], '/') . $save_path . $filename;
}

/**
 * Resize an Product Image to max 100*100
 * @function resize_image
 * @params
 * $path : save file path
 * $image_path: image name
 *      */
function resize_image($path, $image_path) {

    $imageful = new Thumbnail($path . $image_path, 100, 0, 100, 100);
    $thumb_name = 'thumb_' . $image_path;
    $new_name = $path . $thumb_name;
    $response = $imageful->save($new_name);

    $imageful = new Thumbnail($path . $image_path, 200, 200, 100, 100);
    $name = 'medium_' . $image_path;
    $new_name = $path . $name;
    $response = $imageful->save($new_name);
    return $thumb_name;
}

// Extract C:/zipfiletest/zip-file.zip to C:/zipfiletest/zip-file/ and overwrites existing files
//unzip("C:/zipfiletest/zip-file.zip", false, true, true);
?>