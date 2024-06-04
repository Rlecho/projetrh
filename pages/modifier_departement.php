<?php
require_once("connexiondb.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_departement = $_POST['id_departement'];
    $nom_departement = $_POST['nom_departement'];
    $postes = $_POST['postes'];

    // Mettre à jour le nom du département dans la table 'departement'
    $sql = "UPDATE departement SET nom_departement = :nom_departement WHERE id_departement = :id_departement";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom_departement', $nom_departement);
    $stmt->bindParam(':id_departement', $id_departement);
    $stmt->execute();

    // Supprimer tous les postes associés à ce département
    $sqlDelete = "DELETE FROM postes WHERE id_departement = :id_departement";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->bindParam(':id_departement', $id_departement);
    $stmtDelete->execute();

    // Insérer les nouveaux postes dans la table 'postes'
    $sqlInsert = "INSERT INTO postes (nom_poste, id_departement) VALUES (:nom_poste, :id_departement)";
    $stmtInsert = $pdo->prepare($sqlInsert);
    $stmtInsert->bindParam(':id_departement', $id_departement);

    foreach ($postes as $poste) {
        $stmtInsert->bindParam(':nom_poste', $poste);
        $stmtInsert->execute();
    }

    // Rediriger vers une page de confirmation ou une autre page
    header("Location: profilRH.php");
    exit();
} else {
    // Le formulaire n'a pas été soumis, rediriger vers une page d'erreur ou une autre page
    header("Location:connexion.php");
    exit();
}
?>
