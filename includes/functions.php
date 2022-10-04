<?php
//Author - Edvinas
//Date 2020 02 26
//Directory includes
//Usage : various functions

//includes connection to all functions
include('db.php');

//function login to system form  20200226 version
{
function loginToSystem(){

//fixes scope off connection variable
global $conSecure;

//start SESSION
session_start();

//gets information from inputs
$username = $_POST['login_user'];
$user_email = $_POST['login_email'];
$password = $_POST['login_password'];

if((!empty($username)) && (!empty($username)) && (!empty($password))){

//cleans up inputs from SQL commands and starts query
$username = mysqli_real_escape_string($conSecure, $username);
$user_email = mysqli_real_escape_string($conSecure, $user_email);
$password = mysqli_real_escape_string($conSecure, $password);

//starts query where username from form is the same in DB
$query = "SELECT * FROM users WHERE username = '$username' ";
$user_select_query = mysqli_query($conSecure, $query);
while ($row = mysqli_fetch_array($user_select_query)) {
$db_username = $row['username'];
$db_username_email = $row['user_email'];
$db_password = $row['user_password'];
}

//checks the input name and password is OK or not and if OK starts SESSION
if($db_username === $username && $db_username_email === $user_email && password_verify($password, $db_password)){

$_SESSION['username']  = $db_username;
if(isset($_SESSION['username'])){
echo 'session username set';}
header("Location: main.php");
}
else {
$message = 'Neteisingi prisijungimo duomenys';
return $message;
}
}
}
}

//alert function with JavaScript 20200302
{
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
}

// function for tracking logged in users to system through SESSION 20200307
{
function howManyUsersLoggedIn(){
global $conSecure;
$session = session_id();
$time = time();
$time_out_in_seconds  = 10;
$time_out = $time - $time_out_in_seconds;

//caclulates the SESSION fits with some from DB: is it is NULL or has some VALUES
$query_session = "SELECT * FROM users_online WHERE session = '$session' ";
$send_query = mysqli_query($conSecure, $query_session);
$count = mysqli_num_rows($send_query);

if($count == NULL){

//if NULL Changes SESSION and TIME values to db
$new_values_query = "INSERT INTO users_online (session, time) VALUES ('$session', '$time')";
mysqli_query($conSecure, $new_values_query);
} else {

//if has some VALUE: UPDATES time for current SESSION field
$new_values_query = "UPDATE users_online SET time = '$time' WHERE session = '$session' ";
mysqli_query($conSecure, $new_values_query);
}

//checks witch USERS SESSION are less then 10 sec younger then time NOW, counts them and echoes
$users_on_query = "SELECT * FROM users_online WHERE time > '$time_out' ";
$users_online_query = mysqli_query($conSecure, $users_on_query);
$count_user = mysqli_num_rows($users_online_query);
return $count_user;
}
}



?>
