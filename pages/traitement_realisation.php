<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");
require_once("identifier.php");

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs requis sont remplis
    if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['date']) && isset($_POST['impact']) && isset($_POST['responsable']) && isset($_FILES['documentation'])) {
        
        // Récupérer les valeurs du formulaire
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $impact = $_POST['impact'];
        $commentaires = isset($_POST['commentaires']) ? $_POST['commentaires'] : '';
        $responsable = $_POST['responsable'];
        $idEmploye = $_SESSION['user']['idemp'];

        // Chemin vers le dossier où télécharger les fichiers
        $dossierUpload = "realisations/";

        // Nom du fichier téléchargé
        $nomFichier = basename($_FILES["documentation"]["name"]);

        // Chemin complet du fichier téléchargé
        $cheminFichier = $dossierUpload . $nomFichier;

        // Télécharger le fichier
        if (move_uploaded_file($_FILES["documentation"]["tmp_name"], $cheminFichier)) {
            // Le fichier a été téléchargé avec succès

            // Préparer la requête pour insérer les données dans la base de données
            $sql = "INSERT INTO realisation (titre, description_detaillee, date_realisation, impact, documentation, commentaires, responsables,idemp ) VALUES (:titre, :description, :date_realisation, :impact, :documentation, :commentaires, :responsables, :idemp)";

            // Préparer la requête
            $requete = $pdo->prepare($sql);

            // Liaison des paramètres de la requête
            $requete->bindParam(':titre', $titre);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':date_realisation', $date);
            $requete->bindParam(':impact', $impact);
            $requete->bindParam(':documentation', $cheminFichier);
            $requete->bindParam(':commentaires', $commentaires);
            $requete->bindParam(':responsables', $responsable);
            $requete->bindParam(':idemp',$idEmploye);

            // Exécuter la requête
            if ($requete->execute()) {
                // Succès : afficher un message de confirmation
                echo "<script>
                alert('La réalisation a été enregistrée avec succès.');
                window.location.href = 'carierre.php?idemp=$idEmploye';
                </script>";
            } else {
                // Échec : afficher un message d'erreur
                echo "<script>
                alert('Une erreur s'est produite lors de l'enregistrement de la réalisation. Veuillez réessayer.');
                window.location.href = 'carierre.php?idemp=$idEmploye';
                </script>";
            }
        } else {
            // Une erreur s'est produite lors du téléchargement du fichier
            echo "<script>
            alert('Une erreur s'est produite lors du téléchargement du fichier. Veuillez réessayer.');
            window.location.href = 'carierreRh.php?idemp=$idEmploye';
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
