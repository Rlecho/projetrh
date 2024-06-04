<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");

// Sélectionnez les notifications depuis la base de données
$query = "SELECT * FROM notifications ORDER BY id DESC LIMIT 10";
$statement = $pdo->query($query);
$notifications = $statement->fetchAll(PDO::FETCH_ASSOC);

// Retournez les notifications sous forme de JSON
header('Content-Type: application/json');
echo json_encode($notifications);
?>