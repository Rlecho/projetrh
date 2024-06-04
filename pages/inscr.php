<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        .auth-main-col {
            background-color: #f8f9fa;
            padding: 60px 30px;
        }
        .auth-form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }
        .auth-heading {
            color: #343a40;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
        }
        .auth-form input[type="text"],
        .auth-form input[type="email"],
        .auth-form input[type="password"],
        .auth-form input[type="number"] {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 14px;
            margin-bottom: 20px;
            width: 100%;
            font-size: 16px;
        }
        .auth-form .btn {
            border-radius: 8px;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
        }
        .auth-option {
            color: #6c757d;
            margin-top: 20px;
        }
        .auth-option a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body class="app app-signup p-0">
<div class="row g-0 app-auth-wrapper">
<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
<div class="d-flex flex-column align-content-end">
<div class="app-auth-body mx-auto">    
<div class="app-auth-branding mb-4">
<a class="app-logo" href="index-2.html"><img class="logo-icon mr-2" src="assets/images/app-logo.svg" alt="logo"></a>
</div>
<h2 class="auth-heading text-center mb-4">Inscrivez-vous</h2>                    

<div class="auth-form-container text-left mx-auto " style='width:12cm;'>
<form class="auth-form auth-signup-form" enctype="multipart/form-data" method="post" action="ajouteremployes.php">


    <div class="row mb-0">

        <div class="form-group col-md-6"> <label>Nom d'utilisateur</label>
            <input id="signup-name" name="nom" type="text" class="form-control signup-name" placeholder="Nom complet" required="required">
        </div>

        <div class="form-group col-md-6"> <label>Email</label>
                <input id="signup-email" name="email" type="email" class="form-control signup-email" placeholder="Email" required="required">
        </div>
    
    </div>

    <div class="row mb-0">
        <div class="form-group col-md-6"><label>Date de naissance</label>
            <input type="date" name="date" class="form-control" id="date" placeholder="Date de naissance">
        </div>

        <div class="form-group col-md-6"> <label>Téléphone</label>
                <input type="number" name="telephone" class="form-control" id="tel" placeholder="Téléphone">
        </div>
    
    </div>

    <div class="row mb-0">
        <div class="form-group col-md-6"><label>Département</label>
            <input type="text" name="dep" class="form-control" id="dep" placeholder="Département">
        </div>
        <div class="form-group col-md-6"> <label>Poste</label>
            <input type="text" name="poste" class="form-control" id="poste" placeholder="Poste">
        </div>
    </div>

    <div class="row mb-0">
        <div class="form-group col-md-6"><label>Mot de passe</label>
            <input type="password" name="mt" class="form-control" id="password" placeholder="Mot de passe">   
        </div>
        <div class="form-group col-md-6"> <label>Confirmer Mot de passe</label>
            <input type="password" name="confirmer le mot de passe" class="form-control" id="confirmpassword" placeholder="Confirmer le mot de passe"> 
        </div>
    </div>
<div class="mb-1">
<label >Photo</label>
        <input type="file" name="photo" class="form-control" id="photo" placeholder="photo"> 
</div>

<div class="extra mb-0">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
        <label class="form-check-label" for="RememberPassword">
        J'accepte les <a href="#" class="app-link">conditions d'utilisation</a> et la <a href="#" class="app-link">politique de confidentialité</a> de Portal.
        </label>
    </div>
</div>
<div class="text-center">
    <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">S'inscrire</button>
</div>
</form>

<div class="auth-option text-center pt-5">Vous avez déjà un compte? <a class="text-link" href="login.html" >Connectez-Vous</a></div>
</div>
</div>
</div>   
</div>
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
</html>
