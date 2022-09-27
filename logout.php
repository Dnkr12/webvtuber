<?php


session_start();
session_destroy();

if(isset($_COOKIE['name'])){
    setcookie('name', '', time() - 60);
}

header("location:login.php");
exit();
