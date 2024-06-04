
<?php 
require_once("identifier.php");

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
					<div class="auth-intro mb-4 text-center">Saisissez votre adresse électronique ci-dessous. Nous vous enverrons un lien vers une page où vous pourrez facilement créer un nouveau mot de passe.</div>
					<div class="auth-form-container text-left">				
						<form class="auth-form resetpass-form" action="reset-password-process.php" method="post">                
							<div class="email mb-3">
								<label class="sr-only" for="reg-email">Your Email</label>
								<input id="id" name="id" type="text" class="form-control login-email" value="<?php echo $_SESSION['user']['idemp']; ?>" readonly >
								<input id="reg-email" name="email" type="email" class="form-control login-email" placeholder="Your Email" required="required">
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Réinitialisation</button>
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
