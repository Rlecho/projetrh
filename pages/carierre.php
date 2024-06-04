<?php
    require_once("identifier.php");
    require_once("connexiondb.php");
    $idEmp=$_SESSION['user']['idemp'];
    $requete="select *from employes where idemp=$idEmp";
    $resultat=$pdo->query($requete);
    $employes=$resultat->fetch();
    
    $sql = "SELECT * FROM realisation where idemp=$idEmp";
    $requete = $pdo->query($sql);

    
    $sql1 = "SELECT * FROM competence where idemp=$idEmp";
    $requete1 = $pdo->query($sql1);

    
    $sql2 = "SELECT * FROM defi where idemp=$idEmp";
    $requete2 = $pdo->query($sql2);


    $sql3 = "SELECT * FROM affectation where idemp=$idEmp";
    $requete3 = $pdo->query($sql3);


    $sql4 = "SELECT * FROM avancement where idemp=$idEmp";
    $requete4 = $pdo->query($sql4);


    $sql5 = "SELECT * FROM promotion where idemp=$idEmp";
    $requete5 = $pdo->query($sql5);

    $sql6 = "SELECT * FROM reclassement where idemp=$idEmp";
    $requete6 = $pdo->query($sql6);
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
                    .text-gris {
                        color: #847777; /* Couleur grise de Bootstrap */
                        }
                    .badge {
                        padding: 5px 10px;
                        border-radius: 5px;
                        color: #fff;
                        font-size: 12px;
                    }
                    .badge-green {
                        background-color: #28a745;
                    }
                    .badge-red {
                        background-color: #dc3545;
                    }
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
                    <?php include('a.php');?>
                    </div>
                    <div>
                        <hr style="background-color:green; height:2px">
                        <div class="container">
                            <p class="lead" >La fin de votre carrière professionnelle marque une transition importante dans votre vie. C'est le moment de réfléchir sur vos réalisations, de planifier votre retraite et de vous préparer à cette nouvelle étape.</p>

                            <center><h3 class="lead" style="color: #AD6B14;" >Bilan de Carrière</h3></center>   
                    
                            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Récapitulatif des Réalisations</a>
                                <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Compétences Acquises</a>
                                <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Défis Surmontés</a>
                            </nav>

                            <div class="tab-content" id="orders-table-tab-content">


                                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                                    <div class="container mt-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Formulaire pour le Récapitulatif des Réalisations -->
                                                <div id="formRealisations" class="form-container">
                                                    <form action="traitement_realisation.php" method="POST" enctype="multipart/form-data" >
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="titre">Titre * :</label>
                                                                    <input type="text" class="form-control" id="titre" required name="titre">
                                                                </div>
                                                                <div class="form-group mt-2 ">
                                                                    <label for="description">Description détaillée * :</label>
                                                                    <textarea class="form-control" id="description" name="description" required rows="4"></textarea>
                                                                </div>
                                                                <div class="form-group mt-2 ">
                                                                    <label for="date">Date de Réalisation * :</label>
                                                                    <input type="date" class="form-control" id="date" required name="date">
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
                                                                    <textarea class="form-control" id="commentaires" name="commentaires" rows="4"></textarea>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <label for="responsable">Responsable ou collaborateurs impliqués :</label>
                                                                    <input type="text" class="form-control" id="responsable" required name="responsable">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <label for="documentation">Documentation ou preuve * :</label>
                                                            <input type="file" class="form-control" id="documentation" required name="documentation">
                                                        </div>
                                                        <button type="submit" class="btn app-btn-primary mt-4">Enregistrer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="border: solid 2px;;" >
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Tableau d'affichage des Réalisations -->
                                                <div class="app-card app-card-orders-table shadow-sm mb-5 mt-4">
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
                                                                    <?php  while ($row = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <tr>
                                                                    <?php echo "<td>" . $row['titre'] . "</td>"; ?>
                                                                    <?php  echo "<td>" . $row['description_detaillee'] . "</td>"; ?>
                                                                    <?php  echo "<td>" . $row['date_realisation'] . "</td>"; ?>
                                                                    <?php  echo "<td>" . $row['impact'] . "</td>"; ?>
                                                                    <?php  echo "<td>" . $row['commentaires'] . "</td>"; ?>
                                                                    <?php  echo "<td><a href='" . $row['documentation'] . "' target='_blank'>Voir la documentation</a></td>"; ?>
                                                                    <?php  echo "<td>
                                                                                     <button class='btn btn-danger btn-sm p1' style='color:white' data-toggle='modal' data-target='#deleteModal{$row['id']}'>Supprimer</button>
                                                                                     <button class='btn app-btn-primary btn-sm p1' data-toggle='modal' data-target='#modifierModal{$row['id']}'>Modifier</button>
                                                                    </td>"; ?>
                                                                    </tr>
                                                                        <!-- Modal de suppression -->
                                                                        <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                Êtes-vous sûr de vouloir supprimer cet élément ?
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                                                                <a href="supprimer_realisation.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Oui</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                        </div>
        
                                                                        <!-- Modal de modification -->
                                                                        <div class="modal fade" id="modifierModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="modifierModalLabel">Modifier l'élément</h5>
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
                                                                                            <button type="submit" class="btn app-btn-primary mt-4">Enregistrer</button>
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
                                                <!-- Formulaire pour les Compétences Acquises -->
                                                <div id="formCompetences" class="form-container">       
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="traitement_competences.php" method="POST">
                                                                <div class="row">
                                                                    <div class="col-md-6 ">
                                                                        <div class="form-group">
                                                                            <label for="titreCompetence">Titre ou Nom de la Compétence* :</label>
                                                                            <input type="text" class="form-control" id="titreCompetence" name="titreCompetence" required >
                                                                        </div>
                                                                        <div class="form-group mt-4">
                                                                            <label for="descriptionCompetence">Description de la Compétence* :</label>
                                                                            <textarea class="form-control" id="descriptionCompetence" required name="descriptionCompetence" rows="4"></textarea>
                                                                        </div>
                                                                        <div class="form-group mt-4">
                                                                            <label for="dateAcquisition">Date d'Acquisition* :</label>
                                                                            <input type="date" class="form-control" id="dateAcquisition" name="dateAcquisition" required >
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
                                                                            <input type="text" class="form-control" id="dureeApprentissage" name="dureeApprentissage" required>
                                                                        </div>
                                                                        <div class="form-group mt-4">
                                                                            <label for="domaineCompetence">Domaine ou Catégorie de Compétence* :</label>
                                                                            <input type="text" class="form-control" id="domaineCompetence" required name="domaineCompetence" placeholder="par exemple, informatique, langues, gestion de projet, communication" >
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
                                                                <button type="submit" class="btn app-btn-primary mt-4 ">Enregistrer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <hr style="border: solid 2px;" >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- Tableau d'affichage des Réalisations -->
                                                        <div class="app-card app-card-orders-table shadow-sm mb-5 mt-4">
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
                                                                            <?php  echo "<td>
                                                                                     <button class='btn btn-danger btn-sm p1' style='color:white' data-toggle='modal' data-target='#deleteModal{$row1['id']}'>Supprimer</button>
                                                                                     <button class='btn app-btn-primary btn-sm p1' data-toggle='modal' data-target='#modifierModal{$row1['id']}'>Modifier</button>
                                                                    </td>"; ?>
                                                                    </tr>
                                                                        <!-- Modal de suppression -->
                                                                        <div class="modal fade" id="deleteModal<?php echo $row1['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                Êtes-vous sûr de vouloir supprimer cet élément ?
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                                                                <a href="supprimer_competence.php?id=<?php echo $row1['id']; ?>" class="btn btn-danger">Oui</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                        </div>
        
                                                                        <!-- Modal de modification -->
                                                                        <div class="modal fade" id="modifierModal<?php echo $row1['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="modifierModalLabel">Modifier l'élément</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <!-- Formulaire de modification avec les champs pré-remplis -->
                                                                                        <!-- Assurez-vous d'ajuster les valeurs des champs avec les données existantes -->
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
                                                                                            <button type="submit" class="btn app-btn-primary mt-4 ">Enregistrer</button>
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Formulaire pour les Défis Surmontés -->
                                                <div id="formDefis" class="form-container">
                                                    <form action="traitement_defis.php" method="POST">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="titreDefi">Titre ou Résumé du Défi :</label>
                                                                            <input type="text" class="form-control" id="titreDefi" name="titreDefi">
                                                                        </div>
                                                                        <div class="form-group mt-2 ">
                                                                            <label for="descriptionDefi">Description détaillée :</label>
                                                                            <textarea class="form-control" id="descriptionDefi" name="descriptionDefi"  rows="4"></textarea>
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
                                                                        <label for="approcheDefi">Stratégie ou Approche Adoptée :</label>
                                                                        <input type="text" class="form-control" id="approcheDefi" name="approcheDefi">
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <label for="collaborateursDefi">Collaborateurs Impliqués :</label>
                                                                        <input type="text" class="form-control" id="collaborateursDefi" name="collaborateursDefi">
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <label for="leconsApprises">Leçons Apprises :</label>
                                                                        <input type="text" class="form-control" id="leconsApprises" name="leconsApprises">
                                                                    </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn app-btn-primary mt-4">Enregistrer</button>
                                                    </form>     
                                                </div>
                                            </div>
                                        </div>
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
                                                                <th class="cell">Niveau de Difficulté</th>
                                                                <th class="cell">Approche Adoptée</th>
                                                                <th class="cell">Collaborateurs Impliqués</th>
                                                                <th class="cell">Leçons Apprises</th>
                                                                <th class="cell">Actions</th>
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
                                                                    <?php  echo "<td>
                                                                                     <button class='btn btn-danger btn-sm p1' style='color:white' data-toggle='modal' data-target='#deleteModal{$row2['id']}'>Supprimer</button>
                                                                                     <button class='btn app-btn-primary btn-sm p1' data-toggle='modal' data-target='#modifierModal{$row2['id']}'>Modifier</button>
                                                                    </td>"; ?>
                                                                    </tr>
                                                                        <!-- Modal de suppression -->
                                                                        <div class="modal fade" id="deleteModal<?php echo $row2['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                Êtes-vous sûr de vouloir supprimer cet élément ?
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                                                                <a href="supprimer_defi.php?id=<?php echo $row2['id']; ?>" class="btn btn-danger">Oui</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                        </div>
        
                                                                        <!-- Modal de modification -->
                                                                        <div class="modal fade" id="modifierModal<?php echo $row2['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="modifierModalLabel">Modifier l'élément</h5>
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
                                                                                        <button type="submit" class="btn app-btn-primary mt-4">Enregistrer</button>
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

                            <hr style="border: solid 2px;" >
                            <div class="container">
                                <div class="row">
                                <!-- Colonne pour les listes -->
                                    <div class="col-md-6">
                                    <!-- Affichage de la liste des affectations -->
                                        <div class="card">
                                        <div class="card-header text-sm-center">Liste de mes affectations</div>
                                            <div class="card-body">
                                            <!-- Insérez ici le code pour afficher la liste des affectations -->
                                                <div class="table-responsive">
                                                    <table class="table app-table-hover mb-0 text-left">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell small text-gris ">Departement</th>
                                                                <th class="cell small text-gris ">Poste proposé</th>
                                                                <th class="cell small text-gris ">Date</th>
                                                                <th class="cell small text-gris ">Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>         
                                                            <!-- Les données seront affichées ici -->
                                                            <?php  while ($row3 = $requete3->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <tr>
                                                                <?php  echo "<td>" . $row3['departement'] . "</td>"; ?>
                                                                <?php  echo "<td>" . $row3['poste_propose'] . "</td>"; ?>
                                                                <?php  echo "<td>" . $row3['date_prevue_affectation'] . "</td>"; ?>
                                                                <?php  echo "<td><button class='btn app-btn-primary btn-sm p-1' data-toggle='modal' data-target='#voiraffet{$row3['id']}'>voir</button></td>"; ?>
                                                                </tr>
                                                                    <div class="modal fade" id="voiraffet<?php echo $row3['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="voirAffetLabel" aria-hidden="true">
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
                                                                                        <form action="" method="POST" enctype="multipart/form-data" >
                                                                                            <div class="row">
                                                                                                    <div class="form-group">
                                                                                                        <label for="Nom d'employe">Titre * :</label>
                                                                                                        <input type="text" class="form-control" id="NOM" required name="nom" value="<?php echo isset($row3['nom_complet_employe']) ? $row3['nom_complet_employe'] : ''; ?>">
                                                                                                    </div>
                                                                                                    <div class="form-group mt-2 ">
                                                                                                        <label for="date">Date Prevue Affectation :</label>
                                                                                                        <input type="date" class="form-control" id="date" required name="date" value="<?php echo isset($row3['date_prevue_affectation']) ? $row3['date_prevue_affectation'] : ''; ?>">
                                                                                                    </div>
                                                                                                    <div class="form-group mt-2">
                                                                                                        <label for="responsable">Departement:</label>
                                                                                                        <input type="text" class="form-control" id="departement" required name="responsable" value="<?php echo isset($row3['departement']) ? $row3['departement'] : ''; ?>">
                                                                                                    </div>
                                                                                                    <div class="form-group mt-2">
                                                                                                        <label for="responsable">Poste :</label>
                                                                                                        <input type="text" class="form-control" id="responsable" required name="responsable" value="<?php echo isset($row3['poste_propose']) ? $row3['poste_propose'] : ''; ?>">
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
                                            </div>
                                        </div>
                                    <!-- Affichage de la liste des promotions -->
                                        <div class="card mt-4">
                                        <div class="card-header text-sm-center">Liste de mes promotions</div>
                                            <div class="card-body">
                                            <!-- Insérez ici le code pour afficher la liste des promotions -->
                                                <div class="table-responsive">
                                                    <table class="table app-table-hover mb-0 text-left">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell small text-gris ">Departement proposé</th>
                                                                <th class="cell small text-gris ">Poste proposé</th>
                                                                <th class="cell small text-gris ">Prise de poste</th>
                                                                <th class="cell small text-gris ">Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>         
                                                            <!-- Les données seront affichées ici -->
                                                            <?php  while ($row5 = $requete5->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <tr>
                                                                <?php  echo "<td class='small' >" . $row5['departe'] . "</td>"; ?>
                                                                <?php  echo "<td class='small' >" . $row5['poste_propose'] . "</td>"; ?>
                                                                <?php  echo "<td class='small' >" . $row5['date_prise_poste'] . "</td>"; ?>
                                                                <?php  echo "<td class='small' ><button class='btn app-btn-primary btn-sm p-1' data-toggle='modal' data-target='#voirpromo{$row5['id']}'>voir</button></td>"; ?>
                                                                </tr>

                                                                <div class="modal fade" id="voirpromo<?php echo $row5['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="voirPromoLabel" aria-hidden="true">
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
                                                                                        <form action="traitement_promotion.php" method="POST">
                                                                                                    <input type="hidden" id="id" name="id" value="<?php echo isset($idEmp) ? $idEmp: ''; ?>" class="form-control" readonly>
                                                                                                        <div class="row">
                                                                                                            <!-- Première colonne -->
                                                                                                            <div class="col-md-6">
                                                                                                                <fieldset>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="nom" class="form-label">Nom complet de l'employé :</label>
                                                                                                                        <input type="text" id="nom" name="nom" class="form-control" value="<?php echo isset($row5['nom_complet_employe']) ? $row5['nom_complet_employe'] : ''; ?>">
                                                                                                                    </div>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="poste_actuel" class="form-label">Poste actuel :</label>
                                                                                                                        <input type="text" id="poste_actuel" name="poste_actuel" class="form-control" value="<?php echo isset($row5['poste_actuel']) ? $row5['poste_actuel'] : ''; ?>">
                                                                                                                    </div>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="departement" class="form-label">Département :</label>
                                                                                                                        <input type="text" id="departement" name="departement" class="form-control" value="<?php echo isset($row5['departement']) ? $row5['departement'] : ''; ?>">
                                                                                                                    </div>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="approbation" class="form-label">Approbation du  RH :</label>
                                                                                                                        <input type="text" id="approbation" name="approbation" class="form-control" value="<?php echo isset($row5['approbation_responsable_rh']) ? $row5['approbation_responsable_rh'] : ''; ?>">
                                                                                                                    </div>
                                                                                                                    
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="date_effet" class="form-label">Date d'effet de la promotion :</label>
                                                                                                                        <input type="date" id="date_effet" name="date_effet" class="form-control" value="<?php echo isset($row5['date_effet_promotion']) ? $row5['date_effet_promotion'] : ''; ?>">
                                                                                                                    </div>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="salaire_propose" class="form-label">Salaire proposé  :</label>
                                                                                                                        <input type="text" id="salaire_propose" name="salaire_propose" class="form-control" value="<?php echo isset($row5['salaire_propose']) ? $row5['salaire_propose'] : ''; ?>">
                                                                                                                    </div>

                                                                                                                </fieldset>
                                                                                                            </div>

                                                                                                            <!-- Deuxième colonne -->
                                                                                                            <div class="col-md-6">
                                                                                                                <fieldset>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="departemented" class="form-label">Departement proposé  :</label>
                                                                                                                        <select id="departemented" name="departemented" class="form-control" >
                                                                                                                                <option value=""><?php echo $row5['departe']; ?></option>
                                                                                                                            </select>
                                                                                                                    </div>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="posted" class="form-label">Poste proposé :</label>
                                                                                                                        <select id="posted" name="posted" class="form-control" required>
                                                                                                                                <option ><?php echo $row5['poste_propose']; ?></option>
                                                                                                                                <!-- Options des postes chargées dynamiquement en JavaScript -->
                                                                                                                            </select>
                                                                                                                    </div>

                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="date_prise_poste" class="form-label">Prise de poste  :</label>
                                                                                                                        <input type="date" id="date_prise_poste" name="date_prise_poste" class="form-control" value="<?php echo isset($row5['date_prise_poste']) ? $row5['date_prise_poste'] : ''; ?>">
                                                                                                                    </div>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="justification" class="form-label">Justification :</label>
                                                                                                                        <textarea id="justification" name="justification" class="form-control"><?php echo isset($row5['justification_promotion']) ? $row5['justification_promotion'] : ''; ?></textarea>
                                                                                                                    </div>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="recommandations" class="form-label">Avis du supérieur :</label>
                                                                                                                        <textarea id="recommandations" name="recommandations" class="form-control"><?php echo isset($row5['avis_superieur_direct']) ? $row5['avis_superieur_direct'] : ''; ?></textarea>
                                                                                                                    </div>
                                                                                                                    <div class="mb-3">
                                                                                                                        <label for="commentaires" class="form-label">Commentaire supplémentaire :</label>
                                                                                                                        <textarea id="commentaires" name="commentaires" class="form-control"><?php echo isset($row5['commentaire_supplementaire']) ? $row5['commentaire_supplementaire'] : ''; ?></textarea>
                                                                                                                    </div>
                                                                                                                </fieldset>
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
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                    <!-- Affichage de la liste des avancements -->
                                        <div class="card">
                                        <div class="card-header text-sm-center">Liste de mes avancements</div>
                                            <div class="card-body">
                                            <!-- Insérez ici le code pour afficher la liste des avancements -->
                                            <div class="table-responsive">
                                                    <table class="table app-table-hover mb-0 text-left">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell small text-gris ">Désignation actuelle</th>
                                                                <th class="cell small text-gris ">Nouvelle Désignation</th>
                                                                <th class="cell small text-gris ">Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>         
                                                            <!-- Les données seront affichées ici -->
                                                            <?php  while ($row4 = $requete4->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <tr>
                                                                <?php echo  "<td>" . $row4['poste_actuel'] . "</td>"; ?>
                                                                <?php  echo "<td>" . $row4['nouveau_poste_souhaite'] . "</td>"; ?>
                                                                <?php  echo "<td class='small'><button class='btn app-btn-primary btn-sm p-1' data-toggle='modal' data-target='#modifierModal{$row4['id']}'>voir</button></td>"; ?>
                                                                </tr>
                                                                <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div><!--//table-responsive-->
                                            </div>
                                        </div>
                                        <div class="card mt-4">
                                        <div class="card-header text-sm-center">Liste de mes reclasemments</div>
                                            <div class="card-body">
                                            <!-- Insérez ici le code pour afficher la liste des avancements -->
                                                <div class="table-responsive">
                                                    <table class="table app-table-hover mb-0 text-left">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell small text-gris ">Poste</th>
                                                                <th class="cell small text-gris ">Nouveau Grade</th>
                                                                <th class="cell small text-gris ">Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>         
                                                            <!-- Les données seront affichées ici -->
                                                            <?php  while ($row6 = $requete6->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                <tr>
                                                                <?php echo  "<td class='small'>" . $row6['poste_actuel'] . "</td>"; ?>
                                                                <?php  echo "<td class='small'>" . $row6['nouveau_grade_souhaite'] . "</td>"; ?>
                                                                <?php  echo "<td class='small'><button class='btn app-btn-primary btn-sm p-1' data-toggle='modal' data-target='#modifierModal{$row6['id']}'>voir</button></td>"; ?>
                                                                </tr>
                                                                <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div><!--//table-responsive-->
                                            </div>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr style="border: solid 2px;" >
                        <div class="row mt-4 mb-5">
                            <div class="col-md-6">
                                <!-- Bouton pour la demande de démission -->
                                <button class="btn btn-danger btn-block" style="color: white;" onclick="toggleForm('demission')">Demande de démission</button>
                                <!-- Formulaire de demande de démission -->
                                <div id="formDemission" style="display: none;">
                                <h3 class="mb-3">Demande de démission</h3>
                                <form action="traitement_demande.php" method="POST">
                                <input type="hidden" class="form-control" id="type_demande" name="type_demande" value="Demission" required>
                                        <div class="form-group">
                                            <label for="raisonDemission">Raison de la démission :</label>
                                            <input type="text" class="form-control" id="raison" name="raison" required>
                                        </div>
                                        <button type="submit" class="btn btn-danger mt-4" style="color:white;" >Soumettre</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Bouton pour la demande de retraite -->
                                <button class="btn btn-warning btn-block" style="color: white;" onclick="toggleForm('retraite')">Demande de retraite</button>
                                <!-- Formulaire de demande de retraite -->
                                <div id="formRetraite" style="display: none;">
                                <h3 class="mb-3">Demande de retraite</h3>
                                <form action="traitement_demande.php" method="POST">
                                <input type="hidden" class="form-control" id="type_demande" name="type_demande" value="Retraite" required>
                                        <div class="form-group">
                                            <label for="dateRetraite">Date de départ à la retraite :</label>
                                            <input type="date" class="form-control" id="dateretraite" name="dateretraite" required>
                                        </div>
                                        <button type="submit" class="btn btn-warning mt-4" style="color:white;" >Soumettre</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleForm(formId) {
                // Masquer tous les formulaires
                document.getElementById('formDemission').style.display = 'none';
                document.getElementById('formRetraite').style.display = 'none';

                // Afficher le formulaire correspondant au bouton cliqué
                document.getElementById('form' + formId.charAt(0).toUpperCase() + formId.slice(1)).style.display = 'block';
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>
</html>
