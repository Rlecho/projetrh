<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");
require_once("identifier.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs requis sont remplis
    if (isset($_POST['titreDefi']) && isset($_POST['descriptionDefi']) && isset($_POST['categorieDefi']) && isset($_POST['impact']) && isset($_POST['approcheDefi']) && isset($_POST['collaborateursDefi']) && isset($_POST['leconsApprises'])) {
        
        // Récupérer les valeurs du formulaire
        $titre = $_POST['titreDefi'];
        $description = $_POST['descriptionDefi'];
        $categorie = $_POST['categorieDefi'];
        $impact = $_POST['impact'];
        $approche = $_POST['approcheDefi'];
        $colla = $_POST['collaborateursDefi'];
        $lecon = $_POST['leconsApprises'];
        $idEmploye = $_SESSION['user']['idemp'];

        // Préparer la requête pour insérer les données dans la base de données
        $sql = "INSERT INTO defi (titre, description, categorie, niveau, strategie, collaborateurs, lecons,idemp ) VALUES (:titre, :description, :categorie, :impact, :approche, :colla, :lecon, :idemp)";

        // Préparer la requête
        $requete = $pdo->prepare($sql);

        // Liaison des paramètres de la requête
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':categorie', $categorie);
        $requete->bindParam(':impact', $impact);
        $requete->bindParam(':approche', $approche);
        $requete->bindParam(':colla', $colla);
        $requete->bindParam(':lecon', $lecon);
        $requete->bindParam(':idemp',$idEmploye);

        // Exécuter la requête
        if ($requete->execute()) {
            // Succès : afficher un message de confirmation
            echo "<script>
            alert('Le défi a été enregistrée avec succès.');
            window.location.href = 'carierre.php?idemp=$idEmploye';
            </script>";
        } else {
            // Échec : afficher un message d'erreur
            echo "<script>
            alert('Une erreur s\'est produite lors de l'enregistrement du défi. Veuillez réessayer.');
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
