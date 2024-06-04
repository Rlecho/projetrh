<?php
 require_once("identifier.php");
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Espace RH</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="dashboard.css">
    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


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
     nav div ul li ul li{
        display: none;
        
    }
    nav div ul li:hover ul li{
        display: block;
    }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
   <div class="container-fluid">
   <!--fluid c-a-d s'adapte à la taille d'écran-->
       <a class="navbar-brand" href="#">Rh<span style="color:#ff4321">ecrute</span></a><!--brand pour la mise en forme-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="profilRH.php">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Employés</a>
             <ul>
              <li class="nav-item">
                  <a class="nav-link" href="employes.php" >Liste des employés</a> 
              </li> 
              <li class="nav-item">
                  <a class="nav-link" href="archives.php" >Employés archivés</a> 
              </li>
              </ul>
        </li>
          <li class="nav-item">
          <a class="nav-link">Congés</a>
           <ul>
              <li class="nav-item">
                  <a class="nav-link" href="congesRH.php" >consulter les Congés</a> 
              </li> 
              <li class="nav-item">
                  <a class="nav-link" href="congesdemandes.php" >demandeurs de congés</a> 
              </li>
              </ul>
        </li>
        <li>
          <li class="nav-item">
          <a class="nav-link" href="reunion.php">Réunion</a>
        </li>
        <li>
          <li class="nav-item">
          <a class="nav-link" href="annoncements.php">Annoncements</a>
        </li>
         <li>
          <li class="nav-item">
          <a class="nav-link" href="recrutement.php">Recrutement</a>
        </li>
      </ul>
        <form class="d-flex">
        <a class="btn btn-outline-success" style="border-radius: 25px;" href="deconnecter.php">Se déconnecter</a>
      </form>
    </div>
 </div>
</nav>
<br/>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>