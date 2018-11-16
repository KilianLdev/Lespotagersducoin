<?php    

    //verifie où on commence
    function startsWith($string, $startString) {
        $len = strlen($startString); 
        return (substr($string, 0, $len) === $startString);
    }

    //lancement de la requete
    $sql = 'SELECT title, date, number, img_advert, CONCAT(profil.firstname, " ",profil.lastname) autor FROM advert a INNER JOIN profil ON profil.ID = a.autor WHERE 1';

    //request search
    if(isset($_GET['q']) AND !empty($_GET['q'])){
        $q= htmlspecialchars($_GET['q']);
        $sql .= ' AND title LIKE "%'.$q.'%"';
    }

    //récupération des cartes perso pour le profil
    if (startsWith(explode('/', $_SERVER['REQUEST_URI'])[2], 'profil.php')) {
        $sql .= ' AND a.autor = ' . $_SESSION['ID'];
    }

        $req = $db->prepare($sql);
        $req->execute();

        $results = $req->fetchAll(PDO::FETCH_ASSOC);

        //si aucun resultats
        if(sizeof($results) === 0) {
            echo "Désolé nous n'avons pas trouvé ce que vous cherchez";
        }
?>
<div class="row">
    <?php for ($i = 0; $i < sizeof($results); $i++)
        {
            $keys = array_keys($results[$i]); ?>
    <div class="col-sm-4">
        <div class="card">
        <div class="card-img" style="background-image:url(<?php echo $results[$i]["img_advert"];?>)">
        </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $results[$i]["title"]; ?></h5>
            <p class="card-text"> Date de publication : <?php echo $results[$i]["date"] ?></p>
            <p class="card-text"> Nombre de <?php echo $results[$i]["title"] . ": " . $results[$i]["number"]; ?></p>
            <p class="card-text"> Auteur : <?php echo $results[$i]["autor"]; ?></p>
            <a href="profil.php?autor" class="btn btn-primary">Contacter</a>
          </div> 
        </div>
    </div>
    <?php } ?>
</div>