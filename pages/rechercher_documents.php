<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la valeur saisie dans le champ de recherche
    $searchTerm = $_POST['searchdocs'];

    // Exécuter la requête SQL pour rechercher les documents correspondants
    $stmt = $pdo->prepare("SELECT * FROM document WHERE file_name LIKE ?");
    $stmt->execute(["%$searchTerm%"]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats de la recherche
    foreach ($result as $document) {
        // Afficher les détails du document (par exemple, son nom, son type, etc.)
        echo "Nom du document : " . $document['file_name'] . "<br>";
        echo "Type du document : " . $document['file_type'] . "<br>";
        // Afficher d'autres détails du document si nécessaire
        echo "<br>";
    }
}
?>
