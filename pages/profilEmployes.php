<?php
require_once("identifier.php");
require_once("connexiondb.php");
// Requête SQL pour compter le nombre de congés
$queryConges = "SELECT COUNT(*) AS total_conges FROM conges WHERE idemp = :idemp";
$stmtConges = $pdo->prepare($queryConges);
$stmtConges->execute(['idemp' => $_SESSION['user']['idemp']]); // Remplacez $id_de_l_employe par l'ID de l'employé en question
$totalConges = $stmtConges->fetch(PDO::FETCH_ASSOC)['total_conges'];
// Requête SQL pour compter le nombre de formations
$queryFormations = "SELECT COUNT(*) AS total_formations FROM formations WHERE idemp = :idemp";
$stmtFormations = $pdo->prepare($queryFormations);
$stmtFormations->execute(['idemp' => $_SESSION['user']['idemp']]); // Remplacez $id_de_l_employe par l'ID de l'employé en question
$totalFormations = $stmtFormations->fetch(PDO::FETCH_ASSOC)['total_formations'];


$queryDocuments = "SELECT COUNT(*) AS total_documents FROM document WHERE idemp = :idemp";
$stmtDocuments = $pdo->prepare($queryDocuments);
$stmtDocuments->execute(['idemp' => $_SESSION['user']['idemp']]); // Remplacez $id_de_l_employe par l'ID de l'employé en question
$totalDocuments = $stmtDocuments->fetch(PDO::FETCH_ASSOC)['total_documents'];





  // Sélectionner les détails personnels de l'employé
  $sql = "SELECT * FROM details_perso WHERE id_employes = :id_employe";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id_employe', $_SESSION['user']['idemp']);
  $stmt->execute();
  $details_perso = $stmt->fetch(PDO::FETCH_ASSOC);

  // Vérifier si les détails personnels existent
  if ($details_perso) {
      // Afficher les détails personnels dans les champs du formulaire
      $num_cip = $details_perso['num_cip'];
      $num_ifu = $details_perso['num_ifu'];
      $lieu_naissance = $details_perso['lieu_naissance'];
      $genre = $details_perso['genre'];
      $situation_familiale = $details_perso['situation_familiale'];
      $nationalite = $details_perso['nationalite'];
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
  <title>Profil</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--profile-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">-->
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
    .profile-picture {
    position: relative;
}
/* .profile-picture img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
} */
.edit-icon {
    position: absolute;
    bottom: 5px;
    right: 5px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 5px;
    color: white;
    text-decoration: none;
}
.edit-icon:hover {
    background-color: rgba(0, 0, 0, 0.7);
}
.card {
    border-radius: 15px;
}
.btn-primary {
    border-radius: 25px;
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
<body class="bg-light">
<?php include('header.php');?>
<br>
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="row g-2 mb-4 ">
      <div class="col-6 col-lg-3  mt-4 mb-4" style="border-radius: 10px;">

        <div class="app-card app-card-stat shadow-sm h-100" style="background-color: #f0f0f0;">
          <div class="app-card-body p-3 mt-4 p-lg-4">
            <h4 class="stats-type mb-1">Congés </h4>
            <div class="stats-figure"><?php echo $totalConges; ?></div>
              <div class="stats-meta text-success">
                Congés
              </div> 
            </div><!--//app-card-body-->
              <a class="app-card-link-mask" href="#"></a>
          </div><!--//app-card-->
        </div><!--//col-->   

        <div class="col-6 col-lg-3  mt-4 mb-4" style="border-radius: 10px;">
          <div class="app-card app-card-stat shadow-sm h-100" style="background-color: #DDF5D6;">
            <div class="app-card-body p-3 mt-4 p-lg-4">
              <h4 class="stats-type mb-1" style="font-size:small">Formations</h4>
              <div class="stats-figure"><?php echo $totalFormations; ?></div>
                <div class="stats-meta text-success">
                  Formation(s)
                </div> 
            </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
          </div><!--//app-card-->
        </div><!--//col-->     
              <div class="col-6 col-lg-3 mt-4 mb-4" style="border-radius: 10px;">
                <div class="app-card app-card-stat shadow-sm h-100" style="background-color: #F3DEDB;">
                    <div class="app-card-body p-3 mt-4 p-lg-4">
                        <h4 class="stats-type mb-1">Documents</h4>
                        <div class="stats-figure"><?php echo $totalDocuments; ?></div>
                        <div class="stats-meta text-success">Document(s)</div>
                    </div><!--//app-card-body-->
                    <a class="app-card-link-mask" href="#"></a>
                </div><!--//app-card-->
              </div><!--//col-->
              <div class="col-6 col-lg-3 mt-4 mb-4" style="border-radius: 10px; transition: background-color 0.3s;">
                  <div class="app-card app-card-stat shadow-sm h-100" style="background-color: #fffae3;">
                      <div class="app-card-body p-3 mt-4 p-lg-4">
                          <h4 class="stats-type mb-1" style="color: #333;">Avertissements</h4>
                          <div class="stats-figure" style="color: #333;">6</div>
                          <div class="stats-meta text-success" style="color: #333;">Avertissement(s)</div>
                      </div><!--//app-card-body-->
                      <a class="app-card-link-mask" href="#"></a>
                  </div><!--//app-card-->
              </div><!--//col-->

    <div class="row mt-4">
              <?php include('a.php');?>
    </div><!--//row-->


<div class="row d-flex">
    <div class="col-6"><hr style='height: 3px;background-color:#F56004;'></div>
    <div class="col-6"><hr style='height: 3px;background-color:#F56004;'></div>
</div>

<div class="inscform" style="margin-top: -25px;" > 

<div>
  <h3 class="mt-4">Vos informations </h3>
</div>

    <form id="profileForm" method="post" action="modifierinfoemployes.php">
        <div class="row">
            <!-- Première colonne -->
            <div class="form-group">
                    <input type="hidden" name="id_employe" class="form-control" value="<?php echo $_SESSION['user']['idemp']; ?>">
                </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" value="<?php echo $_SESSION['user']['nom']; ?>" readonly>
                </div>
                <div class=" form-group">
                  
                  <img src="../images/<?php echo $_SESSION['user']['photo'];?>" alt="Photo de profil" style="width: 150px; height: 150px; border: solid .2px; border-radius:100px ;">
                </div>
                <!-- Affichez la photo de l'employé ici -->
            </div>
            <!-- Deuxième colonne -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date de naissance</label>
                    <input type="date" name="date_naissance" class="form-control" value="<?php echo $_SESSION['user']['dateNaissance']; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" style="color: white;" class="btn app-btn-primary mt-2" value="Modifier mes informations">
                    </div>    
                </div> 
                
            </div>
        </div>
        <br>     
          
    </form> 
</div>
 <!-- <div class="container mt-5">
<form id="profileForm" method="post" action="modifierinfoemployes.php">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card shadow">
<div class="card-body">
<div class="row">
<div class="col-md-4">
<div class="profile-picture">
<img src="../images/<?php echo $_SESSION['user']['photo'];?>" alt="Photo de profil" style="width: 150px; height: 150px;">
<a href="#" class="edit-icon"><i class="far fa-edit"></i></a>
</div>
</div>

<div class="col-md-8">
<h2 class="font-weight-bold"><?php echo $_SESSION['user']['nom'];?></h2>
<p class="text-muted"><?php echo $_SESSION['user']['poste'];?></p>
</div>
</div>
<hr>
<div class="row">
<div class="col-md-6">
<p class="font-weight-bold">Email:</p>
<p><?php echo $_SESSION['user']['email'];?></p>
</div>
<div class="col-md-6">
<p class="font-weight-bold">Téléphone:</p>
<p><?php echo $_SESSION['user']['telephone'];?></p>
</div>
</div>
<div class="row">
<div class="col-md-6">
<p class="font-weight-bold">Département:</p>
<p><?php echo $_SESSION['user']['departement'];?></p>
</div>
<div class="col-md-6">
<p class="font-weight-bold">Fonction:</p>
<p><?php echo $_SESSION['user']['poste'];?></p>
</div>
</div>
<div class="text-center mt-4">
<button type="submit" class="btn btn-primary">Modifier mes informations</button>
</div>
</div>
</div>
</div>
</div>
</form>
</div>   -->

<div class="row d-flex">
  <div class="col-6"><hr style='height: 3px;background-color:#F56004;'></div>
  <div class="col-6"><hr style='height: 3px;background-color:#F56004;'></div>
</div>


<div class="inscform" style="margin-top: -25px;" >    
<div>
  <h3 class="mt-4">Vos informations personnelles</h3>
</div>
    <form id="profileForm" method="post" action="modifierinfoemployes2.php">
    <div class="row">
            <!-- Première colonne -->
            <div class="form-group">
                    <input type="hidden" name="id_employe" class="form-control" value="<?php echo $_SESSION['user']['idemp']; ?>">
                </div>

            <div class="col-md-6">
               
                <div class="form-group">
                    <label>Numéro cip</label>
                    <input type="number" name="num_cip" class="form-control" value="<?php echo $num_cip; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Numéro ifu</label>
                    <input type="number" name="num_ifu" class="form-control" value="<?php echo $num_ifu; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Situation familiale</label>
                    <select name="situation_familiale" class="form-control" readonly>
                        <option value="<?php echo isset($situation_familiale) ? $situation_familiale : ''; ?>" > <?php echo isset($situation_familiale) ? $situation_familiale : ''; ?></option>
                    </select>
                </div>
            </div>
            <!-- Deuxième colonne -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Lieu de naissance</label>
                    <input type="text" name="lieu_naissance" class="form-control" value="<?php echo isset($lieu_naissance) ? $lieu_naissance : ''; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <select name="genre" class="form-control" readonly>
                        <option value="<?php echo isset($genre) ? $genre : ''; ?>"><?php echo isset($genre) ? $genre : ''; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nationalité</label>
                    <input type="text" name="nationalite" class="form-control" value="<?php echo isset($nationalite) ? $nationalite : ''; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" style="color: white;" class="btn btn-success" value="Modifier mes informations">
                    </div>    
                </div> 
        <br>     
    </form> 
</div>


<div class="row d-flex">
  <div class="col-6"><hr style='height: 3px;background-color:#F56004;'></div>
  <div class="col-6"><hr style='height: 3px;background-color: #F56004;'></div>
</div>
<div class="inscform" style="margin-top: -25px;" >    
<div>
  <h3 class="mt-4">Remplisez vos informations personnelles</h3>
</div>
    <form id="detailsForm" name="detailsForm" method="post" action="enregistrer_details_perso.php">
        <div class="row">
            <!-- Première colonne -->
            <div class="form-group">
                    <input type="hidden" name="id_employe" class="form-control" value="<?php echo $_SESSION['user']['idemp']; ?>">
                </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <label>Numéro cip</label>
                    <input type="number" name="num_cip" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <label>Numéro ifu</label>
                    <input type="number" name="num_ifu" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Situation familiale</label>
                    <select name="situation_familiale" class="form-control">
                        <option value="Célibataire">Célibataire</option>
                        <option value="Marié(e)">Marié(e)</option>
                        <option value="Pacsé(e)">Pacsé(e)</option>
                        <option value="Concubin(e)">Concubin(e)</option>
                        <option value="Divorcé(e)">Divorcé(e)</option>
                        <option value="Veuf(ve)">Veuf(ve)</option>
                        <option value="Union libre">Union libre</option>
                    </select>    
                </div>
                <!-- Affichez la photo de l'employé ici -->
            </div>
            <!-- Deuxième colonne -->
            <div class="col-md-6">
               
                <div class="form-group">
                    <label>Lieu de naissance</label>
                    <input type="text" name="lieu_naissance" class="form-control" placeholder="Lieu de naissance">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <select name="genre" class="form-control">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nationalité</label>
                    <input type="text" name="nationalite" class="form-control" placeholder="Nationalité">
                </div>
            </div>
        </div>
        <br>     
        <div class="row">
            <div class="form-group col-md-6">
                <input type="submit" style="color: white;" class="btn btn-success" value="Enregistrer">
            </div>    
        </div>    
    </form> 
</div>




</div>
</div>
<script src="assets/plugins/popper.min.js"></script> 
<!-- <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>   -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


</body>
</html>
