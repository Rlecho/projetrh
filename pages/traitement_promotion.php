<?php
// Inclure le fichier de connexion à la base de données
require_once("connexiondb.php");

// Récupérer les données du formulaire
$idEmploye = $_POST['id'];
$nomEmploye = $_POST['nom'];
$posteActuel = $_POST['poste_actuel'];
$departement = $_POST['departement'];
$approbationRH = $_POST['approbation'];
$dateEffetPromotion = $_POST['date_effet'];
$salairePropose = isset($_POST['salaire_propose']) ? $_POST['salaire_propose'] : null;
$depart = $_POST['departemented'];
$postePropose = $_POST['posted'];
$datePrisePoste = $_POST['date_prise_poste'];
$justificationPromotion = $_POST['justification'];
$recommandations = isset($_POST['recommandations']) ? $_POST['recommandations'] : null;
$commentaires = isset($_POST['commentaires']) ? $_POST['commentaires'] : null;


// Requête pour mettre à jour le département et le poste de l'employé dans la table employes
$sqlUpdateEmploye = "UPDATE employes SET departement = :departement, poste = :poste WHERE idemp = :id";
$requeteUpdateEmploye = $pdo->prepare($sqlUpdateEmploye);
$requeteUpdateEmploye->bindParam(':departement', $depart);
$requeteUpdateEmploye->bindParam(':poste', $postePropose);
$requeteUpdateEmploye->bindParam(':id', $idEmploye);

// Requête pour insérer les informations de promotion dans la table promotion
$sqlInsertPromotion = "INSERT INTO promotion (nom_complet_employe, poste_actuel, departement, approbation_responsable_rh, date_effet_promotion, salaire_propose, acceptation_terms, departe, poste_propose, date_prise_poste, justification_promotion, avis_superieur_direct, commentaire_supplementaire, idemp) VALUES (:nom, :posteActuel, :departement, :approbationRH, :dateEffetPromotion, :salairePropose, 1,:departe, :postePropose, :datePrisePoste, :justificationPromotion, :recommandations, :commentaires, :idEmploye)";
$requeteInsertPromotion = $pdo->prepare($sqlInsertPromotion);
$requeteInsertPromotion->bindParam(':nom', $nomEmploye);
$requeteInsertPromotion->bindParam(':posteActuel', $posteActuel);
$requeteInsertPromotion->bindParam(':departement', $departement);
$requeteInsertPromotion->bindParam(':approbationRH', $approbationRH);
$requeteInsertPromotion->bindParam(':dateEffetPromotion', $dateEffetPromotion);
$requeteInsertPromotion->bindParam(':salairePropose', $salairePropose);
$requeteInsertPromotion->bindParam(':departe', $depart);
$requeteInsertPromotion->bindParam(':postePropose', $postePropose);
$requeteInsertPromotion->bindParam(':datePrisePoste', $datePrisePoste);
$requeteInsertPromotion->bindParam(':justificationPromotion', $justificationPromotion);
$requeteInsertPromotion->bindParam(':recommandations', $recommandations);
$requeteInsertPromotion->bindParam(':commentaires', $commentaires);
$requeteInsertPromotion->bindParam(':idEmploye', $idEmploye);

// Exécuter la requête d'insertion dans la table promotion
if ($requeteInsertPromotion->execute()) {

  // Requête pour récupérer l'adresse e-mail de l'employé
$sqlEmail = "SELECT email FROM employes WHERE idemp = :idEmp";

// Préparer la requête
$requeteEmail = $pdo->prepare($sqlEmail);
$requeteEmail->bindParam(':idEmp', $idEmploye);
$requeteEmail->execute();

// Récupérer l'adresse e-mail de l'employé
$row = $requeteEmail->fetch(PDO::FETCH_ASSOC);
$emailEmploye = $row['email'];

     // Envoi de l'e-mail à l'employé
     $destinataire =$emailEmploye ; // Remplacez par l'adresse e-mail de l'employé
     $sujet = 'Promotion';
     $message = 'Cher  (e) ' . $nomEmploye . ',\n\nFélicitations! Vous avez été promu à un nouveau poste dans notre entreprise. Votre promotion prend effet à partir de la date : ' . $dateEffetPromotion . '. Pour plus de détails, veuillez contacter le service des ressources humaines.\n\nCordialement,\n[Votre entreprise]';
     $headers = 'From: VotreNom <votre@email.com>' . "\r\n" .
                 'Reply-To: votre@email.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

     mail($destinataire, $sujet, $message, $headers);
    // Succès : afficher un message de confirmation ou effectuer une autre action
    echo "<script>
            alert('La promotion a été enregistrée avec succès.');
            window.location.href = 'carierreRh.php?idemp=$idEmploye';
          </script>";
} else {
    // Échec : afficher un message d'erreur
    echo "<script>
            alert('Une erreur s'est produite lors de l'enregistrement de la promotion.');
            window.location.href = 'carierreRh.php?idemp=$idEmploye';
          </script>";
}

// Fermer la connexion à la base de données
$pdo = null;
