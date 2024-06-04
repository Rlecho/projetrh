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
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="text-success">Diplôme Obtenu</th>
            <th scope="col" class="text-success">Établissement</th>
            <th scope="col" class="text-success">Ville</th>
            <th scope="col" class="text-success">Année</th>
            <th scope="col" class="text-success">Niveau</th>
            <th scope="col" class="text-success">Plus Élevé</th>
            <th scope="col" class="text-center text-success" >Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Sélectionner les diplômes de l'utilisateur depuis la table diplome
        // Assurez-vous de remplacer 'SELECT * FROM diplome' par votre requête SQL réelle
        $sql = "SELECT * FROM diplome WHERE idemp = :id_employe";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_employe', $_SESSION['user']['idemp']);
        $stmt->execute();
        $diplomes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($diplomes as $diplome) {
            echo "<tr>";
            echo "<td>" . $diplome['diplome_obtenu'] . "</td>";
            echo "<td>" . $diplome['etablissement'] . "</td>";
            echo "<td>" . $diplome['ville'] . "</td>";
            echo "<td>" . $diplome['annee'] . "</td>";
            echo "<td>" . $diplome['niveau'] . "</td>";
            echo "<td><span class='badge bg-" . ($diplome['plus_eleve'] === 'oui' ? 'success' : 'danger') . "'>" . $diplome['plus_eleve'] . "</span></td>";
            echo "<td>";
            echo "<a href='#' class='btn btn-sm app-btn-primary mr-2' onclick=\"remplirModalDiplome('{$diplome['id']}', '{$diplome['diplome_obtenu']}', '{$diplome['etablissement']}', '{$diplome['ville']}', '{$diplome['annee']}', '{$diplome['niveau']}', '{$diplome['plus_eleve']}')\">Modifier</a>";
            echo "<button class='btn btn-sm btn-danger' onclick=\"confirmDelete('supprimerdiplome.php?id={$diplome['id']}')\" style='color:white;'>Supprimer</button>"; 
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


<div class="modal fade" id="modifierModal" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifierModalLabel">Modifier le diplôme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulaire pour la modification du diplôme -->
        <form id="formModifierDiplome">
            <div class="row">
                <div class="col-md-6">
                <input type="hidden" class="form-control" id="id_diplome" name="id_diplome">

                <!-- Champs pour les détails du diplôme -->
                        <div class="form-group">
                            <label class="text-primary" for="diplome">Diplôme obtenu :</label>
                            <input type="text" class="form-control" id="diplome" name="diplome">
                        </div>
                        <div class="form-group">
                            <label class="text-primary" for="etablissement">Établissement :</label>
                            <input type="text" class="form-control" id="etablissement" name="etablissement">
                        </div>

                        <div class="form-group">
                            <label class="text-primary" for="etablissement">Ville :</label>
                            <input type="text" class="form-control" id="ville" name="ville">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-primary" for="etablissement">Année :</label>
                            <input type="text" class="form-control" id="annee" name="annee">
                        </div>
                        <div class="form-group">
                            <label class="text-primary" for="etablissement">Niveau :</label>
                            <input type="text" class="form-control" id="niveau" name="niveau">
                        </div>
                        <div class="form-group">
                            <label class="text-primary" for="plus_eleve">Plus élévé :</label>
                            <select id="plus_eleve" name="plus_eleve" class="form-control">
                                <option value="oui">Oui</option>
                                <option value="non">Non</option>
                            </select>
                        </div>
                </div>
            </div>
          <!-- Bouton de soumission -->
          <button type="submit" class="btn app-btn-primary mt-2">Enregistrer les modifications</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row d-flex">
    <div class="col-6"><hr style='height: 2px;background-color:green'></div>
    <div class="col-6"><hr style="background-color:green; height:2px"></div>
</div>

<form id="diplomeForm" method="post" action="traitement_diplome.php">
<input type="hidden" name="id" class="form-control" value="<?php echo $_SESSION['user']['idemp']; ?>">
    <div class="row">
        <!-- Première colonne -->
        <div class="col-md-6">
            <div class="form-group">
                <label>Diplôme Obtenu</label>
                <input type="text" name="diplome_obtenu" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Établissement</label>
                <input type="text" name="etablissement" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Ville</label>
                <input type="text" name="ville" class="form-control" required >
            </div>
        </div>
        <!-- Deuxième colonne -->
        <div class="col-md-6">
            <div class="form-group">
                <label>Année</label>
                <input type="number" name="annee" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Niveau</label>
                <input type="text" name="niveau" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Plus Élevé</label>
                <select name="plus_eleve" class="form-control">
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="submit" class="btn app-btn-primary" value="Ajouter Diplôme">
            </div>
        </div>
    </div>
</form>

</div>
  </div>
  <script>
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
        // JavaScript pour remplir le modal avec les détails du diplôme
  function remplirModalDiplome(idDiplome, diplome, etablissement, ville, annee, niveau, plusEleve) {
    // Remplir les champs du formulaire avec les valeurs du diplôme
    document.getElementById('id_diplome').value = idDiplome;
    document.getElementById('diplome').value = diplome;
    document.getElementById('etablissement').value = etablissement;
    document.getElementById('ville').value = ville;
    document.getElementById('annee').value = annee;
    document.getElementById('niveau').value = niveau;
    document.getElementById('plus_eleve').value = plusEleve;
    // Remplissez les autres champs de la même manière
    
    // Afficher le modal
    $('#modifierModal').modal('show');
  }
  
  // JavaScript pour soumettre le formulaire de modification du diplôme
  $(document).ready(function() {
    $('#formModifierDiplome').submit(function(e) {
      e.preventDefault(); // Empêcher le formulaire de soumettre normalement
      
      // Récupérer les données du formulaire
      var formData = $(this).serialize();
      
      // Envoyer une requête AJAX pour mettre à jour le diplôme
      $.ajax({
        type: 'POST',
        url: 'traitement_modifier_diplome.php',
        data: formData,
        success: function(response) {
            window.location = 'diplome.php';
          // Afficher un message de réussite ou d'erreur
          // Vous pouvez également recharger la page ou effectuer d'autres actions après la modification
          alert(response);
          $('#modifierModal').modal('hide'); // Cacher le modal après la soumission
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
          alert('Une erreur est survenue lors de la modification du diplôme.');
        }
      });
    });
  });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 </body>
</html>
