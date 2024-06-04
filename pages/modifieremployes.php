<?php
  require_once("identifier.php");
  require_once("connexiondb.php");
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete="select *from employes where idemp=$idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();

 $requete2="select * from details_perso where id_employes=$idEmp";
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
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">

<!-- Bootstrap core CSS -->
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


<style>
.la {
    color: #000; /* Couleur du texte par défaut */
    margin-right: 3px;
}

.la:hover,
.la:active,
.la:focus,
.la.active {
    background-color: #007bff; /* Couleur de fond lors du survol ou du clic */
    color: #fff; /* Couleur du texte lors du survol ou du clic */
}


</style>
  </head>
  <body>
    <?php include('headerRh.php');?>
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="col-md-12">

      <div class="row">
      <?php include('aa.php');?>
     
      </div>
      
      <div class="row" >
        <div class="col-6"><hr style="background-color:green; height:2px"></div>
        <div class="col-6"><hr style="background-color:green; height:2px"></div>
      </div>



<div class="" style="margin-top: 0px;" > 

<div>
  <h3 class="mt-4">Les informations de <?php echo $employes['nom']; ?> </h3>
</div>

    <form id="profileForm" method="post" action="modifierinfoemployes.php">
        <div class="row">
            <!-- Première colonne -->
            <div class="form-group">
                    <input type="hidden" name="id_employe" class="form-control" value="<?php echo $employes['idemp']; ?>">
                </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-success" >Nom</label>
                    <input type="text" name="nom" class="form-control" value="<?php echo $employes['nom']; ?>" readonly>
                </div>
                <div class=" form-group  mt-4">
                  
                <label class="text-success" >Photo de profile</label>
                  <img src="../images/<?php echo $employes['photo'];?>" alt="Photo de profil" style="width: 150px; height: 150px; border: solid .1px;">
                </div>
                <!-- Affichez la photo de l'employé ici -->
            </div>
            <!-- Deuxième colonne -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-success" >Date de naissance</label>
                    <input type="date" name="date_naissance" class="form-control" value="<?php echo $employes['dateNaissance']; ?>" readonly>
                </div>
                
            </div>
        </div>
        <br>     
          
    </form> 
</div>

<div class="row d-flex">
  <div class="col-6"><hr style='height: 3px;background-color:#F56004;'></div>
  <div class="col-6"><hr style='height: 3px;background-color:#F56004;'></div>
</div>


<div class=""  >    
<div>
  <h3 class="mt-4">Les informations personnelles de <?php echo $employes['nom']; ?></h3>
</div>
    <form id="profileForm" method="post" action="modifierinfoemployes2.php">
    <div class="row">
            <!-- Première colonne -->
            <div class="form-group">
                    <input type="hidden" name="id_employe" class="form-control" value="<?php echo $employes2['id_employes']; ?>">
                </div>

            <div class="col-md-6">
               
                <div class="form-group">
                    <label class="text-success" >Numéro cip</label>
                    <input type="number" name="num_cip" class="form-control" value="<?php echo $employes2['num_cip']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="text-success" >Numéro ifu</label>
                    <input  type="number" name="num_ifu" class="form-control" value="<?php echo $employes2['num_ifu']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="text-success" >Situation familiale</label> 
                    <select name="situation_familiale" class="form-control" readonly>
                        <option  value="<?php echo isset($employes2['situation_familiale']) ? $employes2['situation_familiale'] : ''; ?>" ><?php echo isset($employes2['situation_familiale']) ? $employes2['situation_familiale']: ''; ?></option>
                    </select>
                </div>
            </div>
            <!-- Deuxième colonne -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-success" >Lieu de naissance</label>
                    <input type="text" name="lieu_naissance" class="form-control" value="<?php echo isset($employes2['lieu_naissance']) ? $employes2['lieu_naissance'] : ''; ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="text-success" >Genre</label>
                    <select name="genre" class="form-control" readonly>
                        <option value="<?php echo isset($employes2['genre']) ? $employes2['genre'] : ''; ?>"><?php echo isset($employes2['genre']) ? $employes2['genre'] : ''; ?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-success" >Nationalité</label>
                    <input type="text" name="nationalite" class="form-control" value="<?php echo isset($employes2['nationalite']) ? $employes2['nationalite'] : ''; ?>" readonly>
                </div>
            </div>
        </div>
        <br>     
    </form> 
</div>


    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </body>
</html>
