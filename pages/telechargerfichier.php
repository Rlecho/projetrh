<?php
if(isset($_GET['file_name'])) {
    $nomFichier = $_GET['file_name'];
    $cheminFichier = "uploads/" . $nomFichier;

    echo "Chemin du fichier : " . $cheminFichier; // Ajoutez ce message de débogage

    // Effectuer des vérifications supplémentaires si nécessaire, puis télécharger le fichier
    if(file_exists($cheminFichier)) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . basename($cheminFichier));
        header("Content-Length: " . filesize($cheminFichier));
        readfile($cheminFichier);
        exit;
    } else {
        echo "Le fichier n'existe pas.";
    }
} else {
    echo "Nom de fichier non spécifié.";
}
?>
