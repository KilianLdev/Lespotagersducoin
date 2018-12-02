<?php require "db.php"; 
$message_erreur = ""
?>
<!DOCTYPE html>
<html>
<head>
	<title>Potager</title>
	<meta charset="utf-8">
	<!-- link des autres pages -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="icon" type="image/jpg" href="public/img/logo.jpg" />
    <link rel="stylesheet" type="text/css" href="public/style/style.css">
    <script type="text/javascript" src="public/js/main.js"></script> 
</head>
<body>
	<?php include "header.php" ;?>
	<h1>Veuillez compléter tout les champs</h1>
		<form class="form" action="ajout.php" role="form" method="post" enctype="multipart/form-data">
			Nom<input type="number" name="nom" placeholder="nom">
			<span class="help-inline"><?php echo $message_erreur;?></span>
			<br />
			Quantité<input type="number" name="number" placeholder="quantité ">
			<span class="help-inline"><?php echo $message_erreur;?></span>
			<br />
			Poids au kilo<input type="number" name="weight" placeholder="poids/k">
			<span class="help-inline"><?php echo $message_erreur;?></span>
			<br />
			<label for="image">Sélectionner une image:</label>
            <input type="file" id="image" name="image"> <br />
			<label for="produits">Choisir quel produit à échanger :</label>
                <select  name="produits">
	                <?php        	
	                    $reponse = $db->query('SELECT DISTINCT title FROM advert');
	                 
	                    while ($donnees = $reponse->fetch())
	                    {

	                    echo "<option>" . $donnees['title'] . "</option>";

	                    }

	                ?>
       			 </select><br />

       		
                <br />
       		<button type="submit" class="bOui"> Ajouter</button>
            <a class="bNon" href="index.php">Retour</a>	
		</form>
		<?php include "footer.php" ; ?>
</body>
</html>