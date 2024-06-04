<?php
include 'connexiondb.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $id_employe = $_POST['id_employe']; // Supposons que vous avez un champ caché dans votre formulaire pour stocker cette valeur
    $num_cip = $_POST['num_cip'];
    $num_ifu = $_POST['num_ifu'];
    $lieu_naissance = $_POST['lieu_naissance'];
    $genre = $_POST['genre'];
    $situation_familiale = $_POST['situation_familiale'];
    $nationalite = $_POST['nationalite'];

    try {
        // Requête SQL pour insérer les détails dans la table details_perso
        $sql = "INSERT INTO details_perso (id_employes, num_cip, num_ifu, lieu_naissance, genre, situation_familiale, nationalite)
                VALUES (:id_employe, :num_cip, :num_ifu, :lieu_naissance, :genre, :situation_familiale, :nationalite)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_employe', $id_employe);
        $stmt->bindParam(':num_cip', $num_cip);
        $stmt->bindParam(':num_ifu', $num_ifu);
        $stmt->bindParam(':lieu_naissance', $lieu_naissance);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':situation_familiale', $situation_familiale);
        $stmt->bindParam(':nationalite', $nationalite);
        $stmt->execute();
        
        echo "Les détails personnels ont été enregistrés avec succès.";
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>
