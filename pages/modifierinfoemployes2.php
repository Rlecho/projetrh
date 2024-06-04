<?php
 require_once("identifier.php");
 require_once("connexiondb.php");
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
       echo ".";
    //    echo "Aucun détail personnel trouvé pour cet employé.";
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
                <form id="profileForm" method="post" action="modificationinfoemployes2.php">
    <div class="row">
            <!-- Première colonne -->
            <div class="form-group">
                    <input type="hidden" name="id_employe" class="form-control" value="<?php echo $_SESSION['user']['idemp']; ?>">
                </div>
            <div class="col-md-6">     
                <div class="form-group">
                    <label>Numéro cip</label>
                    <input type="number" name="num_cip" class="form-control" value="<?php echo $num_cip; ?>"  >
                </div>
                <div class="form-group">
                    <label>Numéro ifu</label>
                    <input type="number" name="num_ifu" class="form-control" value="<?php echo $num_ifu; ?>"  >
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
                    <input type="text" name="lieu_naissance" class="form-control" value="<?php echo isset($lieu_naissance) ? $lieu_naissance : ''; ?>"  >
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <select name="genre" class="form-control"  >
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nationalité</label>
                    <input type="text" name="nationalite" class="form-control" value="<?php echo isset($nationalite) ? $nationalite : ''; ?>"  >
                </div>
            </div>
        </div>
        <br>    
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" style="color: white;" class="btn btn-success" value="Modifier mes informations">
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