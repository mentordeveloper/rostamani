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
    $type = '';
    $rtype = '';
    $hash = $_REQUEST['token'];
    $s_id = $_REQUEST['s_id'];
    if (isset($_POST['o_h']) && !empty($_POST['o_h']))
        $hash = $_POST['o_h'];

    
    $is_img = 2;
    $is_vid = 2;
    $is_audio = 2;
    $is_doc = 2;
    $cat = '';
    $fileTypes_main = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG','mp4', 'mp3', 'mov', 'flv','mp3', 'caf','doc', 'docx', 'txt', 'DOC', "DOCX", "TXT","pdf","PDF"); // File extensions
    // Validate the file type
    $fileParts = pathinfo($_FILES['Filedata']['name']);

    if (in_array($fileParts['extension'], $fileTypes_main)) {
        $fileTypes_img = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); // File extensions
        $fileTypes_doc = array('doc', 'docx', 'txt', 'DOC', "DOCX", "TXT","pdf","PDF"); // File extensions
        $fileTypes_audio = array('mp3', 'caf'); // File extensions
        $fileTypes_video = array('mp4', 'mp3', 'mov', 'flv'); // File extensions
        if (in_array($fileParts['extension'], $fileTypes_img)) {
            $is_img = 1;
            $type = 'Image';
            $rtype .= $cat . 'Image';
        } elseif (in_array($fileParts['extension'], $fileTypes_doc)) {
            $is_doc = 1;
            $type =  'doc';
            $rtype .= $cat .  'Text/Doc';
        } elseif (in_array($fileParts['extension'], $fileTypes_audio)) {
           $is_audio = 1;
           $type =  'Audio';
           $rtype .= $cat .  'Audio';
        } elseif (in_array($fileParts['extension'], $fileTypes_video)) {
            $is_vid = 1;
            $type = 'Video';
            $rtype .= $cat . 'Video';
        }
        $cat = ', ';
    } 


    $schooltargetFolder = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $s_id; // Relative to the root
    $rtargetFolder = $schooltargetFolder . $path; // Relative to the root
//    $rtargetFolder = $_SERVER['DOCUMENT_ROOT'] . '/uploads' . $path; // Relative to the root
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

    
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $targetFolder;

    $replace_arr = array(' ', '%', '_', '-', '+');
    $file_name = str_replace($replace_arr, '-', $fileParts['filename']) . '_' . time() . '_' . rand(0, 5000) . '.' . $fileParts['extension'];
    $targetFile = rtrim($targetPath, '/') . '/' . $file_name;
    $filePath = rtrim($ftargetFolder, '/') . '/' . $file_name;
    if (in_array($fileParts['extension'], $fileTypes_main)) {
        if (move_uploaded_file($tempFile, $targetFile)) {
            $database = require( '../../app/config/database.php');
            if (is_array($database)) {

                $default = $database['default'];
                $conn_arr = $database['connections'][$default];
                
                $link = mysql_connect($conn_arr['host'], $conn_arr['username'], $conn_arr['password']) or die('Could not connect: ' . mysql_error());
                mysql_query("SET NAMES utf8", $link);
                mysql_select_db($conn_arr['database']) or die('Could not select database');
                mysql_query("set character_set_results='utf8'", $link);
                $query = "INSERT INTO post_image_video (file_name,hash,path,extension,is_video,is_image,is_doc,is_audio,is_active,created_at,updated_at) VALUES ("
                        . "'" . $file_name . "',"
                        . "'" . $hash . "',"
                        . "'" . $filePath . "',"
                        . "'" . $fileParts['extension'] . "',"
                        . "'" . $is_vid . "',"
                        . "'" . $is_img . "',"
                        . "'" . $is_doc . "',"
                        . "'" . $is_audio . "',"
                        . "'1',"
                        . "'" . date('Y-m-d H:i:s') . "',"
                        . "'" . date('Y-m-d H:i:s') . "'"
                        . ");";

                @mysql_query($query) or die(mysql_error());
                @mysql_close();
            }
            $data = array(
                'response' => "1",
                'msg' => "Resoruce Uploaded successfully.",
                'type' => $rtype,
                'tdata' => $filePath
            );
            echo json_encode($data);
        } else {
            $data = array(
                'response' => "2",
                'msg' => "Resoruce Not Uploaded. Try Again.",
                'tdata' => ''
            );
            echo json_encode($data);
        }
    } else {
        $data = array(
            'response' => "2",
            'msg' => "Invalid file type.",
            'tdata' => ''
        );
        echo json_encode($data);
    }
}
elseif ($name_d == 'image_delete' && $_POST['token'] == $verifyToken) {
    $id = $_POST['id'];
    $database = require( '../../app/config/database.php');
    if (is_array($database)) {
        $default = $database['default'];
        $conn_arr = $database['connections'][$default];
        $link = mysql_connect($conn_arr['host'], $conn_arr['username'], $conn_arr['password']) or die('Could not connect: ' . mysql_error());
        mysql_query("SET NAMES utf8", $link);
        mysql_select_db($conn_arr['database']) or die('Could not select database');
        mysql_query("set character_set_results='utf8'", $link);
        $query = "select * FROM post_image_video WHERE id= " . $id;
        $res = @mysql_query($query) or die(mysql_error());
        if (@mysql_num_rows($res) > 0) {
            $row = @mysql_fetch_array($res, MYSQL_ASSOC);
            $query = "DELETE FROM post_image_video WHERE id= " . $id;
            @mysql_query($query);
            @mysql_close();
            $fileName = $row['path'];
            $filePath = $_SERVER['DOCUMENT_ROOT'] . $fileName;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            echo 1;
        } else {
            echo 2;
        }
    } else {
        echo 2;
    }
}
?>