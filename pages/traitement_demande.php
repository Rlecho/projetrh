<?php
require_once("connexiondb.php");
require_once("identifier.php");

// Récupération de l'identifiant de l'employé connecté
$aer = $_SESSION['user']['idemp'];

// Initialisation de la variable $stmt à null
$stmt = null;

// Récupération des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type_demande = $_POST['type_demande'];
    if ($type_demande == "Demission") {
        $raison = $_POST['raison'];
        $sql = "INSERT INTO demandes (type_demande, raison, etat, idemp) VALUES (:type_demande, :raison, 'en_attente', :idemp)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':type_demande', $type_demande);
        $stmt->bindParam(':raison', $raison);
        $stmt->bindParam(':idemp', $aer);
    } elseif ($type_demande == "Retraite") {
        $date_retraite = $_POST['dateretraite'];
        $sql = "INSERT INTO demandes (type_demande, date_retraite, etat, idemp) VALUES (:type_demande, :date_retraite, 'en_attente', :idemp)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':type_demande', $type_demande);
        $stmt->bindParam(':date_retraite', $date_retraite);
        // $stmt->bindParam(':idemp', $aer);
    }

    if ($stmt && $stmt->execute()) {
        echo '
        <html>
        <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
        swal({
          icon: "success",
          title: "Ben réussi",
          text: "Votre demande a été bien envoyé.",
          showConfirmButton: true,
          confirmButtonText: "Fermer",
          closeOnConfirm: false
         }).then(function(result){
            window.location = "carriere.php";
         });
        </script>
        </body>
        </html>
       ';
    } else {
        echo '
        <html>
        <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
        swal({
          icon: "error",
          title: "Une erreur s\'est produite !",
          text: "Une erreur s\'est produite lors de l\'ajout de la formation.",
          showConfirmButton: true,
          confirmButtonText: "Fermer",
          closeOnConfirm: false
         }).then(function(result){
            window.location = "carriere.php";
         });
        </script>
        </body>
        </html>
       ';
    }
}
?>
