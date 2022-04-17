<?php
if (isset($_POST['submit'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    header('Location: ../dashboard.php');
} else {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    session_destroy();
    header('Location: https://dylanwe.com/login.php?error=1');
}