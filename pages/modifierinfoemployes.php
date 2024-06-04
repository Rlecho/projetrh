<?php
 require_once("identifier.php");
 require_once("connexiondb.php");
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>modifier mes informations</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">

    

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

          .title-heading {
    border-bottom: 2px solid #19c576; /* Bordure inférieure bleue */
    padding-bottom: 5px; /* Espacement entre le texte et la bordure */
    background-color: #f8f9fa; /* Couleur de fond gris clair */
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
    <?php include('header.php');?>
    
    <div class="container">
    
    <div class="container mt-5 m-5 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <h2 class="text-center mb-4 title-heading">Modification des Informations</h2>

            <div class="card shadow">
                <div class="card-body">
                    <form id="updateProfileForm" method="post" action="modificationinfoemployes.php">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['user']['idemp'];?>">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user']['email'];?>">
                                </div> -->
                                
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $_SESSION['user']['nom'];?>">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $_SESSION['user']['dateNaissance'];?>">
                                </div>
                               <!-- <div class="mb-3">
                                    <label for="telephone" class="form-label">Téléphone</label>
                                    <input type="number" class="form-control" id="telephone" name="telephone" value="<?php echo $_SESSION['user']['telephone'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="dep" class="form-label">Département</label>
                                    <input type="text" class="form-control" id="dep" name="dep" value="<?php echo $_SESSION['user']['departement'];?>">
                                </div>
                                <div class="mb-3">
                                    <label for="poste" class="form-label">Poste</label>
                                    <input type="text" class="form-control" id="poste" name="poste" value="<?php echo $_SESSION['user']['poste'];?>">
                                </div>
                               
                            </div>

                            <div class="mb-3">
                                    <label for="mt" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="mt" name="mt" value="<?php echo $_SESSION['user']['motdepasse'];?>">
                                </div> -->
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



  </div>



  <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  

  </body>
</html>
