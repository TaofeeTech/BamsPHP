<?php
include("includes/header.php");
session_start();

$state = new Auth;


if ($_SESSION['is_logged_in'] == false) {
    header("Location: login");
}

?>



<body>


    <div class="container-fluid bg-dark text-white d-flex justify-content-between align-items-center align-contents-center fixed-top shadow-lg"
        style="align-items: center;">

        <div>
            <h1>LOGO</h1>
        </div>

        <ul class="text-white">
            <li class="btn px-2 d-inline-block"><a class="text-white" href="index">Home</a></li>
            <li class="btn px-2 d-inline-block"><a class="text-white" href="registration">Get Started</a></li>
            <?php

            if ($_SESSION['is_logged_in'] == false) {

                echo "<li class='btn px-2 d-inline-block'><a class='text-white' href='login'>Login</a></li>";

            } else {

                echo "<li class='btn px-2 d-inline-block'><a class='text-white' href='dashboard'>Admin</a></li>";

                echo "<li class='btn px-2 d-inline-block'><a class='text-danger' href='logout'>Logout</a></li>";

            }

            ?>
        </ul>

    </div>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">

            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>

        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="w-100" style="object-fit: cover;" src="assets/images/denny-muller-HfWA-Axq6Ek-unsplash.jpg"
                    alt="Los Angeles">
            </div>

            <div class="carousel-item">
                <img class="w-100" style="object-fit: cover;" src="assets/images/fly-d-C5pXRFEjq3w-unsplash.jpg"
                    alt="Chicago">
            </div>

            <div class="carousel-item">
                <img class="w-100" style="object-fit: cover;"
                    src="assets/images/fotis-fotopoulos-6sAl6aQ4OWI-unsplash.jpg" alt="New York">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>


    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.bundle.js"></script>
</body>

</html>

<?php 
$id = "user_id";
echo $state->getSession($id);
?>