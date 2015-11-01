<?php
$dbs = '';
$db_name_data = 'mysql';

$db_password = '';
$server = array();
if(isset($_SERVER['HTTP_HOST'])){
    $server = explode(".",$_SERVER['HTTP_HOST']);
}
if(empty($server))
    $db_password = '';
elseif(isset($server[2]) && ($server[2]=='local'))
    $db_password = '';
elseif((isset($server[1])) && ($server[1]=='local'))
    $db_password = '';
else
    $db_password = 'admin';
$connnections_arr['mysql'] = array(
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'mc2_rustamani',
            'username' => 'root',
            'password' => $db_password,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        );
return array(
    /*
      |--------------------------------------------------------------------------
      | Database Connections
      |--------------------------------------------------------------------------
      |
      | Here are each of the database connections setup for your application.
      | Of course, examples of configuring each database platform that is
      | supported by Laravel is shown below to make development simple.
      |
      |
      | All database work in Laravel is done through the PHP PDO facilities
      | so make sure you have the driver for your particular database of
      | choice installed on your machine before you begin development.
      |
     */
    'default' => $db_name_data,
    'connections' => $connnections_arr,
);
