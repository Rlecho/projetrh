<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");

// Récupérer la nouvelle désignation depuis le formulaire
$nouvelleDesignation = $_POST['designation'];

// Récupérer l'ID de l'employé depuis le formulaire
$idEmploye = $_POST['id'];

// Requête pour mettre à jour la désignation de l'employé dans la base de données
$sql = "UPDATE employes SET designation = :nouvelle_designation WHERE idemp = :id";

// Préparer la requête
$requete = $pdo->prepare($sql);
$requete->bindParam(':nouvelle_designation', $nouvelleDesignation);
$requete->bindParam(':id', $idEmploye);
if ($requete->execute()) {
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
    $sujet = "Votre désignation a été mise à jour";
    $message = "Cher employé,\n\nVotre désignation a été mise à jour. Votre nouvelle désignation est : $nouvelleDesignation.";
    $headers = "From: VotreNom <votre@email.com>";
    mail($emailEmploye, $sujet, $message, $headers);


       // Insérer les informations d'avancement dans la table 'avancement'
       $requeteInsertAvancement = $pdo->prepare("INSERT INTO avancement (nom_complet_employe, poste_actuel, nouveau_poste_souhaite,idemp) VALUES (:nom_complet_employe, :poste_actuel, :nouveau_poste_souhaite, :idEmploye)");
       $requeteInsertAvancement->bindParam(':nom_complet_employe', $_POST['nom']);
       $requeteInsertAvancement->bindParam(':poste_actuel', $_POST['poste_actuel']);
       $requeteInsertAvancement->bindParam(':nouveau_poste_souhaite', $nouvelleDesignation);
       $requeteInsertAvancement->bindParam(':idEmploye', $idEmploye);
       $requeteInsertAvancement->execute();

    // Créer une notification dans l'interface de l'employé
    echo "<script>
                alert('La désignation a été mise à jour avec succès.');
                window.location.href = 'carierreRh.php?idemp=$idEmploye';
            </script>";
} else {
    // Échec : afficher un message d'erreur
    echo "<script>
            alert('Une erreur s'est produite lors de la mise à jour de la désignation.');
          </script>";
}

// Fermer la connexion à la base de données
$pdo = null;
?>
