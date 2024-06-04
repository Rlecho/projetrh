<?php
require_once("identifier.php");
require_once("connexiondb.php");

// Récupération des données du formulaire
$idEmp=$_POST['id'];
$titre = $_POST['titre'];
$organisme_formateur = $_POST['organisme_formateur'];
$lieu = $_POST['lieu'];
$periode_debut = $_POST['periode_debut'];
$periode_fin = $_POST['periode_fin'];
$fileName = $_FILES["piece_justificatif"]["name"];
$fileTmpName = $_FILES["piece_justificatif"]["tmp_name"];
$fileSize = $_FILES["piece_justificatif"]["size"];
$fileType = $_FILES["piece_justificatif"]["type"];

// Calcul de la durée en jours à partir des dates de début et de fin
$date_debut = new DateTime($periode_debut);
$date_fin = new DateTime($periode_fin);
$interval = $date_debut->diff($date_fin);
$duree_en_jours = $interval->days;

// Traitement pour la case à cocher "chargé"
$charge = ($_POST['charge']) ;
// $charge = isset($_POST['charge']) ? 1 : 0;

// Déplacer le fichier justificatif vers le répertoire désiré
$chemin_dossier = "piece_justificative/"; // Spécifiez le chemin vers le dossier où vous souhaitez enregistrer les fichiers
$chemin_fichier = $chemin_dossier . basename($fileName);
move_uploaded_file($_FILES['piece_justificatif']['tmp_name'], $chemin_fichier);

// Insertion des données dans la base de données
$sql = "INSERT INTO formations (titre, organisme_formateur, lieu, duree_en_jours, charge, periode_debut, periode_fin, piece_justificatif, idemp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$titre, $organisme_formateur, $lieu, $duree_en_jours, $charge, $periode_debut, $periode_fin, $fileName, $idEmp]);

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
        window.location = "formationRh.php?idemp=' . $idEmp . '";
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
      text: "Une erreur s\'est produite lors d\'ajout de la formation.",
      showConfirmButton: true,
      confirmButtonText: "Fermer",
      closeOnConfirm: false
     }).then(function(result){
        window.location = "formationRh.php?idemp=' . $idEmp . '";
     });
    </script>
    </body>
    </html>
   ';
}


$sql_email = "SELECT email,nom FROM employes WHERE idemp = ?";
$stmt_email = $pdo->prepare($sql_email);
$stmt_email->execute([$idEmp]);
$user = $stmt_email->fetch(PDO::FETCH_ASSOC);
$nom = $user['nom'];
$user_email = $user['email'];

// En-têtes de l'e-mail
$headers = "From: VotreNom <votre@email.com>\r\n";
$headers .= "Reply-To: votre@email.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Corps de l'e-mail
$message = "
<html>
<head>
  <title>Notification d'ajout de formation</title>
</head>
<body>
  <p>Bonjour, $nom</p>
  <p>Une nouvelle formation a été ajoutée avec succès.</p>
  <p>Titre de la formation : $titre</p>
  <p>Organisme formateur : $organisme_formateur</p>
  <p>Lieu : $lieu</p>
  <p>Période : du $periode_debut au $periode_fin</p>
  <p>Vous pouvez consulter vos formations sur votre espace personnel.</p>
  <p>Merci,</p>
  <p>De la part du Rh</p>
</body>
</html>
";


// Envoi de l'e-mail
$subject = "Notification d'ajout de formation";
$to = $user_email; // Adresse e-mail de l'utilisateur, vous pouvez la récupérer depuis la base de données
$mail_sent = mail($to, $subject, $message, $headers);


if ($mail_sent) {
    echo "E-mail envoyé avec succès à $user_email.";
} else {
    echo "Erreur lors de l'envoi de l'e-mail à $user_email.";
}


?>