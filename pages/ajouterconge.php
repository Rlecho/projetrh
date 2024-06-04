<?php
require_once("identifier.php");
require_once("connexiondb.php");

// Récupération des données du formulaire
$dateC = $_POST['datecreation'];
$typeConge = $_POST['type'];
$nom = $_SESSION['user']['nom'];
$id = $_SESSION['user']['idemp'];

// Initialisation des variables spécifiques à chaque type de congé
$dateDebut = $dateFin = $motif = $nombre = "";

// Vérification du type de congé et récupération des données spécifiques
if ($typeConge == 'Conge') {
    $dateDebut = $_POST['debutconge'];
    $dateFin = $_POST['finconge'];
    $motif = $_POST['motifConge'];
    // Vérification si le champ est envoyé avec la requête POST
    $nombre = isset($_POST['nombrejoursconge']) ? $_POST['nombrejoursconge'] : 0;
} elseif ($typeConge == 'Absence') {
    $dateDebut = $_POST['debutAbsence'];
    $dateFin = $_POST['finAbsence'];
    $motif = $_POST['motifAbsence'];
    $nombre = isset($_POST['nombreJoursAbsence']) ? $_POST['nombreJoursAbsence'] : 0;
} elseif ($typeConge == 'Mise en disponibilité') {
    $dateDebut = $_POST['debutMiseDispo'];
    $dateFin = $_POST['finMiseDispo'];
    $motif = $_POST['motifMisedispo'];
    $nombre = isset($_POST['nombreMoisDispo']) ? $_POST['nombreMoisDispo'] :0;
}

// Calcul de la période
$periode = calculerPeriode($dateDebut, $dateFin, $typeConge);

// Requête d'insertion dans la base de données
$requete = "INSERT INTO congesdemandes (idconge, datecreation, periode, datedebut, datefin, typeconge, motif, nom, idemp, nombre) 
            VALUES (NULL, :dateC, :periode, :datedebut, :datefin, :typeconge, :motif, :nom, :id, :nombre)";
$resultat = $pdo->prepare($requete);

// Bind des valeurs
$resultat->bindParam(':dateC', $dateC);
$resultat->bindParam(':periode', $periode);
$resultat->bindParam(':datedebut', $dateDebut);
$resultat->bindParam(':datefin', $dateFin);
$resultat->bindParam(':typeconge', $typeConge);
$resultat->bindParam(':motif', $motif);
$resultat->bindParam(':nom', $nom);
$resultat->bindParam(':id', $id);
$resultat->bindParam(':nombre', $nombre);

// Exécution de la requête
$resultat->execute();

// Redirection vers une page de confirmation
header("Location: conges.php");
exit();

// Fonction pour calculer la période en jours ou mois
function calculerPeriode($debut, $fin, $type) {
    if ($type == 'Conge' || $type == 'Absence') {
        // Calcul de la période en jours
        $dateDebut = new DateTime($debut);
        $dateFin = new DateTime($fin);
        $periode = $dateDebut->diff($dateFin)->days + 1; // +1 pour inclure le dernier jour
    } elseif ($type == 'Mise en disponibilité') {
        // Calcul de la période en mois
        $dateDebut = new DateTime($debut);
        $dateFin = new DateTime($fin);
        $periode = $dateDebut->diff($dateFin)->m + 1; // +1 car le premier mois est inclus
    }
    return $periode;
}
?>
