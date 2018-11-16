<!-- Creation de d'annonces -->
<?php
    include_once "session.php";

    if(isset($_POST['createAdvert'])) {
  
              $req = $db->prepare("INSERT INTO advert (produit, number, weight, date) VALUES(:title, :number, :date, :weight)");
              $req->execute(array(
                "produit"=> $_POST['title'],
                "number" => $_POST['number'],
                "weight" => $_POST['weight'],
                "date"   => $_POST['date'];
            }

?>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="icon" type="image/jpg" href="public/img/logo.jpg" />
    <link rel="stylesheet" type="text/css" href="public/style/style.css">
    <script type="text/javascript" src="public/js/main.js"></script>
  </head>
  <body class="advert">
    <div class="container">
			<div class="row">
          <div class="col-md-4 offset-md-8">
            <div class="panel panel-login" style="padding: 15px;">
                <div class="panel-heading">
                  <div class="row">
                      <div class="col-md-6">
                        <a href="#" id="register-form-link">Register</a>
                      </div>
                  </div>
                  <hr>
                </div>
                <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                        <form id="register-form" action="" method="post" role="form" style="display: none;">
                            <div class="form-group">
                              <input type="text" required name="produit"  tabindex="1" class="form-control" placeholder="produit">
                            </div>
                            <div class="form-group">
                              <input type="text" required name="nombre"  tabindex="1" class="form-control" placeholder="nombre de produits">
                            </div>
                            <div class="form-group">
                              <input type="text" required name="masse"  tabindex="1" class="form-control" placeholder="masse en kg">
                            </div>
                            <div class="form-group">
                              <input type="date" required name="date"  tabindex="2" class="form-control" placeholder="date">
                            </div>
                            <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-6 col-sm-offset-3">
                                    <input type="submit" name="createAdvert" tabindex="4" class="form-control btn btn-register" value="Créer">
                                  </div>
                              </div>
                            </div>
                        </form>
                      </div>
                  </div>
                </div>
            </div>
          </div>
			</div>
		</div>
  </body>
</html>
