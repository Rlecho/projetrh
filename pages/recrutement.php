<?php
  
  require_once("identifier.php");
  require_once("connexiondb.php");
  $size=isset($_GET['size'])?$_GET['size']:6;
  $page=isset($_GET['page'])?$_GET['page']:1;
  $offset=($page-1)*$size;

  $poste=isset($_GET['poste'])?$_GET['poste']:"";
  $requete="select *from candidats where poste like '%$poste%' limit $size offset $offset";

  $requetecount="select count(*) countE from candidats where poste like '%$poste%'";
  $resultatR=$pdo->query($requete);

  $resultatcount=$pdo->query($requetecount);
  $tabcount=$resultatcount->fetch();
  $nbcandidats=$tabcount['countE'];

  $reste=$nbcandidats % $size;
  if($reste===0){
      $nbpage=$nbcandidats / $size;
  }
  else $nbpage=floor($nbcandidats/$size)+1;
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>recrutements</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="chercherStyle.css">
      
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        


    

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
      .lignecolor{
        background: white;
        text-align: center;
    }
      .tablecolor{
        background: #228B22;
        color: white;
        font-weight: bold;
        font-family:serif;
        padding: 12px 15px;
        text-align: center;
    }
      .tablecontent{
        border-radius: 10px 10px 0 0;
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
    <?php include('headerRH.php');?>
    <br>
    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
       

        <div class="row g-3 mb-4 mt-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0" style="color: grey;">Récrutement</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center" form method="get" action="recrutement.php">
					                    <div class="col-auto">
					                        <input type="text" id="search-reunion" name="poste" class="form-control search-orders" placeholder="Chercher par poste...">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Rechercher</button>
					                    </div>
					                </form>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
	</div>







    <form method="get" action="profilcandidat.php">
    <div class="panel panel-primary margetop">
    <div class="panel-body">
    <table class="table table-responsive table-hover">
        <thead style=" border:none">
         <tr>
            <th class="cell">PRENOM</th>
            <th class="cell">NOM</th>
            <th class="cell">POSTE</th>
            <th class="cell">ACTION</th>
            </tr>
        
        </thead>
        <tbody>
            <?php while($candidats=$resultatR->fetch()){ ?>
            <tr class=lignecolor>
            <td><?php echo $candidats['prenom'] ?></td>
            <td><?php echo $candidats['nom'] ?></td>
            <td><?php echo $candidats['poste'] ?></td>
            <td>
            <a href="visualisercandidat.php?idcand=<?php echo $candidats['idcand']?>" ><i class="material-icons" data-toggle="tooltip" title="see">visibility</i></a>
            <a onclick="return confirm('Etes vous sûr de vouloir supprimer')" href="supprimercandidat.php?idcand=<?php echo $candidats['idcand'] ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <div>
						<ul class="pagination">
							<?php for($i=1;$i<=$nbpage;$i++){ ?>
                                    <li><a href="recrutement.php?page=<?php echo $i; ?>&poste=<?php echo $poste; ?>"><?php echo $i; ?></a></li>
							<?php } ?>	
						</ul>
					</div>
                        
        </div>
    </div>
    </form>
      </div>
      </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



  </body>
</html>
