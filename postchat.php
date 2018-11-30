<?php

    include_once "db.php";

    $req = $db->prepare('INSERT INTO minichat (firsname, message) VALUES(?, ?)');
    $req->execute(array($_POST['firstname'], $_POST['message']));

    header('Location: chat.php');

?>