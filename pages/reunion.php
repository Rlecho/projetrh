<?php
  require_once("identifier.php");
  require_once("connexiondb.php");
  class ReunionManager {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function getAllReunions() {
        $requete = "SELECT * FROM reunion";
        $resultatR = $this->pdo->query($requete);
        return $resultatR;
    }
    public function displayReunions() {
      $reunions = $this->getAllReunions();
      while ($reunion = $reunions->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($reunion['titre']) . '</td>';
        echo '<td>' . htmlspecialchars($reunion['type']) . '</td>';
        echo '<td>' . htmlspecialchars($reunion['datereunion']) . '</td>';
        echo '<td>' . htmlspecialchars($reunion['heurereunion']) . '</td>';
        echo '<td>
            <a href="modifierreunion.php?idreunion=' . $reunion['idreunion'] . '"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a onclick="return confirm(\'Etes vous sûr de vouloir supprimer la réunion\')" href="supprimerreunion.php?idreunion=' . $reunion['idreunion'] . '"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
        </td>';
        echo '</tr>';   
      }
  }
}
// Requête SQL pour récupérer tous les utilisateurs
$sql = "SELECT idemp, nom FROM employes";
$resultatR =$pdo->query($sql);
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="nada barir">
        <meta name="generator" content="Hugo 0.84.0">
        <title>reunion</title>
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
        .bouttonReunion{
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
     <br>   <!-- Modal -->
        <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <form method="post" action="ajouterreunion.php" class="form">
                <div class="modal fade" id="ajoutreunion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter une réunion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Titre</label>
                                        <input type="text" name="titre" class="form-control" placeholder="Titre" id="titre" required >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Type</label>
                                        <select name="type" class="form-control" required >
                                            <option>Réunion interne</option>
                                            <option>Réunion externe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Date de réunion</label>
                                        <input type="date" name="debutdereunion" class="form-control" placeholder="Date de réunion" id="debut" required >
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="time">Heure de réunion</label>
                                        <input type="time" name="heure" class="form-control" placeholder="Heure de réunion" id="heure" required >
                                    </div>
                                </div>
                                        <div class="row">               
                                        <div class="form-group col-12 mt-2">
                                        <label>Employé(s) Concerné (s)</label>
                                            <select id="selectEmployes" name="employes[]" multiple class="form-control" required style="width: 5.9cm; margin-top:1.5cm; " >
                                                <?php
                                                // Boucle while pour parcourir les résultats de la requête
                                                while ($employes = $resultatR->fetch(PDO::FETCH_ASSOC)) {
                                                    // Afficher chaque nom d'employé comme une option dans le select
                                                    echo '<option value="' . $employes['idemp'] . '">' . $employes['nom'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn app-btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="container">
            <div class="row g-3 mb-4 mt-4 align-items-center justify-content-between">
                                <div class="col-auto">
                                    <h1 class="app-page-title mb-0" style="color: grey;">Les Réunions</h1>
                                </div>
                                <div class="col-auto">
                                    <div class="page-utilities">
                                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                            <div class="col-auto">
                                                <form class="table-search-form row gx-1 align-items-center">
                                                    <div class="col-auto">
                                                        <input type="text" id="search-reunion" name="searchreunion" class="form-control search-orders" placeholder="Search">
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn app-btn-secondary">Rechercher</button>
                                                    </div>
                                                </form>
                                            </div>
                            <div class="col-auto text-end">						    
                                                <button class="btn btn-success" data-bs-toggle="modal"  data-bs-target="#ajoutreunion" style="color: white;">
                                                    <i class="fas fa-plus"></i> Ajouter
                                                </button>
                                            </div>
                                        </div><!--//row-->
                                    </div><!--//table-utilities-->
                                </div><!--//col-auto-->
                </div>
                <form method="get" action="modifierreunion.php">
                <div class="panel panel-primary margetop">
                <div class="panel-body">
                <div class="table">
                    <table class="table  table-hover">
                    <thead style=" border:none">
                    <tr>
                        <th class="cell text-success ">Titre</th>
                        <th class="cell text-success ">Type</th>
                        <th class="cell text-success ">Date</th>
                        <th class="cell text-success ">Heure</th>
                        <th class="cell text-success ">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $reunionManager = new ReunionManager($pdo);
                            $reunionManager->displayReunions();
                    ?>           
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </form>
                </div>

                <div class="container">
    <div class="leave-permit">
      <h2>Autorisation de congé</h2>
      <form method="post" action="attest.php" class="needs-validation" novalidate>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="date">Date de délivrance :</label>
            <input type="text" class="form-control" id="date" name="date_de_délivrance" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="nom">Nom du responsable RH :</label>
            <input type="text" class="form-control" id="nom" name="nom_responsable_RH" required>
          </div>
        </div>
        
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="titre">Titre du responsable RH :</label>
            <input type="text" class="form-control" id="titre" name="titre_responsable_RH" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="universite">Nom de l'Université :</label>
            <input type="text" class="form-control" id="universite" name="nom_universite" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="employe">Nom et prénom de l'employé :</label>
            <input type="text" class="form-control" id="employe" name="nom_prenom_employe" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="conge">Type de congé demandé :</label>
            <input type="text" class="form-control" id="conge" name="type_conge_demande" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="dates">Dates de début et de fin du congé :</label>
            <input type="text" class="form-control" id="dates" name="dates_debut_fin_conge" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="justification">Justification du congé :</label>
            <textarea class="form-control" id="justification" name="justification_conge" required></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="lieu">Lieu de délivrance :</label>
            <input type="text" class="form-control" id="lieu" name="lieu_de_délivrance" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="date-delivrance">Date de délivrance :</label>
            <input type="text" class="form-control" id="date-delivrance" name="date_de_délivrance" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="signature">Signature :</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="signature" name="signature" accept="image/*">
              <label class="custom-file-label" for="signature">Choisir un fichier</label>
            </div>
          </div>
        </div>

        <button class="btn btn-primary" type="submit">Valider</button>
      </form>
    </div>
  </div> 


            </div>
        </div>    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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