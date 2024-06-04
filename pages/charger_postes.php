<?php
require_once("connexiondb.php");

// Récupérer le département depuis la requête GET
$departement = $_GET['departement'];

// Tableau pour stocker les postes correspondant au département spécifié
$postes = array();

// Requête pour récupérer les postes associés au département spécifié
$sql = "SELECT nom_poste FROM postes WHERE id_departement IN (SELECT id_departement FROM departement WHERE nom_departement = :departement)";

// Préparation de la requête
$requete = $pdo->prepare($sql);
$requete->bindParam(':departement', $departement);
$requete->execute();

// Récupération des postes
while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
    $postes[] = $row['nom_poste'];
}

// Fermeture de la requête
$requete->closeCursor();

// Fermeture de la connexion à la base de données
$pdo = null;

// Renvoyer les postes au format JSON
echo json_encode($postes);
?>
