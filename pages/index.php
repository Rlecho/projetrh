<!--la page index aide a lancer la premier page qu'on a spécifier comme page de démarrage de l'application dans notre cas accueil.php 
une fois en tape le chemin localhost le serveur nous dirigeons vers cette page -->
<?php
// index.php

header("location:accueil.php");

// Récupérer l'URL demandée
$url = isset($_GET['url']) ? $_GET['url'] : 'profilEmployes.php';

// Sécuriser l'URL pour éviter les injections
$url = htmlspecialchars($url);

// Inclure le fichier correspondant à l'URL demandée
switch ($url) {
    case 'profilEmployes.php':
        include 'profilEmployes.php';
        break;
    case 'documentEmployees.php':
        include 'documentEmployees.php';
        break;
    // Ajoutez d'autres cas pour chaque page que vous souhaitez inclure
    default:
        // Page par défaut si l'URL demandée n'est pas trouvée
        include '404.php';
        break;
}
?>
