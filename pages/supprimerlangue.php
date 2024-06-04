<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    require_once("connexiondb.php");
    require_once("identifier.php");
    $sql = "DELETE FROM langue WHERE id = :id AND idemp = :id_employe";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->bindParam(':id_employe', $_SESSION['user']['idemp']);
    if ($stmt->execute()) {
        // La suppression a réussi
?>
<html>
<body>
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<script>
    swal({
        icon: 'success',
        title: 'Suppression réussie !',
        text: 'La langue a été supprimée avec succès.',
        showConfirmButton: true,
        confirmButtonText: 'Fermer',
        closeOnConfirm: false
    }).then(function(result) {
        window.location = 'langue.php';
    });
</script>
</body>
</html>
<?php
    } else {
        // La suppression a échoué
        echo "Erreur lors de la suppression de la langue.";
    }
} else {
    echo "ID de diplôme non valide.";
}
?>
