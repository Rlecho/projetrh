<?php
// Vérifiez si le formulaire de modification de la langue a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_banque'])) {
    // Inclure le fichier de connexion à la base de données
    require_once("connexiondb.php");

    // Récupérer les données du formulaire
    $id_banque = $_POST['id_banque'];
    $nom_banque = $_POST['nom_banque'];
    $nom_branche = $_POST['nom_branche'];
    $nom_compte = $_POST['nom_compte'];
    $numero_compte = $_POST['numero_compte'];
    // Ajoutez d'autres champs du formulaire ici

    // Préparer et exécuter la requête de mise à jour de la langue
    $sql = "UPDATE banque_info SET nom_banque = :nom_banque,nom_branche=:nom_branche,nom_compte=:nom_compte,numero_compte=:numero_compte WHERE id = :id_banque";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_banque', $id_banque);
    $stmt->bindParam(':nom_banque', $nom_banque);
    $stmt->bindParam(':nom_branche', $nom_branche);
    $stmt->bindParam(':nom_compte', $nom_compte);
    $stmt->bindParam(':numero_compte', $numero_compte);
    // Associez d'autres paramètres de liaison ici

    if ($stmt->execute()) {
        $success = true;
    } else {
        $success = false;
    }
}
?>

<html>
<head>
    <!-- Inclure les fichiers CSS et JavaScript de SweetAlert -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
    <!-- Afficher le message SweetAlert en fonction du résultat du traitement -->
    <?php if (isset($success) && $success) : ?>
        <script>
            swal({
                icon: 'success',
                title: 'Modification réussie !',
                text: 'La banque a été mise à jour avec succès.',
                showConfirmButton: true,
                confirmButtonText: 'Fermer'
            }).then(function(result) {
                window.location = 'info_bancaire.php';
            });
        </script>
    <?php else : ?>
        <script>
            swal({
                icon: 'error',
                title: 'Erreur !',
                text: 'Une erreur est survenue lors de la modification de la banque.',
                showConfirmButton: true,
                confirmButtonText: 'Fermer'
            }).then(function(result) {
                window.location = 'info_bancaire.php';
            });
        </script>
    <?php endif; ?>
</body>
</html>
