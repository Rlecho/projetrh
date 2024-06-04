<?php
if (isset($_POST['id_diplome']) && is_numeric($_POST['id_diplome'])) {
    // Inclure le fichier de connexion à la base de données
    require_once("connexiondb.php");

    // Récupérer les données du formulaire
    $id_diplome = $_POST['id_diplome'];
    $diplome = $_POST['diplome'];
    $etablissement = $_POST['etablissement'];
    $ville = $_POST['ville'];
    $annee = $_POST['annee'];
    $niveau = $_POST['niveau'];
    $plus_eleve = $_POST['plus_eleve'];
    // Récupérer les autres champs du formulaire ici

    // Préparer et exécuter la requête de mise à jour du diplôme
    $sql = "UPDATE diplome SET diplome_obtenu = :diplome, etablissement =:etablissement, ville =:ville, annee=:annee, niveau=:niveau, plus_eleve=:plus_eleve WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_diplome);
    $stmt->bindParam(':diplome', $diplome);
    $stmt->bindParam(':etablissement', $etablissement);
    $stmt->bindParam(':ville', $ville);
    $stmt->bindParam(':annee', $annee);
    $stmt->bindParam(':niveau', $niveau);
    $stmt->bindParam(':plus_eleve', $plus_eleve);
    // Associez les autres paramètres de liaison ici
    if ($stmt->execute()) {
        if ($stmt->execute()) {
            // La mise à jour a réussi
            echo "success";
        } else {
            // La mise à jour a échoué
            echo "error";
        }
    } else {
        // Afficher un message d'erreur si l'ID de diplôme n'est pas valide
        echo "ID de diplôme non valide.";
    }
}
?>
