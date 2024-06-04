<?php
  require_once("identifier.php");
  require_once("connexiondb.php");
      
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete="select *from employes where idemp=$idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();

  // Sélectionner les détails personnels de l'employé
  $sql = "SELECT * FROM situa_pro WHERE idemp = :id_employe";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id_employe', $_SESSION['user']['idemp']);
  $stmt->execute();
  $situa = $stmt->fetch(PDO::FETCH_ASSOC);

  // Vérifier si les détails personnels existent
  if ($situa) {
      // Afficher les détails personnels dans les champs du formulaire
      $date_recru = $situa['date_recrutement'];
      $grad_recru = $situa['grade_recrutement'];
      $echelle_recru = $situa['echelle_recrutement'];
      $echelon = $situa['echelon'];
      $fiche_embauche = $situa['fiche_embauche'];
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
                <form id="situaForm" method="post" action="traitement_situ.php">
                    <div class="row">
                        <!-- Première colonne -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Département</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['user']['departement']; ?>" readonly >
                            </div>
                        </div>
                        <!-- Deuxième colonne -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Intitulé du Poste</label>
                                <input type="text" name="mobile_telephone" class="form-control" value="<?php echo $_SESSION['user']['poste']; ?>" readonly >
                            </div>
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="">
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

                <h3>Informations sur la situation professionnelle</h3>
                <form action="traitement_situation.php" method="POST">
                    <div class="row">
                        <!-- Première colonne -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_recru" class="text-info" >Date de recrutement</label>
                                <!-- Affichez le département récupéré depuis la base de données -->
                                <input type="date" id="date_recru" name="date_recru" class="form-control" value="<?php echo isset($date_recru) ? $date_recru : ''; ?>" readonly  >
                            </div>
                            <div class="form-group">
                                <label for="grad_recru" class="text-info" >Grade de recrutement</label>
                                <!-- Affichez l'intitulé du poste récupéré depuis la base de données -->
                                <input type="text" id="grad_recru" name="grad_recru" class="form-control" value="<?php echo isset($grad_recru) ? $grad_recru : ''; ?>" readonly  >
                            </div>

                            <div class="form-group">
                                <label for="echelle_recru" class="text-info" >Echelle de recrutement</label>
                                <!-- Affichez l'intitulé du poste récupéré depuis la base de données -->
                                <input type="text" id="echelle_recru" name="echelle_recru" class="form-control" value="<?php echo isset($echelle_recru) ? $echelle_recru : ''; ?>" readonly  >
                            </div>
                            <!-- Ajoutez d'autres champs de la première colonne si nécessaire -->
                        </div>
                        <!-- Deuxième colonne -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="echelon" class="text-info" >Échelon</label>
                                <input type="text" id="echelon" name="echelon" class="form-control" value="<?php echo isset($echelon) ? $echelon : ''; ?>" readonly >
                            </div>
                            <div class="form-group">
                                <label for="fiche_embauche" class="text-info" >Fiche d'embauche</label>
                                <h6 class="text-muted"><?php echo ''?></h6><a href="telechargementlettre.php?id=<?php  echo 'gg'?>" ><i class="material-icons" data-toggle="tooltip" title="download">file_download</i></a>   	
                                </div>
                            
                            <div class="col-sm-6">
                                            </div>
                            <!-- Ajoutez d'autres champs de la deuxième colonne si nécessaire -->
                        </div>
                    </div>
                    
                </form>

                <div class="row d-flex">
                    <div class="col-6"><hr style='height: 2px;background-color:green'></div>
                    <div class="col-6"><hr style="background-color:green; height:2px"></div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
