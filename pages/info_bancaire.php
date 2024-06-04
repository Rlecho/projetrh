<?php
  require_once("identifier.php");
  require_once("connexiondb.php"); 
 $idEmp=isset($_GET['idemp'])?$_GET['idemp']:0;
 $requete="select *from employes where idemp=$idEmp";
 $resultat=$pdo->query($requete);
 $employes=$resultat->fetch();
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
    <?php include('header.php');?>
    <div class="app-wrapper">
                <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="col-md-12">
                <div class="row">
                <?php include('a.php');?>
            </div>
<div>
<div class="row d-flex">
    <div class="col-6"><hr style='height: 2px;background-color:green'></div>
    <div class="col-6"><hr style="background-color:green; height:2px"></div>
</div>
<div>
  <h4 class="mt-2"> Vos informations Bancaires </h4>
</div>
<table class="table table-stripped">
    <thead>
        <tr>
            <th class="text-success">Banque</th>
            <th class="text-success">Branche</th>
            <th class="text-success">Nom du compte</th>
            <th class="text-success">N° du compte</th>
            <th class="text-success">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Récupérer les informations sur les comptes bancaires de l'utilisateur depuis la table "banque_info"
        $sql = "SELECT * FROM banque_info WHERE idemp = :id_employe";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_employe', $_SESSION['user']['idemp']);
        $stmt->execute();
        $comptes_bancaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Afficher chaque compte bancaire dans une ligne du tableau
        foreach ($comptes_bancaires as $compte) {
            echo "<tr>";
            echo "<td>" . $compte['nom_banque'] . "</td>";
            echo "<td>" . $compte['nom_branche'] . "</td>";
            echo "<td>" . $compte['nom_compte'] . "</td>";
            echo "<td>" . $compte['numero_compte'] . "</td>";
            // Boutons Modifier et Supprimer
            echo "<td>";
            echo '<a id="boutonModifierCompte_' . $compte['id'] . '" href="#" class="btn btn-sm app-btn-primary mr-2">Modifier</a>';
            echo "<button class='btn btn-sm btn-danger' onclick=\"confirmDelete('supprimerbanque.php?id={$compte['id']}')\" style='color:white;'>Supprimer</button>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- Modal de modification des infos de la banque -->
<div class="modal fade" id="modifierModalCompte_<?php echo $compte['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modifierModalCompteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- En-tête du modal -->
      <div class="modal-header">
        <h5 class="modal-title" id="modifierModalcompteLabel">Modifier infos de la banque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <!-- Contenu du formulaire de modification -->
<div class="modal-body">
        <form id="formModifierCompte_<?php echo $compte['id']; ?>" action="traitement_modifier_compte.php" method="POST">
          <!-- Champ caché pour l'ID de la compte -->
          <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="id_banque" value="<?php echo $compte['id']; ?>">
                    <!-- Ajoutez ici les champs à modifier (par exemple, compte, lue, écrite, parlée) -->
                    <div class="form-group">
                        <label for="compte">Nom de la banque</label>
                        <input type="text" class="form-control" id="nom_banque" name="nom_banque" value="<?php echo $compte['nom_banque']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nom de la branche</label>
                        <input type="text" class="form-control" id="nom_branche" name="nom_branche" value="<?php echo $compte['nom_branche']; ?>">
                    </div>
                </div >     
                <div class="col-md-6">
                <div class="form-group">
                        <label>Nom du compte</label>
                        <input type="text" class="form-control" id="nom_compte" name="nom_compte" value="<?php echo $compte['nom_compte']; ?>">
                    </div>
                    <div class="form-group">
                        <label>N° du Compte</label>
                        <input type="text" class="form-control" id="numero_compte" name="numero_compte" value="<?php echo $compte['numero_compte']; ?>">
                    </div>

                </div>
            </div>
          <!-- Ajoutez d'autres champs de formulaire pour les autres attributs de la compte -->
          <button type="submit" class="btn app-btn-primary mt-2">Modifier</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="row d-flex">
    <div class="col-6"><hr style='height: 2px;background-color:green'></div>
    <div class="col-6"><hr style="background-color:green; height:2px"></div>
</div>
<h4 class="mt-2"> Details Bancaires </h4>
  <form id="banqueForm" method="post" action="traitement_banque.php">
  <input type="hidden" name="id" class="form-control" value="<?php echo $_SESSION['user']['idemp']; ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nom de la banque</label>
                <input type="text" name="nom_banque" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Nom de la branche</label>
                <input type="text" name="nom_branche" class="form-control" required >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nom du compte</label>
                <input type="text" name="nom_compte" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Numéro du compte</label>
                <input type="text" name="numero_compte" class="form-control" required >
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="submit" class="btn app-btn-primary " value="Enregistrer">
            </div>
        </div>
    </div>
</form>
</div>
  </div>

  <script>
       $(document).ready(function() {
            // Sélectionnez le bouton de modification par son ID
            $('#boutonModifierCompte_<?php echo $compte["id"]; ?>').click(function() {
                // Afficher le modal correspondant lorsque le bouton est cliqué
                $('#modifierModalCompte_<?php echo $compte["id"]; ?>').modal('show');
            });
        });
            function confirmDelete(url) {
                swal({
                    title: "Êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne pourrez pas récupérer ces informations !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = url;
                    } else {
                        swal("Les informations n'ont pas été supprimées.");
                    }
                });
            }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
