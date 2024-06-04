<?php
require_once("connexiondb.php");
// Récupérer l'identifiant du fichier depuis l'URL
if(isset($_GET['id'])) {
    $fileId = $_GET['id'];
    
    $nouveauNomFichier = '65cd2d178a5c38.31001682.pdf';
    try {
        // Préparer et exécuter la requête SQL pour récupérer le nom du fichier en fonction de son identifiant
        $requete = $pdo->prepare("SELECT file_name FROM document WHERE id = :id");
        $requete->bindParam(':id', $fileId);
        $requete->execute();
        
        // Récupérer le résultat de la requête
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        // Vérifier si un fichier correspondant a été trouvé
        if($resultat) {
            // Récupérer le nom du fichier
            $nomFichier = $resultat['file_name'];

            // Afficher le nom du fichier
            echo "Le nom du fichier avec l'ID $fileId est : $nomFichier";
        } else {
            // Gérer le cas où aucun fichier correspondant n'a été trouvé
            echo "Aucun fichier trouvé avec l'ID $fileId";
        }
    } catch(PDOException $e) {
        // Gérer les exceptions PDO
        echo "Erreur de requête SQL : " . $e->getMessage();
    }

    // Ici, vous pouvez mettre la logique pour récupérer le chemin du fichier en fonction de $fileId
    // Par exemple, vous pouvez rechercher le chemin du fichier dans une base de données ou dans un répertoire spécifique

    // Une fois que vous avez le chemin du fichier, vous pouvez charger et afficher son contenu
    $filee='uploads/';
    $filePath = $filee .$nouveauNomFichier;/* Logique pour obtenir le chemin du fichier en fonction de $fileId */;
    $fileContent = file_get_contents($filePath);

    // Afficher le contenu du fichier
    echo nl2br(htmlspecialchars($fileContent));
} else {
    // Gérer le cas où l'identifiant du fichier n'est pas fourni dans l'URL
    echo "Identifiant du fichier non spécifié";
}
?>
