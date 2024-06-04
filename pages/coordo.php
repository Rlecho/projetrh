<?php
  require_once("identifier.php");
  require_once("connexiondb.php");
      
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete="select * from employes where idemp=$idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();


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
      echo "Aucun détail personnel.";
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
    <title>modifier employés</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
    <div class="app-wrapper">
                <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="col-md-12">
<div class="row">
                    <!-- Première ligne de liens -->
                    <?php include('a.php');?>
</div>

<div>

<div class="row d-flex">
    <div class="col-6"><hr style='height: 2px;background-color:green'></div>
    <div class="col-6"><hr style="background-color:green; height:2px"></div>
</div>

<div>
  <h3 class="mt-2">Vos informations </h3>
</div>
<form id="coordForm" method="post" action="traitement_coord1.php">
    <div class="row">
        <!-- Première colonne -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-info" >Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['user']['email']; ?>" readonly >
            </div>
        </div>
        <!-- Deuxième colonne -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-info" >Mobile téléphone</label>
                <input type="text" name="mobile_telephone" class="form-control" value="<?php echo $_SESSION['user']['telephone']; ?>" readonly >
            </div>
            
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="submit" class="btn app-btn-primary" value="Modifier">
            </div>
        </div>
    </div>
</form>



<div class="row d-flex">
    <div class="col-6"><hr style='height: 2px;background-color:green'></div>
    <div class="col-6"><hr style="background-color:green; height:2px"></div>
</div>


<div>
  <h3 class="mt-2">Vos informations </h3>
</div>
<form id="coordForm" method="post" action="modifierinfoemployes3.php">
    <div class="row">
        <!-- Première colonne -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-info" >Pays</label>
                <input type="text" name="pays" class="form-control" value="<?php echo isset($pays) ? $pays : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Ville</label>
                <input type="text" name="ville" class="form-control" value="<?php echo isset($ville) ? $ville : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Quartier</label>
                <input type="text" name="quartier" class="form-control" value="<?php echo isset($quartier) ? $quartier : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Nom de votre compte Facebook</label>
                <input type="text" name="facebook_nom" class="form-control" value="<?php echo isset($facebook_nom) ? $facebook_nom : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Lien de votre compte Facebook</label>
                <input type="text" name="facebook_lien" class="form-control" value="<?php echo isset($facebook_lien) ? $facebook_lien : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Nom de votre compte Twitter</label>
                <input type="text" name="twitter_nom" class="form-control" value="<?php echo isset($twitter_nom) ? $twitter_nom : ''; ?>" readonly >
            </div>
           
        </div>
        <!-- Deuxième colonne -->
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-info" >Lien de votre compte Twitter</label>
                <input type="text" name="twitter_lien" class="form-control" value="<?php echo isset($twitter_lien) ? $twitter_lien : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Nom de votre compte LinkedIn</label>
                <input type="text" name="linkedin_nom" class="form-control" value="<?php echo isset($linkedin_nom) ? $linkedin_nom : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Lien de votre compte LinkedIn</label>
                <input type="text" name="linkedin_lien" class="form-control" value="<?php echo isset($linkedin_lien) ? $linkedin_lien : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Nom de votre compte Instagram</label>
                <input type="text" name="instagram_nom" class="form-control" value="<?php echo isset($instagram_nom) ? $instagram_nom : ''; ?>" readonly >
            </div>
            <div class="form-group">
                <label class="text-info" >Lien de votre compte Instagram</label>
                <input type="text" name="instagram_lien" class="form-control" value="<?php echo isset($instagram_lien) ? $instagram_lien : ''; ?>" readonly >
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


<div class="row d-flex">
    <div class="col-6"><hr style='height: 2px;background-color:green'></div>
    <div class="col-6"><hr style="background-color:green; height:2px"></div>
</div>

<div>
  <h3 class="mt-2">Ajouter Vos informations </h3>
</div>
<form id="coordForm" method="post" action="traitement_coord.php">
    <div class="row">
        <!-- Première colonne -->
        <div class="col-md-6">
            <div class="form-group"><input type="hidden" name="id" value="<?php echo $_SESSION['user']['idemp'];?>">
                <label>Pays</label>
                <input type="text" name="pays" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Ville</label>
                <input type="text" name="ville" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Quartier</label>
                <input type="text" name="quartier" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Nom de votre compte Facebook</label>
                <input type="text" name="facebook_nom" class="form-control">
            </div>
            <div class="form-group">
                <label>Lien de votre compte Facebook</label>
                <input type="text" name="facebook_lien" class="form-control">
            </div>
            <div class="form-group">
                <label>Nom de votre compte Twitter</label>
                <input type="text" name="twitter_nom" class="form-control">
            </div>
           
        </div>
        <!-- Deuxième colonne -->
        <div class="col-md-6">
            <div class="form-group">
                <label>Lien de votre compte Twitter</label>
                <input type="text" name="twitter_lien" class="form-control">
            </div>
            <div class="form-group">
                <label>Nom de votre compte LinkedIn</label>
                <input type="text" name="linkedin_nom" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Lien de votre compte LinkedIn</label>
                <input type="text" name="linkedin_lien" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Nom de votre compte Instagram</label>
                <input type="text" name="instagram_nom" class="form-control">
            </div>
            <div class="form-group">
                <label>Lien de votre compte Instagram</label>
                <input type="text" name="instagram_lien" class="form-control">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group text-center">
                <input type="submit" class="btn app-btn-primary " value="Enregistrer">
            </div>
        </div>
    </div>
</form>

</div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
