<?php
// Inclure la connexion à la base de données
require_once("connexiondb.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $id_employe = $_POST['id'];
    $date_recrutement = $_POST['date_recru'];
    $grade_recrutement = $_POST['grad_recru'];
    $echelle_recrutement = $_POST['echelle_recru'];
    $echelon = $_POST['echelon'];

    // Gérer le téléchargement du fichier de la fiche d'embauche s'il est présent
    $fiche_embauche = "";
    if ($_FILES['fiche_embauche']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = "embauche/"; // Répertoire de téléchargement
        $fiche_embauche = $upload_dir . basename($_FILES['fiche_embauche']['name']);
        move_uploaded_file($_FILES['fiche_embauche']['tmp_name'], $fiche_embauche);
    }

    try {
        // Requête SQL pour insérer les données dans la table situation_employé
        $sql = "INSERT INTO situa_pro (idemp, date_recrutement, grade_recrutement, echelle_recrutement, echelon, fiche_embauche)
                VALUES (:idemp, :date_recrutement, :grade_recrutement, :echelle_recrutement, :echelon, :fiche_embauche)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idemp', $id_employe);
        $stmt->bindParam(':date_recrutement', $date_recrutement);
        $stmt->bindParam(':grade_recrutement', $grade_recrutement);
        $stmt->bindParam(':echelle_recrutement', $echelle_recrutement);
        $stmt->bindParam(':echelon', $echelon);
        $stmt->bindParam(':fiche_embauche', $fiche_embauche);
        $stmt->execute();

        // Redirection vers une page de confirmation ou une autre page appropriée
        header("Location: situa_profRh.php?idemp=" . $idEmp);

        exit();
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>
