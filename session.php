<?php
include_once "db.php";

$user = 3;
$_SESSION = $user;

    if(isset($_GET['logout'])) {
       setcookie("mail", "", time() - 3600, "/");
       setcookie("psw", "", time() - 3600, "/");

       session_destroy();

       header("Location: login.php");
     }
?>