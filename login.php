<!-- Creation de compte -->
<?php
session_start();

include_once "db.php";

if(isset($_POST['createAccount'])) {
  
  $password = $_POST['psw'];
  $hash = hash("sha256", $password . $_POST['mail']);//Mot de passe crypter
  if(
    strlen($_POST['mail']) > 0
    && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)
    && strlen($_POST['firstname']) > 0 
    && strlen($_POST['lastname']) > 0
    ){
        $req = $db->prepare("INSERT INTO profil (lastname, firstname, psw, mail) VALUES(:lastname, :firstname, :psw, :mail)");
        $req->execute(array(
          "lastname"  => $_POST['lastname'],
          "firstname" => $_POST['firstname'],
          "mail"      => $_POST['mail'],
          "psw"       => $hash));
          $req->rowCount(); //verifie la creation du compte en retournant 1
      }else{
        echo "Veuillez remplir vos champs correctement s'il vous plaît !";
      }
}

/****** COOKIE *******/
if(isset($_POST['login'])) {
  login($_POST['mail'], $_POST['psw']);
}else {
  if(isset($_COOKIE['mail']) && isset($_COOKIE['psw'])) {
    login($_COOKIE['mail'], $_COOKIE['psw'], true);
  }
}

function login($mail, $psw, $fromCookie = false) {
  $db = $GLOBALS['db'];
  if($fromCookie == true) {$hash = $psw;}
  else {$hash = hash("sha256", $psw . $_POST['mail']);}

  $req = $db->prepare("SELECT * FROM profil WHERE mail = :mail AND psw = :psw");
  $req->execute(array(
        "mail"  => $mail,
        "psw"   => $hash));
  $dataUser = $req->fetch();

  if($req->rowCount() == 1) {
    setcookie("mail", $mail, time() + (86400 * 30), "/"); // 86400 = 1 jour
    setcookie("psw", $hash, time() + (86400 * 30), "/"); // 86400 = 1 jour

    $_SESSION['ID'] = intval($dataUser['ID']);
    header("Location: index.php"); // Lorsque log envoie vers la page Index
  }else {
    echo "Identifiant ou mot de passe incorrect.";

  }
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
  <body class="login">
    <section class="section-login">
    <div class="container container-login">
			<div class="row">
          
          <div class="col-md-8 block-left-login">
             <h1>Les potagers du coin</h1>
             <h2>Partager et échanger facilement !</h2>
             <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, comme Aldus PageMaker.</p>
          </div>
      
      
         <div class="col-md-4 block-right-login">
            <div class="panel panel-login" style="padding: 15px;">
                <div class="panel-heading">
                  <div class="row">
                      <div class="col-md-6 border-nav-form">
                        <a href="#" class="active" id="login-form-link">Login</a>
                      </div>
                      <div class="col-md-6">
                        <a href="#" id="register-form-link">Register</a>
                      </div>
                  </div>
                  <hr>
                </div>
                <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                            <div class="form-group">
                              <input type="mail" name="mail" tabindex="1" class="form-control" placeholder="mail">
                            </div>
                            <div class="form-group">
                              <input type="password" name="psw" tabindex="2" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <input type="submit" name="login" tabindex="4" class="form-control btn btn-login" value="Log In">
                                  </div>
                              </div>
                            </div>
                        </form>
                        <form id="register-form" action="" method="post" role="form" style="display: none;">
                            <div class="form-group">
                              <input type="text" required name="lastname"  tabindex="1" class="form-control" placeholder="lastname">
                            </div>
                            <div class="form-group">
                              <input type="text" required name="firstname"  tabindex="1" class="form-control" placeholder="firstname">
                            </div>
                            <div class="form-group">
                              <input type="mail" required name="mail"  tabindex="1" class="form-control" placeholder="mail">
                            </div>
                            <div class="form-group">
                              <input type="password" required name="psw"  tabindex="2" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <input type="submit" name="createAccount" tabindex="4" class="form-control btn btn-register" value="Register Now">
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
    <div class="filter"></div>
</section>
  </body>
</html>
