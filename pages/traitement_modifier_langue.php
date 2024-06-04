<?php
// Vérifiez si le formulaire de modification de la langue a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_langue'])) {
    // Inclure le fichier de connexion à la base de données
    require_once("connexiondb.php");

    // Récupérer les données du formulaire
    $id_langue = $_POST['id_langue'];
    $nouvelle_langue = $_POST['langue'];
    $lue = $_POST['lue'];
    $ecrite = $_POST['ecrite'];
    $parlee = $_POST['parlee'];
    // Ajoutez d'autres champs du formulaire ici

    // Préparer et exécuter la requête de mise à jour de la langue
    $sql = "UPDATE langue SET langue = :nouvelle_langue,lue=:lue,ecrite=:ecrite,parlee=:parlee WHERE id = :id_langue";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_langue', $id_langue);
    $stmt->bindParam(':nouvelle_langue', $nouvelle_langue);
    $stmt->bindParam(':lue', $lue);
    $stmt->bindParam(':ecrite', $ecrite);
    $stmt->bindParam(':parlee', $parlee);
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
                text: 'La langue a été mise à jour avec succès.',
                showConfirmButton: true,
                confirmButtonText: 'Fermer'
            }).then(function(result) {
                window.location = 'langue.php';
            });
        </script>
    <?php else : ?>
        <script>
            swal({
                icon: 'error',
                title: 'Erreur !',
                text: 'Une erreur est survenue lors de la modification de la langue.',
                showConfirmButton: true,
                confirmButtonText: 'Fermer'
            }).then(function(result) {
                window.location = 'langue.php';
            });
        </script>
    <?php endif; ?>
</body>
</html>
