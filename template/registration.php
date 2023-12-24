<?php
include("includes/header.php");

$state = new Auth;


if (isset($_POST["submit"])) {

    $user = [

        'firstname' => $_POST['fname'],
        'lastname' => $_POST['lname'],
        'email' => $_POST['email'],
        'username' => $_POST['uname'],
        'password' => $_POST['pwd']

    ];

    $result = $state->register($user);

    if ($result) {

        echo "
            <script>
                alert('successful')
            </script>
        ";

        header("Location: login.php");

    } else {

        echo "
            <script>
                alert('Not successful')
            </script>
        ";

    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
</head>

<body>

    <div
        class="container-fluid bg-dark text-white d-flex justify-content-between align-items-center align-contents-center">

        <div>
            <h1>LOGO</h1>
        </div>

        <div>
            <ul class="text-white">
                <li class="btn px-2 d-inline-block"><a class="text-white" href="index">Home</a></li>
                <li class="btn px-2 d-inline-block"><a class="text-white" href="registration">Get Started</a></li>
                <li class="btn px-2 d-inline-block"><a class="text-white" href="login">Login</a></li>
            </ul>
        </div>

    </div>


    <div class="container border border-secondary p-5 rounded mt-5">

        <h4 class="lead">Registration Form</h4>

        <form action="" method="post" class="form border border-secondary rounded showdow p-3 w-50 mx-auto">

            <div class="form-group">

                <input type="text" class="form-control" placeholder="FirstName" name="fname">

            </div>

            <div class="form-group">

                <input type="text" class="form-control" placeholder="lastName" name="lname">

            </div>

            <div class="form-group">

                <input type="email" class="form-control" placeholder="Email Address" name="email">

            </div>

            <div class="form-group">

                <input type="text" class="form-control" placeholder="Username" name="uname">

            </div>

            <div class="form-group">

                <input type="password" class="form-control" placeholder="Password" name="pwd">

            </div>

            <div class="form-group">

                <input type="password" class="form-control" placeholder="Confirm Password" name="conPwd">

            </div>

            <input type="submit" class="btn btn-primary" value="Submit" name="submit">

        </form>

    </div>


    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.bundle.js"></script>
</body>

</html>