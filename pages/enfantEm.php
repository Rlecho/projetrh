<?php
  require_once("identifier.php");
  require_once("connexiondb.php");
      
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete="select *from employes where idemp=$idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();

 $emailU=$employes['email'];
 $dateN=$employes['dateNaissance'];
 $nomU=$employes['nom'];
 $telU=$employes['telephone'];
 $depU=$employes['departement'];
 $posteU=$employes['poste'];  
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
                    <!-- Première ligne de liens -->
                    <div class="col-md-12">
            <div class="nav-link-wrapper">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="profilEmployes.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Détails personnels</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="coordo.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Coordonnées</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="situa_prof.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Situation professionnelle</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="info_bancaire.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Informations bancaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="enfantEm.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Enfant d'employé</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="langue.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Langues</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="diplome.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Diplômes</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="formationRh.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Formations</a>
                    </li>
                    <li class="nav-item" style="margin-top: .4cm;">
                        <a class="btn-sm app-btn-secondary mx-1"  style="text-decoration: none;" href="congesRhEp.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Congés et absences</a>
                    </li>
                    <li class="nav-item" style="margin-top: .4cm;">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="carierre.php?idemp=<?php echo $_SESSION['user']['idemp']; ?>">Fin de carrière</a>
                    </li>
                </ul>
            </div>
                    </div>
            </div>
<div>
  <hr style="background-color:green; height:2px">
</div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>
