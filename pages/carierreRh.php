<?php
  require_once("identifier.php");
  require_once("connexiondb.php");
      
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete="select * from employes where idemp=$idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();
 


 // Récupérer les demandes de retraite depuis la base de données
$sqlRetraite = "SELECT id_demande, date_retraite FROM demandes WHERE type_demande = 'retraite' and idemp=$idEmp";
$stmtRetraite = $pdo->query($sqlRetraite);


$sqlDemission = "SELECT id_demande, raison FROM demandes WHERE type_demande = 'demission'  and idemp=$idEmp";
$stmtDemission = $pdo->query($sqlDemission);


$sql = "SELECT * FROM realisation where idemp=$idEmp";
$requete0 = $pdo->query($sql);


$sql1 = "SELECT * FROM competence where idemp=$idEmp";
$requete1 = $pdo->query($sql1);


$sql2 = "SELECT * FROM defi where idemp=$idEmp";
$requete2 = $pdo->query($sql2);
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

        <div class="container">
            <section>
                <h1 class="display-4">Gestion des Carrièress</h1>
                <div class="row justify-content-center">
                    <div class="col text-center mb-5">
                        <p class="lead">
                            La fin de votre carrière professionnelle marque une transition importante dans votre vie.
                            C'est le moment de réfléchir sur vos réalisations, de planifier votre retraite et de vous préparer à cette nouvelle étape.
                            Vous pouvez utiliser les options ci-dessous pour gérer les promotions, les affectations, les avancements, les reclassements
                            et les licenciements des employés.
                        </p>
                    </div>
                </div>
            </section>

            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Récapitulatif des Réalisations</a>
                <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Compétences Acquises</a>
                    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Défis Surmontés</a>
            </nav>
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tableau d'affichage des Réalisations -->
                        <div class="app-card app-card-orders-table shadow-sm mb-5 mt-2">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Titre</th>
                                                <th class="cell">Description</th>
                                                <th class="cell">Date</th>
                                                <th class="cell">Importance</th>
                                                <th class="cell">Commentaires</th>
                                                <th class="cell">Documentation ou preuve</th>
                                                <th class="cell">Actions</th> 
                                            </tr>
                                        </thead>
                                        <tbody>         
                                            <!-- Les données seront affichées ici -->
                                            <?php  while ($row = $requete0->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                <?php echo "<td>" . $row['titre'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row['description_detaillee'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row['date_realisation'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row['impact'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row['commentaires'] . "</td>"; ?>
                                                <?php  echo "<td><a href='" . $row['documentation'] . "' target='_blank'>Voir la documentation</a></td>"; ?>
                                                <?php  echo "<td><button class='btn app-btn-primary btn-sm p1' data-toggle='modal' data-target='#voirModal{$row['id']}'>Voir</button></td>"; ?>
                                                </tr>
                                                <!-- Modal de modification -->
                                                <div class="modal fade" id="voirModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="voirModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modifierModalLabel">Voir l'élément</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body"> 
                                                                <!-- Formulaire de modification avec les champs pré-remplis -->
                                                                <!-- Assurez-vous d'ajuster les valeurs des champs avec les données existantes -->
                                                                <form action="modifier_realisation.php" method="POST" enctype="multipart/form-data" >
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="titre">Titre * :</label>
                                                                                <input type="text" class="form-control" id="titre" required name="titre" value="<?php echo isset($row['titre']) ? $row['titre'] : ''; ?>">
                                                                            </div>
                                                                            <div class="form-group mt-2 ">
                                                                                <label for="description">Description détaillée * :</label>
                                                                                <textarea class="form-control" id="description" name="description" required rows="4"><?php echo isset($row['description_detaillee']) ? $row['description_detaillee'] : ''; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group mt-2 ">
                                                                                <label for="date">Date de Réalisation * :</label>
                                                                                <input type="date" class="form-control" id="date" required name="date" value="<?php echo isset($row['date_realisation']) ? $row['date_realisation'] : ''; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="impact">Importance ou impact * :</label>
                                                                                <select class="form-control" id="impact" required name="impact">
                                                                                    <option value="faible">Faible</option>
                                                                                    <option value="moyen">Moyen</option>
                                                                                    <option value="élevé">Élevé</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group mt-2">
                                                                                <label for="commentaires">Commentaires * :</label>
                                                                                <textarea class="form-control" id="commentaires" name="commentaires" rows="4"><?php echo isset($row['commentaires']) ? $row['commentaires'] : ''; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group mt-2">
                                                                                <label for="responsable">Responsable ou collaborateurs impliqués :</label>
                                                                                <input type="text" class="form-control" id="responsable" required name="responsable" value="<?php echo isset($row['responsables']) ? $row['responsables'] : ''; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mt-4">
                                                                        <label for="documentation">Documentation ou preuve * :</label>
                                                                        <input type="file" class="form-control" id="documentation" required name="documentation">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->   
                            </div><!--//app-card-body-->      
                        </div>
                    </div>
                </div>
            </div>
                </div><!--//tab-pane-->

                <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Tableau d'affichage des Réalisations -->
                                        <div class="app-card app-card-orders-table shadow-sm mb-5 mt-2">
                                            <div class="app-card-body">
                                                <div class="table-responsive">
                                                    <table class="table app-table-hover mb-0 text-left">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell">Titre</th>
                                                                <th class="cell">Description</th>
                                                                <th class="cell">Date</th>
                                                                <th class="cell">Importance</th>
                                                                <th class="cell">domaine</th>
                                                                <th class="cell">Methode</th>
                                                                <th class="cell">Actions</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>         
                                                            <!-- Les données seront affichées ici -->
                                                            <?php  while ($row1 = $requete1->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <tr>
                                                                <?php  echo "<td>" . $row1['titre'] . "</td>"; ?>
                                                                <?php  echo "<td>" . $row1['description'] . "</td>"; ?>
                                                                <?php  echo "<td>" . $row1['date_acquisition'] . "</td>"; ?>
                                                                <?php  echo "<td>" . $row1['niveau_maitrise'] . "</td>"; ?>
                                                                <?php  echo "<td>" . $row1['domaine'] . "</td>"; ?>
                                                                <?php  echo "<td>" . $row1['methode'] . "</td>"; ?>
                                                                <?php  echo "<td><button class='btn app-btn-primary btn-sm p1' data-toggle='modal' data-target='#voirModal1{$row1['id']}'>Voir</button></td>"; ?>
                                                                </tr>
                                                                <!-- Modal de modification -->
                                                                <div class="modal fade" id="voirModal1<?php echo $row1['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="voirModal1Label" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modifierModalLabel">Voir l'élément</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Formulaire de modification avec les champs pré-remplis -->
                                                                                    <form action="modifier_competence.php" method="POST">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6 ">
                                                                                                <div class="form-group">
                                                                                                    <label for="titreCompetence">Titre ou Nom de la Compétence* :</label>
                                                                                                    <input type="text" class="form-control" id="titreCompetence" name="titreCompetence" required value="<?php echo isset($row1['titre']) ? $row1['titre'] : ''; ?>" >
                                                                                                </div>
                                                                                                <div class="form-group mt-4">
                                                                                                    <label for="descriptionCompetence">Description de la Compétence* :</label>
                                                                                                    <textarea class="form-control" id="descriptionCompetence" required name="descriptionCompetence" rows="4"><?php echo isset($row1['description']) ? $row1['description'] : ''; ?></textarea>
                                                                                                </div>
                                                                                                <div class="form-group mt-4">
                                                                                                    <label for="dateAcquisition">Date d'Acquisition* :</label>
                                                                                                    <input type="date" class="form-control" id="dateAcquisition" name="dateAcquisition" value="<?php echo isset($row1['date_acquisition']) ? $row1['date_acquisition'] : ''; ?>" required >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="impact">Niveau de Maîtrise* :</label>
                                                                                                    <select class="form-control" id="impact" name="impact" required>
                                                                                                        <option value="Débutant">Débutant</option>
                                                                                                        <option value="Intermédiaire">Intermédiaire</option>
                                                                                                        <option value="Avancé">Avancé</option>
                                                                                                        <option value="Expert">Expert</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div class="form-group mt-4">
                                                                                                    <label for="dureeApprentissage">Durée de l'Apprentissage* :</label>
                                                                                                    <input type="text" class="form-control" id="dureeApprentissage" name="dureeApprentissage" value="<?php echo isset($row1['duree_apprentissage']) ? $row1['duree_apprentissage'] : ''; ?>" required>
                                                                                                </div>
                                                                                                <div class="form-group mt-4">
                                                                                                    <label for="domaineCompetence">Domaine ou Catégorie de Compétence* :</label>
                                                                                                    <input type="text" class="form-control" id="domaineCompetence" required value="<?php echo isset($row1['domaine']) ? $row1['domaine'] : ''; ?>" name="domaineCompetence" placeholder="par exemple, informatique, langues, gestion de projet, communication" >
                                                                                                </div>
                                                                                            </div>   
                                                                                        </div>   
                                                                                        <div class="form-group mt-2">
                                                                                            <label for="methode">Méthodes d'Acquisition * :</label>
                                                                                            <select class="form-control"  id="methode" required name="methode">
                                                                                                <option value="Formation">Formation ( en ligne, en présentiel)</option>
                                                                                                <option value="Auto-apprentissage">Auto-apprentissage</option>
                                                                                                <option value="Mentorat">Mentorat</option>
                                                                                                <option value="Autres">Autres</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div><!--//table-responsive-->   
                                            </div><!--//app-card-body-->      
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--//tab-content-->

                <div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
                    <div class="container">
                    
                        <!-- Tableau d'affichage des défis surmontés -->
                        <div class="app-card app-card-orders-table mb-5 mt-4">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">Titre</th>
                                                <th class="cell">Description</th>
                                                <th class="cell">Catégorie</th>
                                                <th class="cell">Niveau</th>
                                                <th class="cell">Approche Adoptée</th>
                                                <th class="cell">Collaborateurs Impliqués</th>
                                                <th class="cell">Leçons Apprises</th>
                                                <th class="cell">Action</th>
                                                <!-- Ajoutez d'autres en-têtes de colonnes ici -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Les données des défis surmontés seront affichées ici -->
                                            <?php  while ($row2 = $requete2->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                <?php  echo "<td>" . $row2['titre'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row2['description'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row2['categorie'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row2['niveau'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row2['strategie'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row2['collaborateurs'] . "</td>"; ?>
                                                <?php  echo "<td>" . $row2['lecons'] . "</td>"; ?>
                                                <?php  echo "<td><button class='btn app-btn-primary btn-sm p1' data-toggle='modal' data-target='#voirModal2{$row2['id']}'>Voir</button></td>"; ?>
                                                </tr>
                                                    <!-- Modal de modification -->
                                                    <div class="modal fade" id="voirModal2<?php echo $row2['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="voirModal2Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modifierModalLabel">Voir l'élément</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Formulaire de modification avec les champs pré-remplis -->
                                                                    <!-- Assurez-vous d'ajuster les valeurs des champs avec les données existantes -->
                                                                    <form action="modifier_defi.php" method="POST">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="titreDefi">Titre ou Résumé du Défi :</label>
                                                                                        <input type="text" class="form-control" id="titreDefi" name="titreDefi" value="<?php echo isset($row2['titre']) ? $row2['titre'] : ''; ?>">
                                                                                    </div>
                                                                                    <div class="form-group mt-2 ">
                                                                                        <label for="descriptionDefi">Description détaillée :</label>
                                                                                        <textarea class="form-control" id="descriptionDefi" name="descriptionDefi" rows="4"><?php echo isset($row2['description']) ? $row2['description'] : ''; ?></textarea>
                                                                                    </div>
                                                                                    <div class="form-group mt-2 ">
                                                                                        <label for="categorieDefi">Catégorie du Défi :</label>
                                                                                        <select class="form-control" required id="categorieDefi" name="categorieDefi">
                                                                                        <option value="Professionnel">Professionnel</option>
                                                                                        <option value="Personnel">Personnel</option>
                                                                                        <option value="Technique">Technique</option>
                                                                                        <option value="Relationnel">Relationnel</option>
                                                                                        <option value="Autres">Autres</option>
                                                                                                    </select>
                                                                                    </div>
                                                                                    <div class="form-group mt-2 ">
                                                                                        <label for="niveauDifficulte">Niveau de Difficulté :</label>
                                                                                        <select class="form-control" id="impact" required name="impact">
                                                                                        <option value="faible">Faible</option>
                                                                                        <option value="moyen">Moyen</option>
                                                                                        <option value="élevé">Élevé</option>
                                                                                                    </select>
                                                                                    </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="approcheDefi">Stratégie Adoptée :</label>
                                                                                    <input type="text" class="form-control" id="approcheDefi" name="approcheDefi" value="<?php echo isset($row2['strategie']) ? $row2['strategie'] : ''; ?>">
                                                                                </div>
                                                                                <div class="form-group mt-2">
                                                                                    <label for="collaborateursDefi">Collaborateurs Impliqués :</label>
                                                                                    <input type="text" class="form-control" id="collaborateursDefi" name="collaborateursDefi" value="<?php echo isset($row2['collaborateurs']) ? $row2['collaborateurs'] : ''; ?>">
                                                                                </div>
                                                                                <div class="form-group mt-2">
                                                                                    <label for="leconsApprises">Leçons Apprises :</label>
                                                                                    <input type="text" class="form-control" id="leconsApprises" name="leconsApprises" value="<?php echo isset($row2['lecons']) ? $row2['lecons'] : ''; ?>">
                                                                                </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    </form> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div><!--//app-card-->
                </div><!--//tab-content-->
                
            </div>

            <div class="container">
                    
                    <div class="row">
                        <div class="col-md-3 mb-5">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title text-center mb-3" style="color: #007bff;">Promotion</h4>
                                    <button class="btn btn-info btn-block" style="color:white;" onclick="toggleForm('promotion')">Ajouter une Promotion</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-5">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title text-center mb-3" style="color: #dc3545;">Affectation</h4>
                                    <button class="btn btn-danger btn-block" style="color: white;" onclick="toggleForm('affectation')">Ajouter une Affectation</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-5">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title text-center mb-3" style="color: #28a745;">Avancement</h4>
                                    <button class="btn btn-success btn-block" style="color: white;" onclick="toggleForm('avancement')">Ajouter un Avancement</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-5">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title text-center mb-3" style="color: #ffc107;">Reclassement</h4>
                                    <button class="btn btn-warning btn-block" style="color: white;" onclick="toggleForm('reclassement')">Ajouter un Reclassment</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-3" style="color: #6c757d;">Licenciement</h4>
                            <button class="btn btn-secondary btn-block" style="color: white;" onclick="toggleForm('licenciement')">Ajouter un Licenciement</button>
                        </div>
                    </div>
                </div>
                    </div>
                <!-- Formulaires -->
                    <div class="row mt-5">
                        <div class="col-md-8 offset-md-2">
                            <div id="formPromotion" class="card" style="display: none;">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-4">Formulaire de Promotion</h3>
                                    <form action="traitement_promotion.php" method="POST">
                                    <input type="hidden" id="id" name="id" value="<?php echo isset($idEmp) ? $idEmp: ''; ?>" class="form-control" readonly>
                                        <div class="row">
                                            <!-- Première colonne -->
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <div class="mb-3">
                                                        <label for="nom" class="form-label">Nom complet de l'employé :</label>
                                                        <input type="text" id="nom" name="nom" class="form-control" value="<?php echo isset($employes['nom']) ? $employes['nom']: ''; ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="poste_actuel" class="form-label">Poste actuel :</label>
                                                        <input type="text" id="poste_actuel" name="poste_actuel" class="form-control" value="<?php echo isset($employes['poste']) ? $employes['poste']: ''; ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="departement" class="form-label">Département :</label>
                                                        <input type="text" id="departement" name="departement" class="form-control" value="<?php echo isset($employes['departement']) ? $employes['departement']: ''; ?>"   required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="approbation" class="form-label">Approbation du responsable des RH :</label>
                                                        <input type="text" id="approbation" name="approbation" class="form-control" required>
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="date_effet" class="form-label">Date d'effet de la promotion :</label>
                                                        <input type="date" id="date_effet" name="date_effet" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="salaire_propose" class="form-label">Salaire proposé pour le nouveau poste :</label>
                                                        <input type="text" id="salaire_propose" name="salaire_propose" class="form-control">
                                                    </div>

                                                </fieldset>
                                            </div>

                                            <!-- Deuxième colonne -->
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <div class="mb-3">
                                                        <label for="departemented" class="form-label">Departement proposé pour la promotion :</label>
                                                        <select id="departemented" name="departemented" class="form-control" required>
                                                                <option value="">Sélectionnez un departement</option>
                                                                <!-- Options des postes chargées dynamiquement en JavaScript -->
                                                            </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="posted" class="form-label">Poste proposé pour la promotion :</label>
                                                        <select id="posted" name="posted" class="form-control" required>
                                                                <option value="">Sélectionnez un poste</option>
                                                                <!-- Options des postes chargées dynamiquement en JavaScript -->
                                                            </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="date_prise_poste" class="form-label">Prise de poste dans le nouveau rôle :</label>
                                                        <input type="date" id="date_prise_poste" name="date_prise_poste" class="form-control" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="justification" class="form-label">Justification de la promotion :</label>
                                                        <textarea id="justification" name="justification" class="form-control" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recommandations" class="form-label">Avis du supérieur direct de l'employé :</label>
                                                        <textarea id="recommandations" name="recommandations" class="form-control"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="commentaires" class="form-label">Commentaire supplémentaire :</label>
                                                        <textarea id="commentaires" name="commentaires" class="form-control"></textarea>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <!-- Suite des champs -->
                                        <div class="row"> 
                                            <div class="col-md-12 ml-4">
                                                <fieldset>
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" id="acceptation_terms" name="acceptation_terms" class="form-check-input" required>
                                                        <label class="form-check-label" for="acceptation_terms">J'accepte les termes et conditions de la promotion</label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <!-- Boutons de soumission -->
                                        <div class="row">
                                            <div class="col-md-6 mb-4 ml-4">
                                                <button type="submit" class="btn app-btn-primary">Soumettre</button>
                                                <button type="reset" class="btn btn-danger"  style="color:white;" >Annuler</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div id="formAffectation" class="card" style="display: none;">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-4">Formulaire d'Affectation</h3>
                                    <form action="traitement_affectation.php" method="POST">
                                    <input type="hidden" id="id" name="id" value="<?php echo isset($idEmp) ? $idEmp: ''; ?>" class="form-control" required>
                                    
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Nom complet de l'employé :</label>
                                            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo isset($employes['nom']) ? $employes['nom']: ''; ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="departements" class="form-label">Département :</label>
                                            <select id="departements" name="departements" class="form-control" required>
                                                <option value="">Sélectionnez un departement</option>
                                                <!-- Options des postes chargées dynamiquement en JavaScript -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="postes" class="form-label">Poste proposé pour l'affectation :</label>
                                            <select id="postes" name="postes" class="form-control" required>
                                                <option value="">Sélectionnez un poste</option>
                                                <!-- Options des postes chargées dynamiquement en JavaScript -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="date_affectation" class="form-label">Date prévue d'affectation :</label>
                                            <input type="date" id="date_affectation" name="date_affectation" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn app-btn-primary">Soumettre</button>
                                        <button type="reset" class="btn btn-secondary">Annuler</button>
                                    </form>
                                </div>
                            </div>


                            <div id="formAvancement" class="card" style="display: none;">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-4">Formulaire d'Avancement</h3>
                                    <form action="traitement_avancement.php" method="POST">
                                    <input type="hidden" id="id" name="id" value="<?php echo isset($idEmp) ? $idEmp: ''; ?>" class="form-control" required>
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom complet de l'employé :</label>
                                        <input type="text" id="nom" name="nom" value="<?php echo isset($employes['nom']) ? $employes['nom']: ''; ?>" class="form-control" readonly>
                                    </div>
                                    <input type="hidden" id="departemente" name="departemente" value="<?php echo isset($employes['departement']) ? $employes['departement']: ''; ?>" class="form-control" readonly>
                                        <div class="mb-3">
                                            <label for="poste_actuel" class="form-label">Designation actuelle :</label>
                                            <input type="text" id="poste_actuel" value="<?php echo isset($employes['designation']) ? $employes['designation']: ''; ?>" name="poste_actuel" class="form-control" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="poste1" class="form-label">Nouvelle Désignation :</label>
                                            <input type="text" id="designation"  name="designation" class="form-control" required>
                                        </div>
                                    <button type="submit" class="btn app-btn-primary">Soumettre</button>
                                    <button type="reset" class="btn btn-secondary">Annuler</button>
                                </form>
                                </div>
                            </div>


                            <div id="formReclassement" class="card" style="display: none;">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-4">Formulaire de Reclassment</h3>
                                    <form action="traitement_reclassement.php" method="POST">
                                    <input type="hidden" id="id" name="id" value="<?php echo isset($idEmp) ? $idEmp: ''; ?>" class="form-control" required>
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Nom complet de l'employé :</label>
                                            <input type="text" id="nom" name="nom" value="<?php echo isset($employes['nom']) ? $employes['nom']: ''; ?>" class="form-control" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="poste_actuel" class="form-label">Poste actuel :</label>
                                            <input type="text" id="poste_actuel" value="<?php echo isset($employes['poste']) ? $employes['poste']: ''; ?>" name="poste_actuel" class="form-control" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nouveau_grade" class="form-label">Nouveau grade souhaité :</label>
                                            <input type="text" id="nouveau_grade" name="nouveau_grade" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn app-btn-primary">Soumettre</button>
                                        <button type="reset" class="btn btn-secondary">Annuler</button>
                                    </form>
                                </div>
                            </div>

                            <div id="formLicenciement" class="card" style="display: none;">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-4">Formulaire de Licenciementt</h3>
                                    <form action="traitement_licenciement.php" method="POST">
                                    <input type="hidden" id="id" name="id" value="<?php echo isset($idEmp) ? $idEmp: ''; ?>" class="form-control" required>
                                        <fieldset>
                                            <legend>Informations sur l'employé à licencier :</legend>
                                            <div class="mb-3">
                                                <label for="nom" class="form-label">Nom complet de l'employé :</label>
                                                <input type="text" id="nom" name="nom" value="<?php echo isset($employes['nom']) ? $employes['nom']: ''; ?>" class="form-control" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="poste_actuel" class="form-label">Poste actuel :</label>
                                                <input type="text" id="poste_actuel" name="poste_actuel" value="<?php echo isset($employes['poste']) ? $employes['poste']: ''; ?>" class="form-control" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="motif_licenciement" class="form-label">Motif du licenciement :</label>
                                                <textarea id="motif_licenciement" name="motif_licenciement" class="form-control" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date_licenciement" class="form-label">Date prévue du licenciement :</label>
                                                <input type="date" id="date_licenciement" name="date_licenciement" class="form-control" required>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Acceptation des Termes et Conditions :</legend>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" id="acceptation_terms" name="acceptation_terms" class="form-check-input" required>
                                                <label class="form-check-label" for="acceptation_terms">J'accepte les termes et conditions du licenciement</label>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-danger" style="color:white;" >Licencier</button>
                                        <button type="reset" class="btn btn-secondary">Annuler</button>
                                    </form>
                                </div>
                            </div>



                        </div>
                    </div>
            </div>

            <div class="container">
                        <div class="row">
                        <!-- Colonne pour les listes -->
                            <div class="col-md-6">
                            <!-- Affichage de la liste des affectations -->
                                <div class="card mt-4">
                                <div class="card-header text-sm-center">Demande de Démission</div>
                                    <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cell">Raison de la demande :</td>
                                                <td class="cell">Actions</td>
                                            </tr>
                                            <?php while ($row = $stmtDemission->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <td><?= $row['raison'] ?></td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-success btn-sm p-1" style="color:white;">Approuver</button>
                                                        <button type="button" class="btn btn-danger btn-sm p-1" style="color:white;">Refuser</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <!-- Affichage de la liste des promotions -->
                                <div class="card mt-4">
                                <div class="card-header text-sm-center">Demande de retraite</div>
                                    <div class="card-body">
                                    <!-- Insérez ici le code pour afficher la liste des promotions -->
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="cell">Date de la retraite :</td>
                                                <td class="cell">Actions</td>
                                            </tr>
                                            <?php while ($row = $stmtRetraite->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <td><?= $row['date_retraite'] ?></td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-success btn-sm p-1" style="color:white;">Approuver</button>
                                                        <button type="button" class="btn btn-danger btn-sm p-1" style="color:white;">Refuser</button>
                                                    </td>
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

  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function toggleForm(formId) {
        // Masquer tous les formulaires
        document.getElementById('formPromotion').style.display = 'none';
        document.getElementById('formAffectation').style.display = 'none';
        document.getElementById('formAvancement').style.display = 'none';
        document.getElementById('formReclassement').style.display = 'none';
        document.getElementById('formLicenciement').style.display = 'none';

        // Afficher le formulaire correspondant au bouton cliqué
        document.getElementById('form' + formId.charAt(0).toUpperCase() + formId.slice(1)).style.display = 'block';
    }

 // Fonction pour charger les départements et les postes spécifiques à chaque formulaire
function chargerDepartementsEtPostes(departementId, posteId) {
    // Envoyer une requête HTTP GET pour récupérer les données JSON
    fetch('charger_departements_postes.php')
    .then(response => response.json())
    .then(data => {
        // Sélectionner l'élément HTML du département spécifique au formulaire
        let selectDepartement = document.getElementById(departementId);
        // Vider le contenu actuel du sélecteur
        selectDepartement.innerHTML = '<option value="">Sélectionnez un département</option>';
        
        // Sélectionner l'élément HTML du poste spécifique au formulaire
        let selectPoste = document.getElementById(posteId);
        // Vider le contenu actuel du sélecteur
        selectPoste.innerHTML = '<option value="">Sélectionnez un poste</option>';
        
        // Parcourir les données JSON pour ajouter les options de département
        Object.keys(data).forEach(nomDepartement => {
            selectDepartement.innerHTML += `<option value="${nomDepartement}">${nomDepartement}</option>`;
        });
        
        // Écouter les changements sur le sélecteur de département pour charger les options des postes correspondants
        selectDepartement.addEventListener('change', function() {
            let nomDepartement = this.value;
            if (nomDepartement) {
                // Vider le sélecteur de poste actuel
                selectPoste.innerHTML = '<option value="">Sélectionnez un poste</option>';
                
                // Récupérer les postes associés au département sélectionné
                let postes = data[nomDepartement];
                
                // Ajouter les options de poste dans le sélecteur correspondant
                postes.forEach(nomPoste => {
                    selectPoste.innerHTML += `<option value="${nomPoste}">${nomPoste}</option>`;
                });
            } else {
                // Si aucun département n'est sélectionné, vider le sélecteur de poste
                selectPoste.innerHTML = '<option value="">Sélectionnez un poste</option>';
            }
        });
    })
    .catch(error => {
        console.error('Erreur lors du chargement des départements et postes :', error);
    });
}


// Appeler la fonction pour charger les options des départements et des postes au chargement de la page
window.onload = function() {
    chargerDepartementsEtPostes('departemented', 'posted');
    chargerDepartementsEtPostes('departements', 'postes');
}




</script>
  </body>
</html>
