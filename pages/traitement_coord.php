<?php
require_once("connexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $idemp = $_POST['id'];
    $pays = $_POST['pays'];
    $ville = $_POST['ville'];
    $quartier = $_POST['quartier'];
    $facebook_nom = $_POST['facebook_nom'];
    $facebook_lien = $_POST['facebook_lien'];
    $twitter_nom = $_POST['twitter_nom'];
    $twitter_lien = $_POST['twitter_lien'];
    $linkedin_nom = $_POST['linkedin_nom'];
    $linkedin_lien = $_POST['linkedin_lien'];
    $instagram_nom = $_POST['instagram_nom'];
    $instagram_lien = $_POST['instagram_lien'];

    try {
        // Requête SQL pour insérer les coordonnées dans la table coordonnees
        $sql = "INSERT INTO coordonnees (idemp, pays, ville, quartier, facebook_nom, facebook_lien, twitter_nom, twitter_lien, linkedin_nom, linkedin_lien, instagram_nom, instagram_lien)
                VALUES (:idemp, :pays, :ville, :quartier, :facebook_nom, :facebook_lien, :twitter_nom, :twitter_lien, :linkedin_nom, :linkedin_lien, :instagram_nom, :instagram_lien)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idemp', $idemp);
        $stmt->bindParam(':pays', $pays);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':quartier', $quartier);
        $stmt->bindParam(':facebook_nom', $facebook_nom);
        $stmt->bindParam(':facebook_lien', $facebook_lien);
        $stmt->bindParam(':twitter_nom', $twitter_nom);
        $stmt->bindParam(':twitter_lien', $twitter_lien);
        $stmt->bindParam(':linkedin_nom', $linkedin_nom);
        $stmt->bindParam(':linkedin_lien', $linkedin_lien);
        $stmt->bindParam(':instagram_nom', $instagram_nom);
        $stmt->bindParam(':instagram_lien', $instagram_lien);
        $stmt->execute();
        
        echo "Les coordonnées ont été enregistrées avec succès.";
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>
