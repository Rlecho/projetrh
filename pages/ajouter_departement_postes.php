<?php
require_once("connexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomDepartement = $_POST['nom_departement'];
    $postes = $_POST['nom_poste']; // Utiliser le même nom que celui défini dans le formulaire

    // Insertion du département dans la table 'departement'
    $sqlDepartement = "INSERT INTO departement (nom_departement) VALUES (:nom_departement)";
    $stmtDepartement = $pdo->prepare($sqlDepartement);
    $stmtDepartement->bindParam(':nom_departement', $nomDepartement);
    $stmtDepartement->execute();

    // Récupération de l'ID du département nouvellement inséré
    $idDepartement = $pdo->lastInsertId();

    // Insertion des postes associés au département dans la table 'postes'
    $sqlPostes = "INSERT INTO postes (nom_poste, id_departement) VALUES (:nom_poste, :id_departement)";
    $stmtPostes = $pdo->prepare($sqlPostes);

    foreach ($postes as $poste) {
        $stmtPostes->bindParam(':nom_poste', $poste);
        $stmtPostes->bindParam(':id_departement', $idDepartement);
        $stmtPostes->execute();
    }

    // Redirection vers une page de confirmation ou autre
    header("Location: profilRH.php");
    exit();
}

?>
