<?php    
    // lancement de la requete
    $sql = 'SELECT title, date, number, img_advert FROM advert';

    // $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    // $data = mysql_fetch_array($req); //resultat en tableau
    $req = $db->prepare($sql);
    $req->execute();

    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    //libération de l'espace alloué
    // mysql_free_result ($req);
    // mysql_close ();
    echo "<br />"; ?>
   <?php
    //  for ($i = 0; $i < sizeof($results); $i++)
    // {
    //     $keys = array_keys($results[$i]);
    //     for ($j = 0; $j < sizeof($keys); $j++)
    //     {
    //         echo  $results[$i][$keys[$j]];
    //         echo "<br />";
    //     }
    //     echo "<br />";
    // }  
    ?>
     <?php
?>
<div class="row">
<?php for ($i = 0; $i < sizeof($results); $i++)
    {
        $keys = array_keys($results[$i]); ?>
    <div class="col-sm-4">
        <div class="card">
        <div class="card-img" style="background-image:url(<?php echo $results[$i]["img_advert"];?>)">
        </div>
          <!-- <img class="card-img-top" src="<?php // echo $results[$i]["img_advert"];?>" alt="Card image cap"> -->
          <div class="card-body">
            <h5 class="card-title"><?php echo $results[$i]["title"]; ?></h5>
            <p class="card-text"> Date de publication : <?php echo $results[$i]["date"] ?></p>
            <p class="card-text"> Nombre de <?php echo $results[$i]["title"] . ": " . $results[$i]["number"]; ?></p>
            <a href="#" class="btn btn-primary">Contacter</a>
          </div> 
        </div>
    </div>
    <?php } ?>
</div>