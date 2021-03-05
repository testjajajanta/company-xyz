<?php
session_start();

// if session id is not existing / you did not log in
// if you can only create session id after successful log in
if(!$_SESSION['id']){
    header("location: loginRedirect.php");
    exit;
}

require_once "../classes/user.php";

$user = new User;
$user_list = $user->getUsers();
// $user_list contains the result from getUser 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h3">The company</h1>
        </a>
        <div class="ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link"><?= $_SESSION['username'] ?></a>
                </li>
                <li class="nav-item">
                    <a href="../actions/logout.php" class="nav-link text-danger">Log ont</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container" style="padding-top:80px;">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="../actions/register.php" method="post">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control mb-2" id="first_name" required autofocus>

                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" class="form-control mb-2" id="last_name" required>

                            <label for="username" class="font-weight-bold">Username</label>
                            <input type="text" name="username" class="form-control mb-2 font-weight-bold" id="username" maxlength="15" required>

                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control mb-5" id="password" minlength="8" required>

                            <button type="submit" class="btn btn-success btn-block" name="btn_register" value="dashboard">Register</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <h2 class="text-muted">User List</h2>
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th style="width:200px;"></th> <!-- for the action button -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP here -->
                        <?php
                        //fetch_assoc fetches the result row as an associative array
                        while($user = $user_list->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['first_name'] ?></td>
                                <td><?= $user['last_name'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td>
                                    <a href="editUser.php?user_id=<?= $user['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                                    <a href="../actions/removeUser.php?user_id=<?= $user['id'] ?>" class="btn btn-outline-danger btn-sm">Remove</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>