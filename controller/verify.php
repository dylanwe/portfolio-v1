<?php
include_once('model/model.php');
$db = new Database();
$loginCreds = $db->getTable('login');
$loginCreds = $loginCreds[0];

session_start();

if (password_verify($_SESSION['password'], $loginCreds['password']) && $_SESSION['username'] == $loginCreds['username']) {
    
} else {
    header('Location: https://dylanwe.com/login.php?error=1');
}