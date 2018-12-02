<?php 

require "db.php";

$nom  = $qtt = $poids = $produits = $image = $message_erreur = "";

if(!empty($_POST)) 
    {

        $nom  = checkInput($_POST['nom']);
        $qtt = checkInput($_POST['number']);
        $poids = checkInput($_POST['weight']);
        $produits = checkInput($_POST['produits']);
        $image              = checkInput($_FILES["image"]["name"]);
        $imageChemin       = './AdImages/'. basename($image);
        $imageExtension   = pathinfo($imageChemin,PATHINFO_EXTENSION);
        $message_erreur = 'Ce champ ne peut pas être vide';      
        $uploadSuccess    = true;
        
        if(empty($nom)) 
        {
            $message_erreur;
            $isSuccess = false;
        }else{
            $isSuccess = true;
        }


        if(!empty($qtt) or !empty($poids)) 
        {

            $isSuccess = true;
        }elseif (!empty($qtt) and !empty($poids)) {
            $isSuccess = true;
        }else{
            $isSuccess = false;
        }


        if(empty($image))
        {
            $message_erreur;
            $isSuccess = false;           
        }
        else
        {


        $uploadSuccess = true;

        if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $uploadSuccess = false;
            }
            
            if($_FILES["image"]["size"] > 5000000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $uploadSuccess = false;
            }
            if($uploadSuccess){
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imageChemin)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $uploadSuccess = false;
                } 
            } 
        }

        if($isSuccess == true && $uploadSuccess) 
        {
            $statement = $db->prepare("INSERT INTO advert (img_advert,title, `number`, weight, autor) values( '".$imageChemin."','" . $produits . "', '".$qtt."','".$poids."','".$nom."')");
            $statement->execute(array($imageChemin,$produits,$qtt,$poids,$nom));
            header("Location: index.php");
        }
    }

     function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>