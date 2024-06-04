<?php
  require_once("identifier.php");
  require_once("connexiondb.php");
      
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete="select * from employes where idemp=$idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();

 $requete2="select * from situa_pro where idemp=$idEmp";
 $resultat2=$pdo->query($requete2);
 $employes2=$resultat2->fetch();
 
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
    <?php include('headerRh.php');?>
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="col-md-12">
                <div class="row">
                    <?php include('aa.php');?>
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
                                    <input type="email" name="email" class="form-control" value="<?php echo isset($employes['departement']) ? $employes['departement']: ''; ?>" readonly >
                                </div>
                            </div>
                            <!-- Deuxième colonne -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Intitulé du Poste</label>
                                    <input type="text" name="mobile_telephone" class="form-control" value="<?php echo isset($employes['poste']) ? $employes['poste']: ''; ?>" readonly >
                                </div>
                                
                            </div>
                        </div>
                        <br>
                    </form>

                    <div class="row d-flex">
                        <div class="col-6"><hr style='height: 2px;background-color:green'></div>
                        <div class="col-6"><hr style="background-color:green; height:2px"></div>
                    </div>

                    <h3>Informations sur la situation professionnelle</h3>
                    <form action="traitement_situation.php" method="POST" enctype="multipart/form-data" >
                        <div class="row">
                            <input type="hidden" id="id" name="id" class="form-control" value="<?php echo isset($idEmp) ? $idEmp: ''; ?>" readonly  >
                            <!-- Première colonne -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_recru" class="text-success" >Date de recrutement</label>
                                    <!-- Affichez le département récupéré depuis la base de données -->
                                    <input type="date" id="date_recru" name="date_recru" class="form-control" value="<?php echo isset($employes2['date_recrutement']) ? $employes2['date_recrutement']: ''; ?>" readonly  >
                                </div>
                                <div class="form-group">
                                    <label for="grad_recru" class="text-success" >Grade de recrutement</label>
                                    <!-- Affichez l'intitulé du poste récupéré depuis la base de données -->
                                    <input type="text" id="grad_recru" name="grad_recru" class="form-control" value="<?php echo isset($employes2['grade_recrutement']) ? $employes2['grade_recrutement']: ''; ?>" readonly  >
                                </div>

                                <div class="form-group">
                                    <label for="echelle_recru" class="text-success" >Echelle de recrutement</label>
                                    <!-- Affichez l'intitulé du poste récupéré depuis la base de données -->
                                    <input type="text" id="echelle_recru" name="echelle_recru" class="form-control" value="<?php echo isset($employes2['echelle_recrutement']) ? $employes2['echelle_recrutement']: ''; ?>" readonly  >
                                </div>
                                <!-- Ajoutez d'autres champs de la première colonne si nécessaire -->
                            </div>
                            <!-- Deuxième colonne -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="echelon" class="text-success" >Échelon</label>
                                    <input type="text" id="echelon" name="echelon" class="form-control" value="<?php echo isset($employes2['echelon']) ? $employes2['echelon']: ''; ?>" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="fiche_embauche" class="text-success" >Fiche d'embauche</label>
                                    <h6 class="text-muted"><?php echo ''?></h6><a href="telechargementlettre.php?id=<?php  echo 'gg'?>" ><i class="material-icons" data-toggle="tooltip" title="download">file_download</i></a>   	
                                    </div>
                                
                                <div class="col-sm-6">
                                                </div>
                                <!-- Ajoutez d'autres champs de la deuxième colonne si nécessaire -->
                            </div>
                        </div>
                        
                        <button type="submit" class="btn app-btn-primary mt-2">Modifier ses informations</button>
                    </form>

                    <div class="row d-flex">
                        <div class="col-6"><hr style='height: 2px;background-color:green'></div>
                        <div class="col-6"><hr style="background-color:green; height:2px"></div>
                    </div>

                    <h3>Details de la Situation Professionnelle</h3>
                    <form action="traitement_situation.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Première colonne -->
                            <div class="col-md-6">
                            <input type="hidden" name="id" class="form-control" value="<?php echo isset($idEmp) ? $idEmp: ''; ?>">
                                <div class="form-group">
                                    <label for="date_recru">Date de recrutement</label>
                                    <!-- Affichez le département récupéré depuis la base de données -->
                                    <input type="date" id="date_recru" name="date_recru" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="grad_recru">Grade de recrutement</label>
                                    <!-- Affichez l'intitulé du poste récupéré depuis la base de données -->
                                    <input type="text" id="grad_recru" name="grad_recru" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="echelle_recu">Echelle de recrutement</label>
                                    <!-- Affichez l'intitulé du poste récupéré depuis la base de données -->
                                    <input type="text" id="echelle_recru" name="echelle_recru" class="form-control" >
                                </div>
                                <!-- Ajoutez d'autres champs de la première colonne si nécessaire -->
                            </div>
                            <!-- Deuxième colonne -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="echelon">Échelon</label>
                                    <input type="text" id="echelon" name="echelon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="fiche_embauche">Fiche d'embauche</label>
                                    <input type="file" id="fiche_embauche" name="fiche_embauche" class="form-control">
                                </div>
                                <!-- Ajoutez d'autres champs de la deuxième colonne si nécessaire -->
                            </div>
                        </div>
                        <button type="submit" class="btn app-btn-primary mt-2">Enregistrer</button>
                    </form>

                </div>
        </div>  
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>
