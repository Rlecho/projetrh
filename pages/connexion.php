<?php
session_start();
if(isset($_SESSION['erreurLogin']))
    $erreurLogin=$_SESSION['erreurLogin'];
else{
    $erreurLogin="";
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <title>Connexion</title>

    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <style>
       .body-padding {
            padding-top: -10px; /* Réglez la valeur de votre espace ici */
            padding-bottom: 0px; /* Réglez la valeur de votre espace ici */
        }
        .btn.app-btn-primary {
        background-color: #28a745; /* Couleur de fond initiale */
        color: #fff; /* Couleur du texte */
        border-color: #28a745; /* Couleur de la bordure */
    }

    .btn.app-btn-primary:hover {
        background-color: #28a745; /* Ne change pas au survol */
        border-color: #28a745; /* Ne change pas au survol */
        color:#fff;
    }
    </style>
</head>
<body class="app app-login p-0"> 
    <?php include('menu.php'); ?>
    <br>
    <div class="body-padding">
        <div class="row g-0 app-auth-wrapper ">
            <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-0">
                <div class="d-flex flex-column align-content-end">
                    <div class="app-auth-body mx-auto">
                        <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="accueil.php" style="text-decoration: none;" ><img class="logo-icon mr-2" style="height: 2.5cm; width:3.5cm" src="assets/images/logo1.png" alt="logo"></a>

                        </div>
                        <h2 class="auth-heading text-center mb-5">Se connecter</h2>
                        <div class="auth-form-container text-left">
                            <form class="auth-form login-form" method="post" action="seconnecter.php">
                                <?php if (!empty($erreurLogin)) { ?>
                                    <div class="alert alert-danger"><?php echo $erreurLogin; ?></div>
                                <?php } ?>
                                <div class="email mb-3">
                                    <label class="sr-only" for="signin-email">Email</label>
                                    <input id="signin-email" name="email" type="email" class="form-control signin-email" placeholder="Email address" required="required">
                                </div>
                                <div class="password mb-3">
                                    <label class="sr-only" for="signin-password">Password</label>
                                    <input id="signin-password" name="motdepasse" type="password" class="form-control signin-password" placeholder="Password" required="required">
                                </div>
                                
                              <div class="extra mt-3 row justify-content-between">
                                      <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                            <label class="form-check-label" for="RememberPassword">
                                            Souvenez-vous de moi
                                            </label>
                                        </div>
                                      </div><!--//col-6-->
                                      <div class="col-6">
                                        <div class="forgot-password text-right">
                                          <a href="reset-password.php">Mot de passe oublié ?</a>
                                        </div>
                                      </div><!--//col-6-->
                              </div><!--//extra-->

                              <div class="text-center">
                                    <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Connectez-vous</button>
                              </div>

                            </form>
                            <div class="auth-option text-center pt-5">Pas de compte ? Inscrivez-vous <a class="text-link" href="inscription.php">ici</a>.</div>
                        </div><!--//auth-form-container-->
                    </div><!--//app-auth-body-->

                </div><!--//flex-column-->
            </div><!--//auth-main-col-->
            <div class=" col-md-6">
            <div class="card h-90 ">
                <img src="../images/aay.jpg" class="card-img-top col-12 col-md-5 col-lg-6 h-90 auth-background-col align-content-end " alt="Image">
            </div>
        </div>
        </div>
    </div><!--//auth-background-col-->

</body>
</html>
