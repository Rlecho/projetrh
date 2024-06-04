<?php
  session_start();
  if (isset($_SESSION['user'])) {
    require_once("connexiondb.php");

    $id = $_GET['idemp'];

    // Archive employee
    $requete = "INSERT INTO employesarchiver SELECT '', email, dateNaissance, nom, departement, poste, telephone, motdepasse, '', photo FROM employes WHERE idemp=?";
    $resultat = $pdo->prepare($requete);
    $resultat->execute([$id]);

    // Delete employee
    $requete2 = "DELETE FROM employes WHERE idemp=?";
    $resultat2 = $pdo->prepare($requete2);
    $resultat2->execute([$id]);

    // Update archived employee state
    $requete3 = "UPDATE employesarchiver SET etat=0 WHERE idemp=?";
    $resultat3 = $pdo->prepare($requete3);
    $resultat3->execute([$id]);
  }
?>

<html>
  <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      swal({
        icon: "success",
        title: "Bon travail !",
        text: "L'employé a été archivé avec succès!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnConfirm: false
      }).then(function(result) {
        window.location = "employes.php";
      });
    </script>
  </body>
</html>
