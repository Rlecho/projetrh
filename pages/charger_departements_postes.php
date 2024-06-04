<?php
require_once("connexiondb.php");

// Tableau pour stocker les départements et leurs postes associés
$departementsPostes = array();

// Requête pour récupérer les départements et les postes associés
$sql = "SELECT d.nom_departement, p.nom_poste
        FROM departement d
        LEFT JOIN postes p ON d.id_departement = p.id_departement
        ORDER BY d.nom_departement, p.nom_poste";

$resultat = $pdo->query($sql);

// Boucle pour traiter les résultats de la requête
while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
    // Si le département n'existe pas encore dans le tableau, on l'ajoute
    if (!isset($departementsPostes[$row['nom_departement']])) {
        $departementsPostes[$row['nom_departement']] = array();
    }
    
    // Ajout du poste au département correspondant
    if (!is_null($row['nom_poste'])) {
        $departementsPostes[$row['nom_departement']][] = $row['nom_poste'];
    }
}

// Fermeture de la requête
$resultat->closeCursor();

// Fermeture de la connexion à la base de données
$pdo = null;

// Renvoyer les données des départements et postes au format JSON
echo json_encode($departementsPostes);
?>
