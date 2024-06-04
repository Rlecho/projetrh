<?php
require_once("identifier.php");
require_once("connexiondb.php");

// Récupération des données du formulaire
$titre = $_POST['titre'];
$organisme_formateur = $_POST['organisme_formateur'];
$lieu = $_POST['lieu'];
$periode_debut = $_POST['periode_debut'];
$periode_fin = $_POST['periode_fin'];
$fileName = $_FILES["piece_justificatif"]["name"];
$fileTmpName = $_FILES["piece_justificatif"]["tmp_name"];
$fileSize = $_FILES["piece_justificatif"]["size"];
$fileType = $_FILES["piece_justificatif"]["type"];
$id_emp = $_SESSION['user']['idemp'];

// Calcul de la durée en jours à partir des dates de début et de fin
$date_debut = new DateTime($periode_debut);
$date_fin = new DateTime($periode_fin);
$interval = $date_debut->diff($date_fin);
$duree_en_jours = $interval->days;

// Traitement pour la case à cocher "chargé"
$charge = isset($_POST['charge']) ? 1 : 0;

// Déplacer le fichier justificatif vers le répertoire désiré
$chemin_dossier = "piece_justificative/"; // Spécifiez le chemin vers le dossier où vous souhaitez enregistrer les fichiers
$chemin_fichier = $chemin_dossier . basename($fileName);
move_uploaded_file($_FILES['piece_justificatif']['tmp_name'], $chemin_fichier);

// Insertion des données dans la base de données
$sql = "INSERT INTO formations (titre, organisme_formateur, lieu, duree_en_jours, charge, periode_debut, periode_fin, piece_justificatif, idemp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$titre, $organisme_formateur, $lieu, $duree_en_jours, $charge, $periode_debut, $periode_fin, $fileName, $id_emp]);

if ($stmt->rowCount() > 0) {
    echo '
    <html>
    <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    swal({
      icon: "success",
      title: "La formation a été ajouté avec succès !",
      text: "Il a été enregistré dans la base de données.",
      showConfirmButton: true,
      confirmButtonText: "Fermer",
      closeOnConfirm: false
     }).then(function(result){
        window.location = "formations.php";
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
        window.location = "formations.php";
     });
    </script>
    </body>
    </html>
   ';
}

?>
