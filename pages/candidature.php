<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>La page de candidature</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    

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
  <body>
    <?php include('menu.php');?>
    <br>
    <center>
      <h1 >Formulaire de candidature</h1>
    </center>
    
    <br> 
    <div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white" style='background-color: #28a745;border-color: #28a745;'>
                    <h3 class="text-center" style="color:#fff;">Formulaire de Candidature</h3>
                </div>
                <div class="card-body">
                    
            <form id="candidatureForm" name="candidatureForm" method="post" enctype="multipart/form-data" action="ajoutercandidature.php">
                
                <div class="row mb-3">
                    <div class="form-group col-md-6"> 
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Entrez votre prénom" required>     
                    </div>
                    <div class="form-group col-md-6"> 
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez votre nom" required>     
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="form-group col-md-6">
                        <label for="dateNaissance">Date de naissance</label>
                        <input type="date" name="date" id="dateNaissance" class="form-control" placeholder="Entrez votre date de naissance" required>   
                    </div>
                    <div class="form-group col-md-6">
                        <label for="genre">Genre</label>
                        <select name="genre" id="genre" class="form-control" required>
                            <option value="" disabled selected>Sélectionnez votre genre</option>
                            <option>Femme</option>
                            <option>Homme</option> 
                        </select>   
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre adresse email" required>   
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="Entrez votre numéro de téléphone" required>   
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="form-group col-md-6">
                        <label for="poste">Poste</label>
                        <input type="text" name="poste" id="poste" class="form-control" placeholder="Entrez le poste désiré" required>   
                    </div>
                    <div class="form-group col-md-6">
                        <label for="niveau">Niveau d'étude</label>
                        <input type="text" name="niveau" id="niveau" class="form-control" placeholder="Entrez votre niveau d'étude" required>   
                    </div>
                </div>
                
                    <div class=" row mb-3">
                        <label for="cv">CV (Format PDF)</label>
                        <input type="file" name="cv" id="cv" class="form-control" accept=".pdf" required>   
                    </div>

                    <div class="row mb-3">
                        <label for="lettreMotivation">Lettre de motivation (Format PDF)</label>
                        <input type="file" name="lettre" id="lettreMotivation" class="form-control" accept=".pdf" required>   
                    </div>
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <button type="submit" id="submitBtn" class="btn app-btn-primary btn-block theme-btn mx-auto">Soumettre</button>
                    </div>
                </div>    
            </form> 
            </div>
            </div>
        </div>
        <div class=" col-md-6">
            <div class="card h-100 ">
                <img src="../images/ay.jpg" class="card-img-top col-12 col-md-5 col-lg-6 h-100 auth-background-col align-content-end " alt="Image">
                <div class="card-body">
                    <!-- <p class="card-text">Description de l'image ou autre contenu ici.</p> -->
                </div>
            </div>
        </div>
    </div>
</div>
      
<script>
      document.querySelector('#soumettre').onclick = function(){
          var prenom = document.querySelector('#prenom').value,
          nom = document.querySelector('#nom').value,
          date = document.querySelector('#date').value,
          email = document.querySelector('#email').value,
          tel = document.querySelector('#tel').value,
          niveau = document.querySelector('#niveau').value,
          cv = document.querySelector('#cv').value,
          lettre = document.querySelector('#lettre').value,
          poste = document.querySelector('#poste').value;
         if(prenom=="" || nom=="" || date=="" || email=="" || tel=="" || niveau=="" || cv=="" || poste=="" || lettre==""){
             alert("vérifier que vous avez bien remplis tous les champs !");
             return false;
         }
         else return true;
      }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>
