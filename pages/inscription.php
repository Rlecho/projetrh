<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>inscription</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="assets/css/portal.css">
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .inscform{
            background: white;
            width: 55%;
            height: 100%;
            padding: 25px 25px 25px 25px;
            border-radius: 20px;
            margin-left: 300px;
          }
      .container img{
              width: 120px;
              height: 120px;
              margin-top: -30px;
              margin-bottom: 30px;
              margin-right: 100px;
              margin-left: 550px;
          }
          h1{
              text-align: center;
              margin-left: 100px;
          }
          .insc{
           text-align: right;
           margin-top: -30px;
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
    .auth-main-col {
            background-color: #f8f9fa;
            padding: 60px 30px;
        }
        .auth-form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.1);
            padding: 20px;
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
            padding: 1px;
            margin-bottom: 4px;
            width: 100%;
            font-size: 12px;
        }
        .auth-form .btn {
            border-radius: 8px;
            padding: 8px;
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
 <link href="navbar-top.css" rel="stylesheet">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
  </head>
  <body class="app app-signup p-0">
    <?php include('menu.php');?>
    <div class="row g-0 app-auth-wrapper">
<div class="col-10 col-md-7 col-lg-6 auth-main-col text-center p-5">
<div class="d-flex flex-column align-content-end">
<div class="app-auth-body mx-auto">    
<div class="app-auth-branding mb-4">
<a class="app-logo" href="index-2.html"><img class="logo-icon mr-2" src="assets/images/app-logo.svg" alt="logo"></a>
</div>
<h2 class="auth-heading text-center mb-4">Inscrivez-vous</h2>                    
<div class="auth-form-container text-left mx-auto " style='width:12cm;'>
<form class="auth-form auth-signup-form" enctype="multipart/form-data" method="post" action="ajouteremployes.php">
    <div class="row mb-1">
        <div class="form-group col-md-6"> <label>Nom d'utilisateur</label>
            <input id="signup-name" name="nom" type="text" class="form-control signup-name" placeholder="Nom complet" required="required">
        </div>
        <div class="form-group col-md-6"> <label>Email</label>
                <input id="signup-email" name="email" type="email" class="form-control signup-email" placeholder="Email" required="required">
        </div>
    </div>
    <div class="row mb-1">
        <div class="form-group col-md-6"><label>Date de naissance</label>
            <input type="date" name="date" class="form-control" id="date" placeholder="Date de naissance">
        </div>
        <div class="form-group col-md-6"> <label>Téléphone</label>
                <input type="number" name="telephone" class="form-control" id="tel" placeholder="Téléphone">
        </div>
    </div>
    <div class="row mb-1">
            <div class="form-group col-md-6">
                <label for="departement">Département</label>
                <select id="departement" name="departement" class="form-control" required>
                    <option value="">Sélectionnez un département</option>
                    <!-- Options des départements chargées dynamiquement en PHP -->
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="poste">Poste</label>
                <select id="poste" name="poste" class="form-control" required>
                    <option value="">Sélectionnez un poste</option>
                    <!-- Options des postes chargées dynamiquement en JavaScript -->
                </select>
            </div>
    </div>
    <div class="row mb-1">
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
<div class="extra mb-2">
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
<div class="auth-option text-center pt-0">Vous avez déjà un compte? <a class="text-link" href="connexion.php" >Connectez-Vous</a></div>
</div>
</div>
</div>   
</div>
<div class=" col-md-6">
            <div class="card h-90 ">
                <img src="../images/dd.jpg" class="card-img-top col-12 col-md-5 col-lg-6 h-90 auth-background-col align-content-end " alt="Image">
            </div>
        </div>
</div><!--//row-->
<script>
    // Fonction pour charger les options des départements et des postes depuis le JSON
    function chargerDepartementsEtPostes() {
        // Envoyer une requête HTTP GET pour récupérer les données JSON
        fetch('charger_departements_postes.php')
        .then(response => response.json())
        .then(data => {
            // Sélectionner l'élément HTML du département
            let selectDepartement = document.getElementById('departement');
            // Vider le contenu actuel du sélecteur
            selectDepartement.innerHTML = '<option value="">Sélectionnez un département</option>';
            
            // Sélectionner l'élément HTML du poste
            let selectPoste = document.getElementById('poste');
            // Vider le contenu actuel du sélecteur
            selectPoste.innerHTML = '<option value="">Sélectionnez un poste</option>';
            
            // Parcourir les données JSON pour ajouter les options de département
            Object.keys(data).forEach(nomDepartement => {
                selectDepartement.innerHTML += `<option value="${nomDepartement}">${nomDepartement}</option>`;
            });
            
            // Écouter les changements sur le sélecteur de département pour charger les options des postes correspondants
            selectDepartement.addEventListener('change', function() {
                let nomDepartement = this.value;
                if (nomDepartement) {
                    // Vider le sélecteur de poste actuel
                    selectPoste.innerHTML = '<option value="">Sélectionnez un poste</option>';
                    
                    // Récupérer les postes associés au département sélectionné
                    let postes = data[nomDepartement];
                    
                    // Ajouter les options de poste dans le sélecteur correspondant
                    postes.forEach(nomPoste => {
                        selectPoste.innerHTML += `<option value="${nomPoste}">${nomPoste}</option>`;
                    });
                } else {
                    // Si aucun département n'est sélectionné, vider le sélecteur de poste
                    selectPoste.innerHTML = '<option value="">Sélectionnez un poste</option>';
                }
            });
        })
        .catch(error => {
            console.error('Erreur lors du chargement des départements et postes :', error);
        });
    }

    // Appeler la fonction pour charger les options des départements et des postes au chargement de la page
    window.onload = function() {
        chargerDepartementsEtPostes();
    }


    document.querySelector('#inscrire').onclick = function(){
        var password = document.querySelector('#password').value,
            confirmpassword = document.querySelector('#confirmpassword').value,
            photo = document.querySelector('#photo').value,
            email = document.querySelector('#email').value,
            date = document.querySelector('#date').value,
            nom = document.querySelector('#nom').value,
            tel = document.querySelector('#tel').value,
            dep = document.querySelector('#departement').value, // Utiliser la valeur sélectionnée dans la liste déroulante du département
            poste = document.querySelector('#poste').value; // Utiliser la valeur sélectionnée dans la liste déroulante du poste

        if(password=="" || photo=="" || email=="" || date=="" || nom=="" || tel=="" || dep=="" || poste==""){
            alert("Veuillez remplir tous les champs !");
            return false;
        } else if(password != confirmpassword){
            alert("Les mots de passe ne correspondent pas. Veuillez réessayer !");
            return false;
        } else {
            return true;
        }
    }

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  </body>
</html>
