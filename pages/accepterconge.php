<?php
session_start();
if (isset($_SESSION['user'])){
    require_once("connexiondb.php");

    if (isset($_GET['idemp'])) {
        $id = $_GET['idemp'];
    } else {
        $id = "";
    }

    // Insertion dans la table conges à partir de congesdemandes
    $requete = "INSERT INTO conges (datecreation, periode, datedebut, datefin, typeconge, motif, nom, idemp, nombre)
                SELECT datecreation, periode, datedebut, datefin, typeconge, motif, nom, idemp, nombre
                FROM congesdemandes WHERE idemp = :id";
    $resultat = $pdo->prepare($requete);
    $resultat->bindParam(':id', $id);
    $resultat->execute();

    // Suppression des enregistrements dans congesdemandes
    $requete2 = "DELETE FROM congesdemandes WHERE idemp = :id";
    $resultat2 = $pdo->prepare($requete2);
    $resultat2->bindParam(':id', $id);
    $resultat2->execute();

    // Requête pour obtenir les informations de l'employé
    $requete3 = "SELECT email, nom FROM employes WHERE idemp = :id";
    $resultat3 = $pdo->prepare($requete3);
    $resultat3->bindParam(':id', $id);
    $resultat3->execute();
    $info_employe = $resultat3->fetch(PDO::FETCH_ASSOC);

    // Vérifier si les informations de l'employé ont été trouvées
    if ($info_employe) {
        // Envoyer un e-mail à l'employé
        $to = $info_employe['email'];
        $subject = 'Nouvelle réunion';
        $message = "Bonjour " . $info_employe['nom'] . ",\n\n";
        $message .= "Votre demande a été acceptée avec succès.\n\n";
        $message .= "Cordialement,\nVotre entreprise";
        $headers = 'From: votreentreprise@example.com' . "\r\n" .
                   'Reply-To: votreentreprise@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    } else {
        echo "Erreur: Les informations de l'employé n'ont pas été trouvées.";
    }
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
