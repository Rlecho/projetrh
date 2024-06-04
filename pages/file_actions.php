<?php
require_once("connexiondb.php");

if(isset($_POST['action']) && isset($_POST['file_id'])) {
    $action = $_POST['action'];
    $fileId = $_POST['file_id'];
    
    // Pour l'action de suppression
    if ($action === 'delete') {
        // Supprimer le fichier de la base de données en fonction de l'identifiant donné
        $query = "DELETE FROM document WHERE id = :file_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':file_id', $fileId);
        $stmt->execute();
        // Vous pouvez également renvoyer une réponse indiquant si la suppression a réussi ou échoué
        echo "Le fichier a été supprimé avec succès.";
    } else {
        // Traitez les autres actions (view, download) de la même manière
    }
} else {
    // Si les paramètres action ou file_id manquent, renvoyer un message d'erreur
    echo "Paramètres manquants pour effectuer l'action.";
}
?>
