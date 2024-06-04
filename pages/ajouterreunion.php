<?php
require_once("identifier.php");
require_once("connexiondb.php");

// Récupérer les données du formulaire
$titre = $_POST['titre'];
$type = $_POST['type'];
$debutdereunion = $_POST['debutdereunion'];
$heure = $_POST['heure'];
$employes_concernes = $_POST['employes'];

// Requête d'insertion pour la réunion
$requete_reunion = "INSERT INTO reunion (titre, type, datereunion, heurereunion) VALUES (?, ?, ?, ?)";
$params_reunion = array($titre, $type, $debutdereunion, $heure);
$resultat_reunion = $pdo->prepare($requete_reunion);
$resultat_reunion->execute($params_reunion);

// Récupérer l'identifiant de la dernière réunion insérée
$id_reunion = $pdo->lastInsertId();

// Requête d'insertion pour les employés concernés
$requete_employes_reunion = "INSERT INTO reunion_employes (idreunion, idemploye) VALUES (?, ?)";
$resultat_employes_reunion = $pdo->prepare($requete_employes_reunion);

// Boucle pour insérer chaque employé concerné dans la table de liaison
foreach ($employes_concernes as $idemp) {
    $resultat_employes_reunion->execute([$id_reunion, $idemp]);
    
    // Récupérer les informations de l'employé pour l'envoi de l'e-mail
    $requete_info_employe = "SELECT nom,email FROM employes WHERE idemp = ?";
    $resultat_info_employe = $pdo->prepare($requete_info_employe);
    $resultat_info_employe->execute([$idemp]);
    $info_employe = $resultat_info_employe->fetch(PDO::FETCH_ASSOC);
    
    // Envoyer un e-mail à l'employé
    $to = $info_employe['email'];
    $subject = 'Nouvelle réunion';
    $message = "Bonjour " . $info_employe['nom'] . ",\n\n";
    $message .= "Vous êtes convié(e) à une nouvelle réunion le " . $debutdereunion . " à " . $heure . ".\n\n";
    $message .= "Cordialement,\nVotre entreprise";
    $headers = 'From: votreentreprise@example.com' . "\r\n" .
        'Reply-To: votreentreprise@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
echo '<html>';
echo '  <body>';
echo '    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
echo '    <script>';
echo '      swal({';
echo '        icon: "success",';
echo '        title: "Bon travail !",';
echo '        text: "La réunion a été ajouté et les emails ont été envoyé avec succès !",';
echo '        showConfirmButton: true,';
echo '        confirmButtonText: "Fermer",';
echo '        closeOnConfirm: false';
echo '      }).then(function(result) {';
echo '        window.location = "reunion.php";';
echo '      });';
echo '    </script>';
echo '  </body>';
echo '</html>';
?>
