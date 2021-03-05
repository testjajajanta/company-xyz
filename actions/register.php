<?php
require_once "../classes/user.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$origin = $_POST['btn_register']; //$origin = "dashboard" / $origin = "register"

$user = new User;
$user->createUser($first_name,$last_name,$username,$password,$origin);
