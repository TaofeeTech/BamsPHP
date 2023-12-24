<?php
include("includes/header.php");
session_start();

$state = new Auth;
$id = "user_id";
// echo $state->getSession($id);

if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true) {
    header("Location: index");
}

if (isset($_POST["submit"])) {

    $username = $_POST['uname'];
    $password = $_POST['pwd'];
    $remeber_me = $_POST['r_me'];

    $result = $state->login($username, $password, $remeber_me);

    if ($result) {

        echo "
            <script>
                alert('successful')
            </script>
        ";

        header("Location: index.php");

    } else {

        echo "
            <script>
                alert('Not successful')
            </script>
        ";

    }



}


?>


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

        <h4 class="lead">Login</h4>

        <form action="" method="post" class="form border border-secondary rounded showdow p-3 w-50 mx-auto">

            <div class="form-group">

                <input type="text" class="form-control" placeholder="Username" name="uname">

            </div>

            <div class="form-group">

                <input type="password" class="form-control" placeholder="Password" name="pwd">

            </div>

            <div class="form-check">

                <label class="form-check-label">

                    <input class="form-check-input" type="checkbox" name="r_me"> Remember me

                </label>

            </div>

            <input type="submit" class="btn btn-primary d-block mt-2" value="Login" name="submit">

        </form>

    </div>


    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.bundle.js"></script>
</body>

</html>