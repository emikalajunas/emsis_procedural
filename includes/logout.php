<?php
// starts the session
session_start();

//if this page is loaded SESSION goes null (logs out) and redirects to index
$_SESSION['username' ] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname' ] = null;
$_SESSION['user_role'] = null;
header('Location: ../index.php');
?>
