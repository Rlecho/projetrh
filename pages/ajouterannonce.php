<?php
   require_once("identifier.php");
  require_once("connexiondb.php");
  $titre=$_POST['titre'];
  $t1=$_POST['t1'];
 
  $requete="INSERT INTO annoncement (titre,description) VALUES (?,?)";
  $params=array($titre,$t1);
  $resultat=$pdo->prepare($requete);
  $resultat->execute($params);
  
  header('location:annoncements.php');

?>


<?php
require_once("identifier.php");
require_once("connexiondb.php");

// Récupérer les données du formulaire
$titre = $_POST['titre'];
$t1 = $_POST['t1'];
$employes_concernes = $_POST['employes'];

// Requête d'insertion pour la réunion
$requete_annoncement = "INSERT INTO annoncement (titre, t1) VALUES (?, ?)";
$params_annoncement = array($titre, $t1);
$resultat_annoncement = $pdo->prepare($requete_annoncement);
$resultat_annoncement->execute($params_annoncement);

// Récupérer l'identifiant de la dernière réunion insérée
$id_annoncement = $pdo->lastInsertId();

// Requête d'insertion pour les employés concernés
$requete_employes_annoncement = "INSERT INTO annonce_employes (idannonce, idemploye) VALUES (?, ?)";
$resultat_employes_annoncement = $pdo->prepare($requete_employes_annoncement);

// Boucle pour insérer chaque employé concerné dans la table de liaison
foreach ($employes_concernes as $idemp) {
    $resultat_employes_annoncement->execute([$id_annoncement, $idemp]);
    
    // Récupérer les informations de l'employé pour l'envoi de l'e-mail
    $requete_info_employe = "SELECT nom,email FROM employes WHERE idemp = ?";
    $resultat_info_employe = $pdo->prepare($requete_info_employe);
    $resultat_info_employe->execute([$idemp]);
    $info_employe = $resultat_info_employe->fetch(PDO::FETCH_ASSOC);
    
    // Envoyer un e-mail à l'employé
    $to = $info_employe['email'];
    $subject = 'Nouvelle réunion';
    $message = "Bonjour " . $info_employe['nom'] . ",\n\n";
    $message .= "Voici une nouvelle annonce" . $titre . ".\n\n" .$t1 .".\n\n";
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
