<?php
  require_once("identifier.php");
  require_once("connexiondb.php");
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete = "SELECT * FROM employes where idemp = $idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();
 $requete = "SELECT * FROM formations where idemp=$idEmp";
$resultat = $pdo->query($requete);
// Vérifie si une recherche a été effectuée
if(isset($_GET['searchorders']) && !empty($_GET['searchorders'])) {
    // Filtrer les résultats en fonction de la recherche sur le type de congé
    $search = $_GET['searchorders'];
    $requete .= " OR titre LIKE '%$search%'";
}
$resultat = $pdo->query($requete);
// Définir la requête pour récupérer les formations
$formations = $resultat->fetchAll();
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
  <hr style="background-color:green; height:2px">
</div>
<div class="row g-3 mb-4 mt-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Formations</h1>
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
					                        <button type="submit" class="btn app-btn-secondary">Rechercher</button>
					                    </div>
					                </form>
							    </div><!--//col-->
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
                    <div class="col-auto text-end">						    
                            <button class="btn app-btn-primary " data-bs-toggle="modal" data-bs-target="#ajouterFormationModal">
                              <i class="fas fa-plus"></i> Ajouter
                            </button>
                          </div>
                    <div class="app-card app-card-orders-table mb-5">
                          <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 text-left">
                              <thead>
                                                  <tr>
                                  <th class="cell">Formations/Stages</th>
                                  <th class="cell">Organismes Formateur</th>
                                  <th class="cell">Lieu</th>
                                  <th class="cell">Durée en jours</th>
                                  <th class="cell">Status</th>
                                  <th class="cell">Chargé</th>
                                  <th class="cell">Période</th>
                                  <th class="cell">Pièce justificatif</th>
                                  <th class="cell"></th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($formations as $formation): ?>
                                  <tr>
                                    <td class="cell"><?php echo $formation['titre']; ?></td>
                                    <td class="cell"><?php echo $formation['organisme_formateur']; ?></td>
                                    <td class="cell"><?php echo $formation['lieu']; ?></td>
                                    <td class="cell"><?php echo $formation['duree_en_jours']; ?></td>
                                    <td class="cell">
                                        <?php 
                                        $dateFin = strtotime($formation['periode_fin']);
                                        $dateActuelle = strtotime(date('Y-m-d'));
                                        
                                        if ($dateFin >= $dateActuelle) {
                                          echo '<span class="badge bg-primary">En cours</span>';
                                        } else {
                                          echo '<span class="badge bg-danger">Terminé</span>';
                                        }
                                        ?>
                                      </td>
                                    <td class="cell"><?php echo ($formation['charge'] == 1) ? 'À titre personnel' : 'Pas personnel'; ?></td>
                                    <td class="cell"><?php echo $formation['periode_debut'] . ' Au ' . $formation['periode_fin']; ?></td>
                                    <td class="cell"><?php echo $formation['piece_justificatif']; ?></td>
                                    <td class="cell">
                                    <a onclick="return confirm('Etes vous sûr de vouloir supprimer la formation')" 
                                      href="supprimerformation2.php?id=<?php echo $formation['id']?>&idemp=<?php echo $idEmp ?>">
                                      <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i>
                                    </a>
                                    </td>
                                  </tr>
                              <?php endforeach; ?>
                              </tbody>
                            </table>

                              </div><!--//table-responsive-->
                          </div><!--//app-card-body-->		
                      </div><!--//app-card-->
                      <!-- Modal -->
					<div class="modal fade" id="ajouterFormationModal" tabindex="-1" aria-labelledby="ajouterFormationModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="ajouterFormationModalLabel">Ajouter une formation</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						<form action="traitement2.php" method="POST" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="titre" class="form-label">Titre de la formation:</label>
								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $idEmp; ?>" required>
								<input type="text" class="form-control" id="titre" name="titre" required>
							</div>
							<div class="mb-3">
								<label for="organisme_formateur" class="form-label">Organisme formateur:</label>
								<input type="text" class="form-control" id="organisme_formateur" name="organisme_formateur" required>
							</div>
							<div class="mb-3">
								<label for="lieu" class="form-label">Lieu:</label>
								<input type="text" class="form-control" id="lieu" name="lieu" required>
							</div>	
							<div class="mb-3">
								<label for="charge" class="form-label">La Formation est à titre Personel:</label><br>
								<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="charge" id="charge_oui" value="1" >
                    <label class="form-check-label" for="charge_oui">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="charge" id="charge_non" value="0" >
                    <label class="form-check-label" for="charge_non">Non</label>
                </div>

							</div>
							<div class="mb-3">
								<label for="periode_debut" class="form-label">Période de début:</label>
								<input type="date" class="form-control" id="periode_debut" name="periode_debut" required>
							</div>
							<div class="mb-3">
								<label for="periode_fin" class="form-label">Période de fin:</label>
								<input type="date" class="form-control" id="periode_fin" name="periode_fin" required>
							</div>
							<div class="mb-3">
								<label for="duree" class="form-label">Durée en jours:</label>
								<input type="number" class="form-control" id="duree" name="duree" readonly>
							</div>
							<div class="mb-3">
								<label for="piece_justificatif" class="form-label">Pièce justificative:</label>
								<input type="file" class="form-control" id="piece_justificatif" name="piece_justificatif" required>
							</div>
							<button type="submit" class="btn app-btn-primary">Ajouter la formation</button>
						</form>
						</div>
						</div>
					</div>
					</div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
<script>
    // Fonction pour calculer la différence de jours entre deux dates
    function calculerDuree() {
        // Récupérer les valeurs des champs de date de début et de fin
        var debut = new Date(document.getElementById("periode_debut").value);
        var fin = new Date(document.getElementById("periode_fin").value);
        // Calculer la différence en millisecondes entre les deux dates
        var difference = fin.getTime() - debut.getTime();
        // Convertir la différence en jours
        var jours = difference / (1000 * 3600 * 24);
        // Afficher la durée calculée dans le champ de durée en jours
        document.getElementById("duree").value = jours;
    }
    // Écouter les changements dans les champs de date de début et de fin pour recalculer la durée en jours
    document.getElementById("periode_debut").addEventListener("change", calculerDuree);
    document.getElementById("periode_fin").addEventListener("change", calculerDuree);
</script>

</body>
</html>
