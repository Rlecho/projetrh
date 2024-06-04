<?php
require_once("connexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $id= $_POST['id']; 
    $langue = $_POST['langue'];
    $lue = $_POST['lue'];
    $ecrite = $_POST['ecrite'];
    $parlee = $_POST['parlee'];

    try {
        // Requête SQL pour insérer la langue dans la table langue
        $sql = "INSERT INTO langue (idemp, langue, lue, ecrite, parlee)
                VALUES (:idemp, :langue, :lue, :ecrite, :parlee)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idemp', $id);
        $stmt->bindParam(':langue', $langue);
        $stmt->bindParam(':lue', $lue);
        $stmt->bindParam(':ecrite', $ecrite);
        $stmt->bindParam(':parlee', $parlee);
        $stmt->execute();
        
        // Si l'insertion réussit, afficher la SweetAlert
?>
        <html>
        <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal({
                icon: "success",
                title: "Bon travail !",
                text: "La langue a été ajoutée avec succès!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
            }).then(function(result) {
                window.location = "langue.php";
            });
        </script>
        </body>
        </html>
<?php        
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>
