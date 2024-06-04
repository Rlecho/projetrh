<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");
require_once("identifier.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs requis sont remplis
    if (isset($_POST['titreCompetence']) && isset($_POST['descriptionCompetence']) && isset($_POST['dateAcquisition']) && isset($_POST['impact']) && isset($_POST['dureeApprentissage']) && isset($_POST['domaineCompetence']) && isset($_POST['methode'])) {
        
        // Récupérer les valeurs du formulaire
        $titre = $_POST['titreCompetence'];
        $description = $_POST['descriptionCompetence'];
        $date = $_POST['dateAcquisition'];
        $impact = $_POST['impact'];
        $duree = $_POST['dureeApprentissage'];
        $domaine = $_POST['domaineCompetence'];
        $methode = $_POST['methode'];
        $idEmploye = $_SESSION['user']['idemp'];

        // Préparer la requête pour insérer les données dans la base de données
        $sql = "INSERT INTO competence (titre, description, date_acquisition, niveau_maitrise, duree_apprentissage, domaine, methode, idemp ) VALUES (:titre, :description, :dateac, :impact, :duree, :domaine, :methode, :idemp)";

        // Préparer la requête
        $requete = $pdo->prepare($sql);

        // Liaison des paramètres de la requête
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':dateac', $date);
        $requete->bindParam(':impact', $impact);
        $requete->bindParam(':duree', $duree);
        $requete->bindParam(':domaine', $domaine);
        $requete->bindParam(':methode', $methode);
        $requete->bindParam(':idemp',$idEmploye);

        // Exécuter la requête
        if ($requete->execute()) {
            // Succès : afficher un message de confirmation
            echo "<script>
            alert('La compétence a été enregistrée avec succès.');
            window.location.href = 'carierre.php?idemp=$idEmploye';
            </script>";
        } else {
            // Échec : afficher un message d'erreur
            echo "<script>
            alert('Une erreur s\'est produite lors de l'enregistrement de la compétence. Veuillez réessayer.');
            window.location.href = 'carierre.php?idemp=$idEmploye';
            </script>";
        }
    } else {
        // Certains champs requis ne sont pas remplis
        echo "<script>
        alert('Veuillez remplir tous les champs obligatoires.');
        window.location.href = 'carierre.php?idemp=$idEmploye';
        </script>";
    }
}
?>
