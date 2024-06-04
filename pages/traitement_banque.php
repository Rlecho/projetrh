<?php
require_once("connexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $id= $_POST['id']; 
    $nom_banque = $_POST['nom_banque'];
    $nom_branche = $_POST['nom_branche'];
    $nom_compte = $_POST['nom_compte'];
    $numero_compte = $_POST['numero_compte'];

    try {
        // Requête SQL pour insérer les informations bancaires dans la table banque_info
        $sql = "INSERT INTO banque_info (idemp, nom_banque, nom_branche, nom_compte, numero_compte)
                VALUES (:idemp, :nom_banque, :nom_branche, :nom_compte, :numero_compte)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idemp', $id);
        $stmt->bindParam(':nom_banque', $nom_banque);
        $stmt->bindParam(':nom_branche', $nom_branche);
        $stmt->bindParam(':nom_compte', $nom_compte);
        $stmt->bindParam(':numero_compte', $numero_compte);
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
                text: "Les informations bancaires ont été enregistrées avec succès!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar",
                closeOnConfirm: false
            }).then(function(result) {
                // Redirection vers une page
                window.location = "formations.php";
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
