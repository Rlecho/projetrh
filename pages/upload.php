<?php
require_once("identifier.php");
require_once("connexiondb.php");

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du fichier
    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];
    $fileType = $_FILES["file"]["type"];
    $idemp=$_SESSION['user']['idemp'];

    // Récupération de l'extension du fichier
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Définition du dossier de destination pour le fichier
    $uploadDirectory = "uploads/";

    // Génération d'un nom unique pour le fichier pour éviter les conflits
    $uniqueFileName = uniqid("", true) . '.' . $fileExtension;

    // Chemin complet du fichier sur le serveur
    $fileDestination = $uploadDirectory . $uniqueFileName;

    // Déplacement du fichier téléchargé vers le dossier de destination
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        // Détection du type MIME du fichier
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $fileDestination);

        // Définition de l'image de couverture en fonction du type MIME
        $coverImagePath = '';
        if (strpos($mimeType, 'image') !== false) {
            // Si c'est une image, utiliser l'image elle-même comme couverture
            $coverImagePath = $fileDestination;
        } else {
            // Sinon, utiliser une icône correspondant au type de fichier
            switch ($fileExtension) {
                case 'pdf':
                    $coverImagePath = 'icons/pdf-icon.png';
                    break;
                case 'txt':
                    $coverImagePath = 'icons/txt-icon.png';
                    break;
                case 'doc':
                case 'docx':
                    $coverImagePath = 'icons/word-icon.png';
                    break;
                case 'xls':
                case 'xlsx':
                    $coverImagePath = 'icons/excel-icon.png';
                    break;
                case 'zip':
                case 'rar':
                    $coverImagePath = 'icons/zip-icon.png';
                    break;
                // Ajoutez des cas pour d'autres extensions si nécessaire
                default:
                    $coverImagePath = 'icons/autres-icon.png';
                    break;
            }
        }

        // Insertion des données du fichier dans la base de données
        $sql = "INSERT INTO document (filed,file_name, file_size, file_type, cover_image_path, uploaded_at, idemp) 
                VALUES (:file_name,:uniqueFileName, :fileSize, :fileType, :coverImagePath, NOW(), :idemp)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':file_name', $fileName);
        $stmt->bindParam(':uniqueFileName', $uniqueFileName);
        $stmt->bindParam(':fileSize', $fileSize);
        $stmt->bindParam(':fileType', $fileType);
        $stmt->bindParam(':coverImagePath', $coverImagePath);
        $stmt->bindParam(':idemp', $idemp);
        $stmt->execute();

        // Afficher un message de succès avec SweetAlert
        echo '
            <html>
            <body>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
            swal({
                icon: "success",
                title: "Le fichier a été téléchargé avec succès !",
                text: "Il a été enregistré dans la base de données.",
                showConfirmButton: true,
                confirmButtonText: "Fermer",
                closeOnConfirm: false
            }).then(function(result){
                window.location = "documentEmployees.php";
            });
            </script>
            </body>
            </html>
        ';
    } else {
        // Afficher un message d'erreur avec SweetAlert en cas d'échec de téléchargement
        echo '
            <html>
            <body>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
            swal({
                icon: "error",
                title: "Une erreur s\'est produite !",
                text: "Une erreur s\'est produite lors du téléchargement du fichier.",
                showConfirmButton: true,
                confirmButtonText: "Fermer",
                closeOnConfirm: false
            }).then(function(result){
                window.location = "documentEmployees.php";
            });
            </script>
            </body>
            </html>
        ';
    }
}

?>
