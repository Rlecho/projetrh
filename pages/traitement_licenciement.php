<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");

// Récupérer les données du formulaire
$idEmploye = $_POST['id'];
$nomEmploye = $_POST['nom'];
$posteActuel = $_POST['poste_actuel'];
$motifLicenciement = $_POST['motif_licenciement'];
$dateLicenciement = $_POST['date_licenciement'];

// Vérifier si l'acceptation des termes et conditions est cochée
$acceptationTerms = isset($_POST['acceptation_terms']) ? 1 : 0;

// Requête pour insérer les informations de licenciement dans la table licenciement
$sql = "INSERT INTO licenciement (nom_complet_employe, poste_actuel, motif_licenciement, date_prevue_licenciement, acceptation_terms, idemp) VALUES (:nom, :poste_actuel, :motif_licenciement, :date_licenciement, :acceptation_terms, :id)";
$requete = $pdo->prepare($sql);
$requete->bindParam(':nom', $nomEmploye);
$requete->bindParam(':poste_actuel', $posteActuel);
$requete->bindParam(':motif_licenciement', $motifLicenciement);
$requete->bindParam(':date_licenciement', $dateLicenciement);
$requete->bindParam(':acceptation_terms', $acceptationTerms);
$requete->bindParam(':id', $idEmploye);

// Exécuter la requête
if ($requete->execute()) {
  // Requête pour récupérer l'adresse e-mail de l'employé
  $sqlEmail = "SELECT email FROM employes WHERE idemp = :idEmp";

  // Préparer la requête
  $requeteEmail = $pdo->prepare($sqlEmail);
  $requeteEmail->bindParam(':idEmp', $idEmploye);
  $requeteEmail->execute();
  
  // Récupérer l'adresse e-mail de l'employé
  $row = $requeteEmail->fetch(PDO::FETCH_ASSOC);
  $emailEmployes = $row['email'];

    // Succès : envoyer un e-mail à l'employé
    $emailEmploye = $emailEmployes;
    $sujet = "Notification de licenciement";
    $message = "Cher $nomEmploye,\n\nNous vous informons que vous avez été licencié
    de votre poste actuel ($posteActuel) pour le motif suivant :\n$motifLicenciement.\nLa date 
    prévue du licenciement est le $dateLicenciement.\n\nCordialement,\nL'équipe de gestion des ressources humaines";
    $headers = "From: VotreNom <votre@email.com>";
    mail($emailEmploye, $sujet, $message, $headers);

    // Redirection vers une autre page ou affichage d'un message de succès
    echo "<script>
            alert('L\'employé a été licencié avec succès.');
            window.location.href = 'carierreRh.php?idemp=$idEmploye';
          </script>";
} else {
    // Échec : afficher un message d'erreur
    echo "<script>
            alert('Une erreur s\'est produite lors du licenciement.');
          </script>";
}

// Fermer la connexion à la base de données
$pdo = null;
?>
