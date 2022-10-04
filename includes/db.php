<?php
//author Edvinas
//date 2020 02 26
//connection file to emsis system

//more secure connection example
$db['db_host'] = 'localhost';
$db['db_username'] = 'root';
$db['db_password'] = '';
$db['db_name'] = 'addparklt_emsis';
foreach($db as $key => $value){
    define(strtoupper($key), $value);
}
$conSecure = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>
