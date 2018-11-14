<?php    
// lancement de la requete
$sql = 'SELECT title, date, number, img_advert FROM advert WHERE 1';
if(isset($_GET['q']) AND !empty($_GET['q'])){
    $q= htmlspecialchars($_GET['q']);
    $sql .= ' AND title LIKE "%'.$q.'%"';
}

if (explode('/', $_SERVER['REQUEST_URI'])[2] == 'profil.php') {
    $sql .= ' AND autor = ' . $_SESSION;
}

    $req = $db->prepare($sql);
    $req->execute();

    $results = $req->fetchAll(PDO::FETCH_ASSOC);
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
            <a href="#" class="btn btn-primary">Contacter</a>
          </div> 
        </div>
    </div>
    <?php } ?>
</div>