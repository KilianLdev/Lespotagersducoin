<!DOCTYPE html>
<?php

    include_once "db.php";

    $reponse = $db->query('SELECT firstname, message FROM chat ORDER BY ID DESC LIMIT 0, 10');

    while ($donnees = $reponse->fetch()){
        echo '<p><strong>' . htmlspecialchars($donnees['firstname']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
    }
    $reponse->closeCursor();

?>
<head>
    <title>Les Potagers: chat</title>
</head>
<html>
    <body>
        <form action="postchat.php" method="post">
        <p>
        <label for="firstname">Prénom</label> : <input type="text" name="firstname" id="firstname" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>
    </body>
</html>