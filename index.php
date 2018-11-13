<?php
session_start();
include_once "db.php";
    if(isset($_GET['logout'])) {
       setcookie("mail", "", time() - 3600, "/");
       setcookie("psw", "", time() - 3600, "/");

       session_destroy();

       header("Location: login.php");
     }
include_once "nav.php";
?>
<html>
  <head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/style/style.css">
    <script type="text/javascript" src="public/js/main.js"></script>
  </head>
  <body class="home">

    <?php include_once "nav.php"; 
          include_once "listadvert.php";   ?>

  </body>
</html>