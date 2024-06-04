<?php
require_once("connexiondb.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Vérification du token dans la base de données
    $sql_check_token = "SELECT * FROM employes WHERE token = :token";
    $stmt_check_token = $pdo->prepare($sql_check_token);
    $stmt_check_token->bindParam(':token', $token);
    $stmt_check_token->execute();
    $user = $stmt_check_token->fetch();

    if (!$user) {
        header("Location: reset-password-error.php");
        exit();
    }
} else {
    echo "Aucun token de réinitialisation trouvé.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en"> 
<!-- Mirrored from themes.3rdwavemedia.com/demo/portal/reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 13:45:52 GMT -->
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
</head> 
<body class="app app-reset-password p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index-2.html"><img class="logo-icon mr-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Réinitialisation du mot de passe</h2>
					<div class="auth-form-container text-left">				
						<form class="auth-form resetpass-form" action="reset-trai.php" method="post">                
							<div class="email mb-3">
								<label class="sr-only" for="reg-email">Nouveau Mot de passe</label>
								<input id="password" name="new_password" type="password" class="form-control login-email" placeholder="Nouveau mot de passe" required >
								<input id="password" name="confirm_password" type="password" class="form-control login-email" placeholder="Confirmer le mot de passe" required>
                                <input id="token" name="token" type="hidden" class="form-control " value="<?php echo $token; ?>">
                            </div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Réinitialiser le mot de passe</button>
							</div>
						</form>				
						<div class="auth-option text-center pt-5"><a class="app-link" href="connexion.php" >Se connecter</a> <span class="px-2">|</span> <a class="app-link" href="inscription.php" >S'inscrire</a></div>
					</div><!--//auth-form-container-->
			    </div><!--//auth-body-->  	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				  
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    </div><!--//row-->
</body>
<!-- Mirrored from themes.3rdwavemedia.com/demo/portal/reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 13:45:52 GMT -->
</html> 
