<?php
require_once("connexiondb.php");
session_start();
if (isset($_POST['idcand'])) {
    $id = $_POST['idcand'];
} else {
    $id = "";
}
// Récupérer les données du formulaire
// Assurez-vous de sécuriser ces données contre les injections SQL et autres vulnérabilités
$destinataire = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL); // Récupérer l'adresse e-mail du candidat depuis le formulaire

// Vérifier si l'adresse e-mail est valide
if (!filter_var($destinataire, FILTER_VALIDATE_EMAIL)) {
    echo "Adresse e-mail invalide.";
    exit;
}

$sujet = "Suite des étapes de recrutement";
$message = "Cher candidat,\n\nNous vous remercions pour votre candidature. 
Nous avons le plaisir de vous informer que votre profil correspond à nos besoins.
\n\nNous aimerions organiser un entretien à notre siège social. Veuillez nous contacter 
pour fixer une date et une heure qui vous conviennent.\n\nCordialement,\nNotre entreprise";

// Envoi de l'email
// Assurez-vous que votre serveur est configuré pour envoyer des e-mails
// Assurez-vous également que l'adresse e-mail expéditeur est correctement configurée dans votre serveur
if (mail($destinataire, $sujet, $message)) {
    echo "<script type='text/javascript'>
            alert('L\'email a bien été envoyé.');
            window.location.href = 'visualisercandidat.php?idcand=$id';
          </script>";
} else {
    echo "<script type='text/javascript'>
            alert('Une erreur s\'est produite lors de l\'envoi de l\'email.');
            window.location.href = 'visualisercandidat.php?idcand=$id';
          </script>";
}
?>
