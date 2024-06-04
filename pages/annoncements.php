<?php
   require_once("identifier.php");
  require_once("connexiondb.php");
  $requete="select *from annoncement";
  $resultatR=$pdo->query($requete);
  // Requête SQL pour récupérer tous les utilisateurs
$sql = "SELECT idemp, nom FROM employes";
$resultatRs =$pdo->query($sql);
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>annoncements</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
     
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- CSS de Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript de Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
      .bouttonannonce{
         margin: 12px 470px;
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
    </style>
 <link href="navbar-top.css" rel="stylesheet">
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
  <form method="post" action="ajouterannonce.php" class="form" >
  <div class="modal fade" id="ajoutannonce" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une annonce</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
         <div class="form-group col-12"> 
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" placeholder="Titre" id="titre">     
         </div>
     </div> 
      <div class="row">               
        <div class="form-group col-12 mt-2">
        <label>Employé(s) Concerné (s)</label>
            <select id="selectEmployes" name="employes[]" multiple class="form-control" style="width: 5.9cm; " >
                <?php
                // Boucle while pour parcourir les résultats de la requête
                while ($employes = $resultatRs->fetch(PDO::FETCH_ASSOC)) {
                    // Afficher chaque nom d'employé comme une option dans le select
                    echo '<option value="' . $employes['idemp'] . '">' . $employes['nom'] . '</option>';
                }
                ?>
            </select>
        </div>
      </div>
    <div class="row">
         <div class="form-group col-12">
         <label>Description</label>
         <textarea id="mytextarea" name="t1" class="form-control" class="mt-2" ></textarea>
         </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" style="color:white">Poster</button>
      </div>
    </div>
  </div>
</div>
      </form>
    <div class="row g-3 mb-4 mt-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0" style="color: grey;">Les Annonces</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-annonce" name="searchannonce" class="form-control search-orders" placeholder="Rechercher">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Rechercher</button>
					                    </div>
					                </form>
							    </div>
                  <div class="col-auto text-end">						    
									<button class="btn btn-success" data-bs-toggle="modal"  data-bs-target="#ajoutannonce" style="color: white;">
										<i class="fas fa-plus"></i> Ajouter
									</button>
								</div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
	</div>
    <div class="panel-body">
    <table class="table table-responsive table-bordered table-hover">
        <thead style=" border:none">
         <tr>
            <th class="cell text-success ">Titre</th>
            <th class="cell text-success " style='text-align: center;'>Contenu</th>
            <th class="cell text-success ">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($annoncement=$resultatR->fetch()){ ?>
            <tr class=lignecolor>
            <td  valign="top"><?php echo $annoncement['titre'] ?></td>
            <td ><?php echo $annoncement['description'] ?></td>
            <td>
            <a href="modifierannonce.php?idannonce=<?php echo $annoncement['idannonce']?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a onclick="return confirm('Etes vous sûr de vouloir supprimer l\'annonce')" href="supprimerannonce.php?idannonce=<?php echo $annoncement['idannonce']?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
          </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
  </div>
  </div>
  </div>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript de Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script>
            $(document).ready(function() {
                // Initialiser Select2 sur votre select
                $('#selectEmployes').select2({
                    placeholder: 'Sélectionnez les employés',
                    allowClear: true // Permettre de vider la sélection
                });
            });
    </script>
</body>
</html>
