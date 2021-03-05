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
    <title>Register</title>
</head>
<body class="bg-light">
    <div style="height:100vh">
        <div class="row h-100 n-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0">
                    <h1 class="text-center">REGISTER</h1>
                </div>
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

                        <button type="submit" class="btn btn-success btn-block" name="btn_register" value="register">Register</button>

                        <p class="text-center mt-3 small">Registered already? <a href="../views">Log in.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>