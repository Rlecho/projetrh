

<?php 
session_start();
if (isset($_SESSION['user'])){
    require_once("connexiondb.php");
    $id=$_GET['idemp']; 
    $etat=$_GET['etat'];
    if ($etat==1)
        $nouveauetat=0;
    else 
        $nouveauetat=1;

    // Mettre à jour l'état de l'employé
    $requete="UPDATE employes SET etat=? WHERE idemp=?";
    $params=array($nouveauetat,$id);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);

    // Récupérer l'e-mail de l'employé
    $requete_email = "SELECT email FROM employes WHERE idemp=?";
    $resultat_email = $pdo->prepare($requete_email);
    $resultat_email->execute(array($id));
    $employe = $resultat_email->fetch();
    $email_employe = $employe['email'];

    // Préparer le sujet et le message de l'e-mail
    $sujet = ($nouveauetat == 1) ? "Activation de votre compte" : "Désactivation de votre compte";
    $message = ($nouveauetat == 1) ? "Votre compte a été activé." : "Votre compte a été désactivé.";

    // Envoi de l'e-mail à l'employé
    if(mail($email_employe, $sujet, $message)) {
        echo "L'email a bien été envoyé à l'employé.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de l'email à l'employé.";
    }

    // Rediriger vers la page employes.php
    header('location:employes.php');
} else {
    header('location:connexion.php');
}
?>
