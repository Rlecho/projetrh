<?php
require_once("connexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $id= $_POST['id']; 
    $diplome_obtenu = $_POST['diplome_obtenu'];
    $etablissement = $_POST['etablissement'];
    $ville = $_POST['ville'];
    $annee = $_POST['annee'];
    $niveau = $_POST['niveau'];
    $plus_eleve = $_POST['plus_eleve'];

    try {
        // Requête SQL pour insérer le diplôme dans la table diplome
        $sql = "INSERT INTO diplome (idemp, diplome_obtenu, etablissement, ville, annee, niveau, plus_eleve)
                VALUES (:idemp, :diplome_obtenu, :etablissement, :ville, :annee, :niveau, :plus_eleve)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idemp', $id);
        $stmt->bindParam(':diplome_obtenu', $diplome_obtenu);
        $stmt->bindParam(':etablissement', $etablissement);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':annee', $annee);
        $stmt->bindParam(':niveau', $niveau);
        $stmt->bindParam(':plus_eleve', $plus_eleve);
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
                text: "Le diplôme a été ajouté avec succès!",
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
