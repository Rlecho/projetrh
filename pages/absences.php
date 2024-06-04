<?php
   require_once("identifier.php");
  require_once("connexiondb.php");
  $requete="select *from conges"; // la table conges contient les conges accepter par l'administrateur 
  $resultatR=$pdo->query($requete);
// Définir la requête par défaut pour récupérer tous les congés
$requete = "SELECT * FROM conges";
// Vérifie si une recherche a été effectuée
if(isset($_GET['searchorders']) && !empty($_GET['searchorders'])) {
    // Filtrer les résultats en fonction de la recherche sur le type de congé
    $search = $_GET['searchorders'];
    $requete .= " WHERE typeconge LIKE '%$search%'";
}

$resultatR = $pdo->query($requete);
// Vos fonctions et le reste du code ici...
  function nbjoursconsommes($conges){
      $currentDateTime = date('Y-m-d');
      $nbjoursconso = round((strtotime($currentDateTime) - strtotime($conges['datedebut']))/(60*60*24));
      if (round((strtotime($currentDateTime) - strtotime($conges['datefin']))/(60*60*24))>0){
          echo round((strtotime($conges['datefin']) - strtotime($conges['datedebut']))/(60*60*24)) .' jours';
      }
      else if ($nbjoursconso > "0") {
           echo $nbjoursconso .' jours';
       } 
      else {
           echo 0 .' jours';
       } 
  }
 function nbjoursrestants($conges){
     $currentDateTime = date('Y-m-d');
      $nbjoursrestants = round((strtotime($conges['datefin']) - strtotime($currentDateTime))/(60*60*24));
      if ($nbjoursrestants > "0") {
           echo $nbjoursrestants .' jours';
       } else {
           echo 0 .' jours';
       } 
  }
  function statut($conges) {
    $currentDateTime = date('Y-m-d');
    $nbjoursrestants = round((strtotime($conges['datefin']) - strtotime($currentDateTime))/(60*60*24));
    if ($nbjoursrestants > 0) {
        return '<span class="badge bg-success">En cours</span>'; // Badge pour un congé en cours
    } else {
        return '<span class="badge bg-danger">Terminé</span>'; // Badge pour un congé terminé
    } 
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
    <title>congés</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboard.css">
    <!-- <link rel="stylesheet" href="chercherStyle.css"> -->
    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">     
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
      .lignecolor{
        background: white;
        text-align: center;
    }
      .tablecolor{
        /* background: #228B22; */
        color: grey;
        font-weight: bold;
        font-family:serif;
        padding: 12px 15px;
        text-align: center;
    }
       .tablecontent{
        /* border-radius: 10px 10px 0 0; */
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
        width: 100%;
        height: 100%;
    } 
    .pagination {
     display: inline-block;
     }
   .pagination a {
     color: green;
     background-color: white;
     float: left;
     margin-top: 20%;
     padding: 8px 16px;
     text-decoration: none;
     border-radius: 30px 30px 30px 30px;
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
    <br>
    <div class="app-wrapper">
	    <div class="app-content pt-0 p-md-3 p-lg-4">
  <div class="container-xl">
  <div class="row g-3 mb-0 mt-0 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Mes Absences</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
							    </div><!--//col-->		   
                  <div class="col-auto ">						    
                      <button class="btn app-btn-primary " data-toggle="modal" data-target="#ajouterModal">
                          <i class="fas fa-plus"></i> Ajouter
                      </button>
                  </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
       <div class="panel panel-success mt-4">
    <div  class="panel-heading mb-4" style=" display: inline-block;width: 500px;height: 10px;color:#000;font-size:xx-large;"> Listes de mes absences</div>
    <div class="panel-body mt-4">
       <form method="get" action="congesRH.php">
        </form>
        <div class="panel-body">
        <table class=" table table-responsive">
        <thead class="tablecolor thead-light">
         <tr>
            <th>Type</th>
            <th>DATE DE DEBUT</th>
            <th>DATE DE FIN</th>
            <th>PERIODE</th>
            <th>JOURS DE CONGE CONSOMMES</th>
            <th>JOURS DE CONGE RESTANTS</th>
            <th>STATUT</th>
            </tr> 
        </thead >
        <tbody>
            <?php while($conges=$resultatR->fetch()){ ?>
            <tr class=lignecolor>
            <?php if ($conges['idemp']==$_SESSION['user']['idemp']){?>
            <td ><?php echo $conges['typeconge'] ?></td>
            <td ><?php echo $conges['datedebut'] ?></td>
            <td ><?php echo $conges['datefin'] ?></td>
            <td ><?php $nbjours = round((strtotime($conges['datefin']) - strtotime($conges['datedebut']))/(60*60*24));
                echo $nbjours .' jours';?></td>
            <td ><?php  nbjoursconsommes($conges); ?></td>
            <td ><?php nbjoursrestants($conges); ?></td>
            <td class="cell"><?php echo statut($conges); ?></td>
            <?php } ?>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
  </div>
      </div>
      </div>
      </div>
<!-- Modal -->
<div class="modal fade" id="ajouterModal" tabindex="-1" aria-labelledby="ajouterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajouterModalLabel">Demande d'absence</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
      </div>
      <div class="modal-body">

      <form action="traitement.php" method="post">

        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut" required>

        <label for="date_fin">Date de fin :</label>
        <input type="date" id="date_fin" name="date_fin" required>

        <label for="motif">Motif :</label>
        <textarea id="motif" name="motif" rows="4" required></textarea>

        <input type="submit" value="Envoyer">
    </form>

      </div>
      <!-- Vous pouvez ajouter d'autres éléments du modal ici, comme le footer si nécessaire -->
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
</body>
</html>
