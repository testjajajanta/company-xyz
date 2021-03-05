<?php
session_start();
if(!$_SESSION['id']){
    header("location: loginRedirect.php");
    exit;
}
require_once "../classes/user.php";

$user_id = $_POST['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];

$user = new User;
$user->updateUser($user_id, $first_name, $last_name, $username);
