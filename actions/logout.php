<?php

session_start();
// $_SESSION['id'] = 3;

session_unset();
// $_SESSION['id'];
session_destroy();

header("location: ../views"); //go to index.php / Login
exit;


// Create
// $_SESSION = ['id'=> 3, 'username'=> 'harry'];

// Unset
// $_SESSION = ['id'=> , 'username'=> ];

// Destroy
// $_SESSION = [];