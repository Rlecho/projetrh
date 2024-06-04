<?php
require_once("identifier.php");
require_once("connexiondb.php");

// Vérification si l'identifiant du document à supprimer est passé en paramètre
if (isset($_GET['id'])) {
    $documentId = $_GET['id'];

    // Requête pour récupérer les informations du document à supprimer
    $sql = "SELECT * FROM document WHERE id = :documentId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':documentId', $documentId);
    $stmt->execute();
    $document = $stmt->fetch();

    if ($document) {
        // Chemin complet du fichier à supprimer
        $filePath = "uploads/" . $document['file_name'];

        // Suppression du fichier physique du serveur
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Requête pour supprimer le document de la base de données
        $sqlDelete = "DELETE FROM document WHERE id = :documentId";
        $stmtDelete = $pdo->prepare($sqlDelete);
        $stmtDelete->bindParam(':documentId', $documentId);
        $stmtDelete->execute();

        // Redirection vers une page de confirmation ou une autre page appropriée
        header("Location: documentEmployees.php");
        exit();
    } else {
        // Document non trouvé dans la base de données
        echo "Document non trouvé.";
    }
} else {
    // Aucun identifiant de document spécifié dans les paramètres de l'URL
    echo "Identifiant du document non spécifié.";
}
?>
