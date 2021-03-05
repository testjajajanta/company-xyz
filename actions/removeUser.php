<?php
session_start();
if(!$_SESSION['id']){
    header("location: loginRedirect.php");
    exit;
}


include_once "../classes/user.php";

$user = new User;
$user_id = $_GET['user_id'];
$user->deleteUser($user_id);