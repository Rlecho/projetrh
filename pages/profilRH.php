<?php
 require_once("identifier.php");
 // Connexion à la base de données (à adapter selon votre configuration)
$pdo = new PDO("mysql:host=localhost;dbname=resources_humaines", "root", "");
// Requête pour récupérer les départements et les postes associés
$sql = "SELECT d.id_departement, d.nom_departement, p.nom_poste
FROM departement d
LEFT JOIN postes p ON d.id_departement = p.id_departement
ORDER BY d.id_departement, p.id_poste";
// Exécution de la requête
$resultat = $pdo->query($sql);
// Tableau pour stocker les départements et leurs postes associés
$departements = array();
// Boucle pour traiter les résultats de la requête
while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
    // Si le département n'existe pas encore dans le tableau, on l'ajoute
    if (!isset($departements[$row['id_departement']])) {
        $departements[$row['id_departement']] = array(
            'id'=>$row['id_departement'],
            'nom' => $row['nom_departement'],
            'postes' => array()
        );
    }   
    // Ajout du poste au département correspondant
    $departements[$row['id_departement']]['postes'][] = $row['nom_poste'];
}
// Fermeture de la requête
$resultat->closeCursor();
// Fermeture de la connexion à la base de données
$pdo = null;
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Profil</title>
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
      /* Styles pour les popups de notification */
      .notification-popup {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f0f0f0;
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
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
    <br>
        <div class="app-wrapper">
            <div class="app-content pt-3 p-md-3 p-lg-4" >

<!-- Conteneur pour les popups de notification -->
<div id="notificationContainer"></div>

                <button class="btn app-btn-primary " data-toggle="modal" data-target="#ajouterModal">
                                    <i class="fas fa-plus"></i> Ajouter un departement
                </button>
                
                <div class="modal fade" id="ajouterModal" tabindex="-1" aria-labelledby="ajouterModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajouterModalLabel">Ajouter un département et des postes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="ajouter_departement_postes.php" method="post">
                                    <!-- Première ligne -->
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="nom_departement" class="form-label">Nom du département :</label>
                                            <input type="text" id="nom_departement" name="nom_departement" class="form-control" required>
                                        </div>
                                    </div>
                                    <!-- Deuxième ligne -->
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="nom_poste" class="form-label">Nom du poste :</label>
                                            <input type="text" id="nom_poste" name="nom_poste[]" class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <button type="button" id="ajouter_poste" class="btn btn-secondary">Ajouter plus de postes</button>
                                        </div>
                                    </div>
                                    <!-- Bouton Enregistrer -->
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <h2>Liste des départements</h2>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"  style="color: #C04D14;">Nom du département</th>
                                        <th scope="col" class=" text-center"  style="color: #C04D14;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <!-- Boucle sur les départements -->
                    <?php
                $numeroDepartement = 1; // Initialiser le compteur
                foreach ($departements as $departement) : ?>
                    <tr>
                        <th scope="row" style="color: #1B7B3D;"><?php echo $numeroDepartement; ?></th>
                        <td><?php echo $departement['nom']; ?></td>
                        <td class="col-6 text-end">
                            <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#modifierModal<?php echo $departement['id']; ?>">Modifier</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerModal<?php echo $departement['id']; ?>" style="color:white;">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" colspan="2" class="text-sm-start" style="color: #C04D14;" >Postes</th>
                    </tr>
                    <!-- Boucle sur les postes de ce département -->
                    <?php foreach ($departement['postes'] as $key => $poste) : ?>
                        <tr>
                            <!-- <td><?php echo $key + 1; ?></td> -->
                            <td colspan="2" ><?php echo $poste; ?></td>
                        </tr>
                        <tr>
                            <td colspan="3"><hr style="color: #C04D14; height:5px;" ></td> 
                        </tr>
                    <?php endforeach; ?>
                    <!-- Modifier Modal -->
                    <div class="modal fade" id="modifierModal<?php echo $departement['id']; ?>" tabindex="-1" aria-labelledby="modifierModalLabel<?php echo $departement['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifierModalLabel">Modifier le département "<?php echo $departement['nom']; ?>"</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="modifier_departement.php" method="post">
                                        <input type="hidden" name="id_departement" value="<?php echo $departement['id']; ?>">
                                        <label for="nom_departement" class="form-label">Nom du département :</label>
                                        <input type="text" id="nom_departement" name="nom_departement" class="form-control" value="<?php echo $departement['nom']; ?>" required>
                                        <hr>
                                        <label for="postes" class="form-label">Postes :</label>
                                        <?php foreach ($departement['postes'] as $poste) : ?>
                                            <div class="mb-3">
                                                <input type="text" name="postes[]" class="form-control" value="<?php echo $poste; ?>" required>
                                            </div>
                                        <?php endforeach; ?>
                                            <button type="button" class="btn btn-secondary" id="ajouter_poste_<?php echo $departement['id']; ?>">Ajouter un poste</button>
                                        <hr>
                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Supprimer Modal -->
                    <div class="modal fade" id="supprimerModal<?php echo $departement['id']; ?>" tabindex="-1" aria-labelledby="supprimerModalLabel<?php echo $departement['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="supprimerModalLabel">Supprimer le département "<?php echo $departement['nom']; ?>"</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes-vous sûr de vouloir supprimer le département "<?php echo $departement['nom']; ?>" avec l'id "<?php echo $departement['id']; ?>" ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <form action="supprimer_departement.php" method="get">
                                        <input type="hidden" name="id_departement" value="<?php echo $departement['id']; ?>">
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $numeroDepartement++; // Incrémenter le compteur ?>
                <?php endforeach; ?>
                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <form class="" id="" name="" method="post" action="modifierinforh.php">
                <div class="row d-flex justify-content-center" style="margin-top:-30px">
                    <div class="col-md-10 mt-5 pt-5">
                        <div class="row z-depth-3" >
                            <div class="col-sm-4 bg-dark rounded-left" style="color:green">
                                <div class="card-block text-center text-white">
                                    <!--<i class="fas fa-user-tie fa-7x mt-5"></i>-->
                                    <img style="width:110px;height:110px;border-radius:500px;margin-top:5px;" src="../images/<?php echo $_SESSION['user']['photo'];?>"/>
                                    <h2 class="font-weight-bold mt-4">&nbsp;<?php echo $_SESSION['user']['nom'];?></h2>
                                    <p><?php echo $_SESSION['user']['poste'];?></p><i class="far fa-edit fa-2x mb-4"></i>
                                </div>
                            </div>
                            <div class="col-sm-8 bg-white rounded-right">
                                <h3 class="mt-3 text-center">Informations</h3>
                                <hr class="bg-primary mt-0 w-25">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="font-weight-bold">Email:</p>
                                        <h6 class=" text-muted"><?php echo $_SESSION['user']['email'];?></h6>
                                    </div>
                                </div>
                                    <h4 class="mt-3">POSTE</h4>
                                    <hr class="bg-primary">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="font-weight-bold">Département</p>
                                        <h6 class="text-muted"><?php echo $_SESSION['user']['departement'];?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="font-weight-bold">Fonction</p>
                                        <h6 class="text-muted"><?php echo $_SESSION['user']['poste'];?></h6>
                                    </div>
                                </div>
                                <hr class="bg-primary">
                                <ul class="list-unstyled d-flex justify-content-center mt-4">
                                    <input type="submit" style="border-radius: 6px;" value="Modifier mes informations">
                                </ul>  
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var postesContainer = document.getElementById('postes_container');
        var boutonAjouterPoste = document.getElementById('ajouter_poste');
        var compteurPostes = 1;
        boutonAjouterPoste.addEventListener('click', function() {
            compteurPostes++;
            var nouvelleLigne = document.createElement('div');
            nouvelleLigne.classList.add('row', 'mb-3');
            nouvelleLigne.innerHTML = '<div class="col">' +
                                        '<label for="nom_poste_' + compteurPostes + '" class="form-label">Nom du poste :</label>' +
                                        '<input type="text" id="nom_poste_' + compteurPostes + '" name="nom_poste[]" class="form-control" required>' +
                                    '</div>';
            this.parentNode.parentNode.insertBefore(nouvelleLigne, this.parentNode);
        });
    });

        document.getElementById('ajouter_poste_<?php echo $departement['id']; ?>').addEventListener('click', function() {
            var nouvelInput = document.createElement('div');
            nouvelInput.innerHTML = '<input type="text" name="postes[]" class="form-control" required>';
            document.getElementById('modifierModal<?php echo $departement['id']; ?>').querySelector('form').insertBefore(nouvelInput, document.getElementById('ajouter_poste_<?php echo $departement['id']; ?>'));
        });

  // Fonction pour récupérer les notifications du serveur
function getNotifications() {
    $.ajax({
        url: 'get_notifications.php', // Chemin vers le script PHP qui récupère les notifications
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Parcourir les données et afficher chaque notification dans un popup
            data.forEach(function(notification) {
                var popup = '<div class="notification-popup">' + notification.message + ' <button onclick="closeNotification(this.parentNode.parentNode)">Fermer</button></div>';
                $('#notificationContainer').append(popup);
            });
        },
        error: function(xhr, status, error) {
            console.error('Erreur lors de la récupération des notifications:', error);
        }
    });
}

// Fonction pour fermer une notification
function closeNotification(notification) {
    $(notification).remove();
}

// Récupérer les notifications lors du chargement de la page
$(document).ready(function() {
    getNotifications();
});

// Récupérer les notifications toutes les X secondes (par exemple, toutes les 10 secondes)
setInterval(function() {
    getNotifications();
}, 10000);

</script>
  </body>
</html>
