<?php
include("includes/header.php");

$state = new Auth;
$state->logout();
header("Location: login");