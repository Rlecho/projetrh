<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");

// Récupérer les données du formulaire
$idEmploye = $_POST['id'];
$nomEmploye = $_POST['nom'];
$departementPropose = $_POST['departements'];
$postePropose = $_POST['postes'];
$dateAffectation = $_POST['date_affectation'];

// Requête pour mettre à jour le département et le poste de l'employé dans la table employes
$sqlUpdateEmploye = "UPDATE employes SET departement = :departement, poste = :poste WHERE idemp = :id";
$requeteUpdateEmploye = $pdo->prepare($sqlUpdateEmploye);
$requeteUpdateEmploye->bindParam(':departement', $departementPropose);
$requeteUpdateEmploye->bindParam(':poste', $postePropose);
$requeteUpdateEmploye->bindParam(':id', $idEmploye);

// Exécuter la requête de mise à jour de l'employé
if ($requeteUpdateEmploye->execute()) {
    // Requête pour insérer les informations d'affectation dans la table affectation
    $sqlInsertAffectation = "INSERT INTO affectation (nom_complet_employe, departement, poste_propose, date_prevue_affectation, idemp) VALUES (:nom, :departement, :poste, :date_affectation, :id)";
    $requeteInsertAffectation = $pdo->prepare($sqlInsertAffectation);
    $requeteInsertAffectation->bindParam(':nom', $nomEmploye);
    $requeteInsertAffectation->bindParam(':departement', $departementPropose);
    $requeteInsertAffectation->bindParam(':poste', $postePropose);
    $requeteInsertAffectation->bindParam(':date_affectation', $dateAffectation);
    $requeteInsertAffectation->bindParam(':id', $idEmploye);

    // Exécuter la requête d'insertion dans la table affectation
    if ($requeteInsertAffectation->execute()) {
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
        $sujet = "Notification d'affectation";
        $message = "Cher $nomEmploye,\n\nNous vous informons que vous avez été affecté au département $departementPropose et au poste $postePropose. La date prévue d'affectation est le $dateAffectation.\n\nCordialement,\nL'équipe de gestion des ressources humaines";
        $headers = "From: VotreNom <votre@email.com>";
        mail($emailEmploye, $sujet, $message, $headers);

        // Redirection vers une autre page ou affichage d'un message de succès
        echo "<script>
                alert('L'affectation a été enregistrée avec succès.');
                window.location.href = 'carierreRh.php?idemp=$idEmploye';
              </script>";
    } else {
        // Échec : afficher un message d'erreur
        echo "<script>
                alert('Une erreur s'est produite lors de l'enregistrement de l'affectation.');
              </script>";
    }
} else {
    // Échec : afficher un message d'erreur
    echo "<script>
            alert('Une erreur s'est produite lors de la mise à jour du département et du poste de l'employé.');
          </script>";
}

// Fermer la connexion à la base de données
$pdo = null;
?>
