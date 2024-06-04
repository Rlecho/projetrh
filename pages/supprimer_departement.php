<?php
require_once("connexiondb.php");

// Vérifier si un ID de département est passé en paramètre dans l'URL
if (isset($_GET['id_departement'])) {
    // Récupérer l'ID du département depuis l'URL
    $id_departement = $_GET['id_departement'];

    // Requête pour supprimer le département et ses postes associés
    $sql = "DELETE FROM departement WHERE id_departement = :id_departement;
            DELETE FROM postes WHERE id_departement = :id_departement";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_departement', $id_departement);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Rediriger vers une page de confirmation ou autre
        header("Location: profilRH.php");
        exit();
    } else {
        // Une erreur s'est produite lors de la suppression, rediriger vers une page d'erreur ou autre
        header("Location: connexion.php");
        exit();
    }
} else {
    // L'ID du département n'a pas été spécifié, rediriger vers une page d'erreur ou autre
    header("Location: inscription.php");
    exit();
}
?>
