<?php
require( '../../app/config/constants.php');
require( '../../app/library/common.php');
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
    $user_id = $_REQUEST['u_id'];
    $type = $_REQUEST['type'];
    $hash = $_REQUEST['token'];
    $s_id = $_REQUEST['s_id'];
   

    $schooltargetFolder = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $s_id; // Relative to the root
    $rtargetFolder = $schooltargetFolder . $path; // Relative to the root
//    $rtargetFolder = $_SERVER['DOCUMENT_ROOT'] . '/uploads' . $path; // Relative to the root
    $ctargetFolder = 'uploads/' . $s_id . $path; // Relative to the root
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

    $fileTypes = array('csv', 'xlsx'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);

    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $targetFolder;

    $replace_arr = array(' ','%','_','-','+');
    $file_name = str_replace($replace_arr, '-', $fileParts['filename']) . '_' . time() . '_' . rand(0, 5000) . '.' . $fileParts['extension'];
    
//    $file_name = md5($_FILES['Filedata']['name'] . '_' . time()) . '_' . rand(0, 5000) . '.' . $fileParts['extension'];
    $targetFile = rtrim($targetPath, '/') . '/' . $file_name;
    $filePath = rtrim($ftargetFolder, '/') . '/' . $file_name;
//    $targetFile = ($targetPath) . '/' . $file_name;
//    $filePath = ($ftargetFolder) . '/' . $file_name;
    if (in_array($fileParts['extension'], $fileTypes)) {
        $id_inserted = '';
        if (move_uploaded_file($tempFile, $targetFile)) {
            $database = require( '../../app/config/database.php');
            if (is_array($database)) {
                //  print_r($database);
                $default = $database['default'];
                $conn_arr = $database['connections'][$default];
                $link = mysql_connect($conn_arr['host'], $conn_arr['username'], $conn_arr['password']) or die('Could not connect: ' . mysql_error());
                mysql_query("SET NAMES utf8", $link);
                mysql_select_db($conn_arr['database']) or die('Could not select database');
                mysql_query("set character_set_results='utf8'", $link);
                $query = "INSERT INTO import_file_record (path,hash,user_id,uploaded_date,created_at,updated_at) VALUES ("
                        . "'" . $filePath . "',"
                        . "'" . $hash . "',"
                        . "'" . $user_id . "',"
                        . "'" . date('Y-m-d H:i:s') . "',"
                        . "'" . date('Y-m-d H:i:s') . "',"
                        . "'" . date('Y-m-d H:i:s') . "'"
                        . ");";

                @mysql_query($query) or die(mysql_error());
                $id_inserted = mysql_insert_id();
                @mysql_close();
            }

            $data = array(
                'error' => false,
                'msg' => "file successfuly upload and inserted",
                'path' => $filePath,
                'id' => $id_inserted
            );
            echo json_encode($data);
        } else {
            $data = array(
                'error' => true,
                'msg' => "file not uploaded. try again later",
            );
            echo json_encode($data);
        }
    } else {
        $data = array(
            'error' => true,
            'msg' => "Invalid file type",
        );
        echo json_encode($data);
    }
}
?>