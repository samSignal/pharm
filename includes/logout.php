<?php
session_start();

if (isset($_SESSION['first_name'])) {
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
}

session_destroy();
header('location: ../index.php');