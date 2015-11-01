<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* Encode a string
 * in a base64 key
 *  */

function encrpt_encode($str) {

    $res = '';
    if (!empty($str)) {
        $res = base64_encode(base64_encode($str));
    }
    return $res;
}

/* Encode a 2D-Array
 * in a base64 key
 *  */

function encrpt_array_encode($arr = array()) {

    $res = array();
    if (!empty($arr)) {
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $val[$k] = encrpt_encode($v);
            }
            $arr[$key] = $val;
        }
    }
    return $arr;
}

/* Encode a 1D-Array
 * in a base64 key
 *  */

function encrpt_1DArray_encode($arr = array()) {

    $res = array();
    if (!empty($arr)) {
        foreach ($arr as $key => $val) {
            $arr[$key] = encrpt_encode($val);
        }
    }
    return $arr;
}

/* Decode a 1D-Array
 * in a base64 key
 *  */

function dcrpt_1DArray_encode($arr = array()) {

    $res = array();
    if (!empty($arr)) {
        foreach ($arr as $key => $val) {
            $arr[$key] = dcrpt_decode($val);
        }
    }
    return $arr;
}

/* Decode a 2D-Array
 * in a base64 key
 *  */

function dcrpt_array_decode($arr = array()) {

    $res = array();
    if (!empty($arr)) {
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $val[$k] = dcrpt_decode($v);
            }
            $arr[$key] = $val;
        }
    }
    return $arr;
}

/* Decode the encoded string
 * in a base64 key
 *  */

function dcrpt_decode($encode_str) {

    $res = '';
    if (!empty($encode_str)) {
        $res = base64_decode(base64_decode($encode_str));
    }
    return $res;
}

/* Get School Id from Url */

function getSchoolID($s_name = '') {
    $server = explode('.', $_SERVER['HTTP_HOST']);
    $domain_name = '';
    if (!empty($s_name)) {
        $domain_name = $s_name;
    } else
        $domain_name = $server[0];
    $path_folder = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
    $sqlfile = $path_folder . 'sub_domain.txt';
    $fp = @fopen($sqlfile, "r");
    $contents = @fread($fp, filesize($sqlfile));
    @fclose($fp);
    $sub_domain_arr = json_decode($contents, true);
    $flag = false;
    $s_id = '';
    foreach ($sub_domain_arr as $sub_domain) {
        if (in_array($domain_name, $sub_domain)) {
            $flag = true;
            $s_id = $sub_domain['id'];
        }
    }
    return $s_id;
}

function getSubDomain() {
    $server = array();
    if (isset($_SERVER['HTTP_HOST']))
        $server = explode('.', $_SERVER['HTTP_HOST']);
    $domain_name = '';
    if (!empty($server[0]) && $server[0] != 'www') {
        $domain_name = $server[0];
    } else
        $domain_name = '';
    $path_folder = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
    $sqlfile = $path_folder . 'sub_domain.txt';
    $fp = @fopen($sqlfile, "r");
    $contents = @fread($fp, filesize($sqlfile));
    @fclose($fp);

    $sub_domain_arr = json_decode($contents, true);
    $flag = false;
    $s_id = '';
    $s_name = '';
    if (is_array($sub_domain_arr)) {
        foreach ($sub_domain_arr as $sub_domain) {
            if (in_array($domain_name, $sub_domain)) {
                $flag = true;
                $s_name = $sub_domain['sub_domain'];
            }
        }
    }
    return $s_name;
}

/* print the array in readable pattern */

function printr($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/*
 * Get Last running query
 *  *  */

function getLastQuery() {
    $queries = DB::getQueryLog();
    $last_query = end($queries);
    echo '<pre>';
    print_r($last_query);
    echo '</pre>';
//    exit;
}

/**
 * Send email using the lang sentence as subject and the viewname
 *
 * @param mixed $subject_translation
 * @param mixed $view_name
 * @param array $params
 * @return voi.
 */
function sendEmail($subject_translation, $view_name, $user, $params1 = array()) {

    $title = "AW Rostamani Lumina Management System";
    $user = $user;
    $email = '';
    $token = '';
    $html = '';
    if (isset($user['email_info'])) {
        $email = $user['email_info'];
    }else{
        $email ='mentordeveloper@gmail.com';
    }
    if (isset($params1['token'])) {
        $token = $params1['token'];
    } else {
        $token = '';
    }
    $params['params'] = $params1;
    $params['token'] = $token;
    $params['title'] = $title;
    $params['user'] = $user;
    $to = $email ;
    $subject = $subject_translation;
    $html = View::make($view_name, compact('params', 'user', 'title'))->render();
//    echo $html = (string) View::make($view_name, compact('params', 'user', 'title'));
//    exit;
    $message = $html;
    $headers = 'From: info@rostamani.ae' . "\r\n" .
            'Reply-To: mentordeveloper@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


    Mail::send($view_name, $params, function($m) use ($subject_translation, $user, $email, $title) {
        $m->to($email)
                ->subject($subject_translation);
    });
//    echo $html;
//    echo $email;
//    echo 'mail send';exit;
//    @mail($to, $subject, $message, $headers);
}


function folderSize($dir) {
    $count_size = 0;
    $count = 0;
    $dir_array = @scandir($dir);
    if (is_array($dir_array)) {
        foreach ($dir_array as $key => $filename) {
            if ($filename != ".." && $filename != ".") {
                if (@is_dir($dir . "/" . $filename)) {
                    $new_foldersize = foldersize($dir . "/" . $filename);
                    $count_size = $count_size + $new_foldersize;
                } else if (@is_file($dir . "/" . $filename)) {
                    $count_size = $count_size + filesize($dir . "/" . $filename);
                    $count++;
                }
            }
        }
    }

    return $count_size;
}

function sizeFormatWOT($bytes) {
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;

    if (empty($bytes))
        $bytes = 0;

    if (($bytes >= 0) && ($bytes < $kb)) {
        return $bytes;
    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
        return ceil($bytes / $kb);
    } elseif (($bytes >= $mb)) {
        return ceil($bytes / $mb);
    }  else {
        return $bytes;
    }
}
function sizeFormat($bytes) {
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;

    if (empty($bytes))
        $bytes = 0;

    if (($bytes >= 0) && ($bytes < $kb)) {
        return $bytes . ' B';
    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
        return ceil($bytes / $kb) . ' KB';
    } elseif (($bytes >= $mb) && ($bytes < $gb)) {
        return ceil($bytes / $mb) . ' MB';
    } elseif (($bytes >= $gb) && ($bytes < $tb)) {
        return ceil($bytes / $gb) . ' GB';
    } elseif ($bytes >= $tb) {
        return ceil($bytes / $tb) . ' TB';
    } else {
        return $bytes . ' B';
    }
}

function sizeFormatAdmin($bytes) {
    $kb = 1024;
    $mb = $kb * 1024;
    $gb = $mb * 1024;
    $tb = $gb * 1024;

    if (empty($bytes))
        $bytes = 0;

    if (($bytes >= 0) && ($bytes < $kb)) {
        return $bytes . ' B';
    } elseif (($bytes >= $kb) && ($bytes < $mb)) {
        return ceil($bytes / $kb) . ' KB';
    } elseif (($bytes >= $mb)) {
        return ceil($bytes / $mb) . ' MB';
    }  else {
        return $bytes . ' B';
    }
}

function sizeFormatReverse($bytes) {
    $kb = 1024;
    $mb = $kb / 1024;
    $gb = $mb / 1024;
    $tb = $gb / 1024;

    if (($bytes >= 0) && ($bytes < $kb)) {
        return $bytes . ' B';
    } elseif (($bytes < $kb) && ($bytes >= $mb)) {
        return ceil($bytes * $kb) . ' KB';
    } elseif (($bytes <= $mb) && ($bytes >= $gb)) {
        return ceil($bytes * $mb) . ' MB';
    } elseif (($bytes <= $gb) && ($bytes >= $tb)) {
        return ceil($bytes * $gb) . ' GB';
    } elseif ($bytes <= $tb) {
        return ceil($bytes * $tb) . ' TB';
    } else {
        return $bytes . ' B';
    }
}

function codeToMessageError($code) {
    switch ($code) {
        case UPLOAD_ERR_INI_SIZE:
            $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            break;
        case UPLOAD_ERR_PARTIAL:
            $message = "The uploaded file was only partially uploaded";
            break;
        case UPLOAD_ERR_NO_FILE:
            $message = "No file was uploaded";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $message = "Missing a temporary folder";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $message = "Failed to write file to disk";
            break;
        case UPLOAD_ERR_EXTENSION:
            $message = "File upload stopped by extension";
            break;

        default:
            $message = "Unknown upload error";
            break;
    }
    return $message;
}


function getLatLangAddress($address){
    $address_lat_lang = array();
    $url = 'http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false';
    $s_headers = array('Accept: application/json', 'Content-Type: application/json');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $s_headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_VERBOSE, 1);
    curl_setopt($curl, CURLOPT_HEADER, 1);
    curl_setopt($curl, CURLOPT_HTTPGET, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($curl);

    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $header_size);
    $body = substr($response, $header_size);
    curl_close($curl);
    if ($http_status == 200) {
        
        $results = json_decode($body, true);
        if(isset($results['results'][0]['geometry']['location']))
            $address_lat_lang = $results['results'][0]['geometry']['location'];
        return $address_lat_lang;
    } 
}

function currency_amount($amount){
    $amount = (doubleval($amount));
    return "$".number_format($amount, 2);
}
function currencyAmountWithOutSign($amount){
    $amount = (doubleval($amount));
    return number_format($amount, 2);
}

function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}


/**
 * functions for api response and push notification
 */

function set_success_result($key, $data, $message="") {
    $result = array();
    $result['status']	= "success";
    if($key != "") {
        $result['data']= $data;
    }
    $result['message'] = $message;

    $result = json_encode($result);
    echo $result;

}

function set_error_result($key, $data, $message="") {
    $result = array();
    $result['status']	= "Error";
    if($key != "") {
        $result['data']= $data;
    }
    $result['message'] = $message;

    $result = json_encode($result);
    echo $result;
}

function iphone_push_notification($deviceToken, $alert, $data, $badge = 0, $sound = "default") {

// Put your private key's passphrase here:
    $passphrase = '';

// Put your alert message here:
    $message = $alert;
    $user_id = isset($data['user_id'])?$data['user_id']:0;

////////////////////////////////////////////////////////////////////////////////

    $ctx = stream_context_create();
    stream_context_set_option($ctx, 'ssl', 'local_cert', 'pushcert.pem');
    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
    //stream_context_set_option($ctx, 'ssl', 'cafile', 'entrust_2048_ca.cer');

// Open a connection to the APNS server
    $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

    if (!$fp)
        return false;

// Create the payload body
    $body['aps'] = array(
        'alert' => $message,
        'sound' => 'default',
        'user_id' => $user_id
    );

// Encode the payload as JSON
    $payload = json_encode($body);

// Build the binary notification
    $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

// Send it to the server
    $result = fwrite($fp, $msg, strlen($msg));
    fclose($fp);

    if (!$result)
        return FALSE;
    else
        return true;
}
/*end Api functions*/

