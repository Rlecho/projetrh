<?php
 require_once("identifier.php");
 require_once("connexiondb.php");

   // Sélectionner les détails personnels de l'employé
   $sql = "SELECT * FROM coordonnees WHERE idemp = :id_employe";
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':id_employe', $_SESSION['user']['idemp']);
   $stmt->execute();
   $coord = $stmt->fetch(PDO::FETCH_ASSOC);
 
   // Vérifier si les détails personnels existent
   if ($coord) {
       // Afficher les détails personnels dans les champs du formulaire
       $pays = $coord['pays'];
       $ville = $coord['ville'];
       $quartier = $coord['quartier'];
       $facebook_nom = $coord['facebook_nom'];
       $facebook_lien = $coord['facebook_lien'];
       $instagram_nom = $coord['instagram_nom'];
       $instagram_lien = $coord['instagram_lien'];
       $twitter_nom = $coord['twitter_nom'];
       $twitter_lien = $coord['twitter_lien'];
       $linkedin_nom = $coord['linkedin_nom'];
       $linkedin_lien = $coord['linkedin_lien'];
   } else {
       echo "Aucun détail personnel trouvé pour cet employé.";
   }
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
                <form id="coordForm" method="post" action="traitement_coord2.php">
    <div class="row">
        <!-- Première colonne -->
        
        <input type="hidden" name="id_employe" class="form-control" value="<?php echo $_SESSION['user']['idemp'];?>"  >
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-info" >Pays</label>
                <input type="text" name="pays" class="form-control" value="<?php echo $pays; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Ville</label>
                <input type="text" name="ville" class="form-control" value="<?php echo  $ville; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Quartier</label>
                <input type="text" name="quartier" class="form-control" value="<?php echo $quartier; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Nom de votre compte Facebook</label>
                <input type="text" name="facebook_nom" class="form-control" value="<?php echo $facebook_nom; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Lien de votre compte Facebook</label>
                <input type="text" name="facebook_lien" class="form-control" value="<?php echo $facebook_lien; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Nom de votre compte Twitter</label>
                <input type="text" name="twitter_nom" class="form-control" value="<?php echo  $twitter_nom; ?>"  >
            </div>
           
        </div>
        <!-- Deuxième colonne -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-info" >Lien de votre compte Twitter</label>
                <input type="text" name="twitter_lien" class="form-control" value="<?php echo  $twitter_lien; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Nom de votre compte LinkedIn</label>
                <input type="text" name="linkedin_nom" class="form-control" value="<?php echo $linkedin_nom; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Lien de votre compte LinkedIn</label>
                <input type="text" name="linkedin_lien" class="form-control" value="<?php echo $linkedin_lien; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Nom de votre compte Instagram</label>
                <input type="text" name="instagram_nom" class="form-control" value="<?php echo $instagram_nom; ?>"  >
            </div>
            <div class="form-group">
                <label class="text-info" >Lien de votre compte Instagram</label>
                <input type="text" name="instagram_lien" class="form-control" value="<?php echo $instagram_lien; ?>"  >
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="">
            <div class="form-group text-center">
                <input type="submit" class="btn app-btn-primary " value="Modifier">
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
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  </body>
</html>
