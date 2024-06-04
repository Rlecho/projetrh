<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");

// Récupérer le nouveau grade souhaité depuis le formulaire
$nouveauGrade = $_POST['nouveau_grade'];

// Récupérer l'ID de l'employé depuis le formulaire
$idEmploye = $_POST['id'];

// Requête pour mettre à jour le grade de recrutement de l'employé dans la base de données
$sql = "UPDATE situa_pro SET grade_recrutement = :nouveau_grade WHERE idemp = :id";

// Préparer la requête
$requete = $pdo->prepare($sql);
$requete->bindParam(':nouveau_grade', $nouveauGrade);
$requete->bindParam(':id', $idEmploye);

// Exécuter la requête
if ($requete->execute()) {
    // Succès : insérer les informations de reclassement dans la table reclassement
    $nomEmploye = $_POST['nom'];
    $posteActuel = $_POST['poste_actuel'];

    // Requête pour insérer les informations de reclassement dans la table reclassement
    $sqlReclassement = "INSERT INTO reclassement (nom_complet_employe, poste_actuel, nouveau_grade_souhaite, idemp) VALUES (:nom, :poste_actuel, :nouveau_grade, :id)";
    $requeteReclassement = $pdo->prepare($sqlReclassement);
    $requeteReclassement->bindParam(':nom', $nomEmploye);
    $requeteReclassement->bindParam(':poste_actuel', $posteActuel);
    $requeteReclassement->bindParam(':nouveau_grade', $nouveauGrade);
    $requeteReclassement->bindParam(':id', $idEmploye);

    // Exécuter la requête d'insertion
           if ($requeteReclassement->execute()) {
                // Requête pour récupérer l'adresse e-mail de l'employé
                $sqlEmail = "SELECT email FROM employes WHERE idemp = :idEmp";

                // Préparer la requête
                $requeteEmail = $pdo->prepare($sqlEmail);
                $requeteEmail->bindParam(':idEmp', $idEmploye);
                $requeteEmail->execute();
                
                // Récupérer l'adresse e-mail de l'employé
                $row = $requeteEmail->fetch(PDO::FETCH_ASSOC);
                $emailEmployes = $row['email'];

            // Succès : envoyer un e-mail à l'employé
            $emailEmploye =$emailEmployes;
            $sujet = "Notification d'affectation";
            $message = "Cher $nomEmploye,\n\nNous vous informons que vous avez été reclassé au grade $nouveauGrade et au poste $posteActuel.\n\nCordialement,\nL'équipe de gestion des ressources humaines";
            $headers = "From: VotreNom <votre@email.com>";
            mail($emailEmploye, $sujet, $message, $headers);
    
            // Redirection vers une autre page ou affichage d'un message de succès
            echo "<script>
                    alert('Le reclassement a été effectué avec succès.');
                    window.location.href = 'carierreRh.php?idemp=$idEmploye';
                </script>";
        } else {
            // Échec : afficher un message d'erreur
            echo "<script>
                    alert('Une erreur s'est produite lors de l'enregistrement du reclassement.');
                  </script>";
        }

} else {
    // Échec : afficher un message d'erreur
    echo "<script>
            alert('Une erreur s'est produite lors du reclassement.');
          </script>";
}

// Fermer la connexion à la base de données
$pdo = null;
?>
