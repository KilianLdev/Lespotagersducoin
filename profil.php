<!DOCTYPE html>
<?php 
    include_once "session.php";
    include_once "db.php";

    $user = 1;

    $sql = $db->query("SELECT * FROM profil");

    while ($donnees = $sql->fetch()){
?>
<html>
    <head>
        <title>Profil</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="public/style/style.css">
        <script type="text/javascript" src="public/js/main.js"></script>
    </head>

    <body class="home">
        <?php include_once "nav.php"; ?>

        <div class="container">    
            <?php if($user == $donnees['ID']){ ?>
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                        <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                        <div class="container" style="border-bottom:1px solid black">
                            <h2><?php echo $donnees['firstname']," ", $donnees['lastname'] ?></h2>
                        </div>
                        <hr>
                        <ul class="container details">
                            <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>Tel : <?php if($donnees['telephone'] != null){ echo $donnees['telephone']; } else{ echo 'Non Renseigné'; } ?></p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>Mail : <?php echo $donnees['mail']?></p></li>
                            <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span>Site : <a href="#">www.example.com</p></a>
                        </ul>
                </div>
            </div>
            <?php } ?>
        </div>
    </body>
</html>
<?php } ?>