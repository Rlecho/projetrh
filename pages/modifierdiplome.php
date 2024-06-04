<?php
// Vérifiez si l'identifiant du diplôme est spécifié dans la requête GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Inclure le fichier de connexion à la base de données
    require_once("connexiondb.php");

    // Sélectionnez les détails du diplôme à modifier
    $sql = "SELECT * FROM diplome WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $diplome = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si le diplôme existe dans la base de données
    if ($diplome) {
        // Affichez un formulaire pré-rempli avec les détails du diplôme à modifier
        ?>
        <form action="traitement_modifier_diplome.php" method="POST">
            <input type="hidden" name="id_diplome" value="<?php echo $diplome['id']; ?>">
            <label for="diplome">Diplôme :</label>
            <input type="text" id="diplome" name="diplome" value="<?php echo $diplome['diplome']; ?>"><br>
            <label for="etablissement">Établissement :</label>
            <input type="text" id="etablissement" name="etablissement" value="<?php echo $diplome['etablissement']; ?>"><br>
            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" value="<?php echo $diplome['ville']; ?>"><br>
            <label for="annee">Année :</label>
            <input type="text" id="annee" name="annee" value="<?php echo $diplome['annee']; ?>"><br>
            <label for="niveau">Niveau :</label>
            <input type="text" id="niveau" name="niveau" value="<?php echo $diplome['niveau']; ?>"><br>
            <label for="plus_eleve">Plus Élevé :</label>
            <input type="text" id="plus_eleve" name="plus_eleve" value="<?php echo $diplome['plus_eleve']; ?>"><br>
            <input type="submit" value="Modifier">
        </form>
        <?php
    } else {
        echo "Diplôme non trouvé.";
    }
} else {
    echo "ID de diplôme non valide.";
}
?>
