<?php
// Inclure la bibliothèque Dompdf
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nomEmploye = $_POST['nomEmploye'];
    $typeConge = $_POST['typeConge'];
    $datesConge = $_POST['datesConge'];
    $justificationConge = $_POST['justificationConge'];
    $lieuDelivrance = $_POST['lieuDelivrance'];
    $nomUniversite = $_POST['nomUniversite'];
    $nomResponsableRH = $_POST['nomResponsableRH'];
    $titreRH = $_POST['titre_responsable_RH'];
    
    // Récupérer le fichier de signature envoyé
    $signature = $_FILES['signature'];
    
    // Vérifier si un fichier a été envoyé
    if ($signature['error'] === UPLOAD_ERR_OK) {
        // Chemin de destination pour enregistrer l'image de signature
        $destination = "signatures/";
        // Récupérer le nom original du fichier de signature
        $nomFichier = basename($_FILES['signature']['name']);
        // Déplacer le fichier vers le dossier de destination
        if (move_uploaded_file($signature['tmp_name'], $destination . $nomFichier)) {
          // Générer le contenu HTML avec les valeurs récupérées du formulaire et le chemin de l'image de signature
          $htmlContent = '<!DOCTYPE html>
          <html lang="fr">
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Autorisation de congé</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="styles.css">
            <style>
              /* styles.css */
          body {
            font-family: "Roboto", sans-serif;
            background-color: #f5f5f5;
          }
          
          .container {
            max-width: 800px;
            margin: 0 auto;
          }
          
          .leave-permit {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }
          
          .leave-permit h2 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
          }
          
          .date, .recipient, .university {
            font-size: 16px;
            margin-bottom: 10px;
          }
          
          .signature img {
            width: 150px;
            margin-top: 20px;
          }
          
          .signature span {
            display: block;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
          }
          
            </style>
          </head>
          <body>
            <div class="container">
              <div class="leave-permit">
               <center> <h2>Autorisation de congé</h2> </center>
                <p class="date">Date : ' . date("Y-m-d") . '</p>
                <p class="recipient">À qui de droit,</p>
                <p>
                  Je soussigné(e), ' . $nomResponsableRH . ', agissant en qualité de 
                  ' . $titreRH . ' de l\'Université ' . $nomUniversite . ', 
                  accorde par la présente l\'autorisation de congé à :
                </p>
                <ol>
                  <li>' . $nomEmploye . '</li>
                  <li>' . $typeConge . '</li>
                  <li>' . $datesConge . '</li>
                  <li>' . $justificationConge . '</li>
                </ol>
                <p>Je soussigné(e),</p>
                <div class="signature">
                <img src="' . $destination . urlencode($nomFichier) . '" alt="Signature">

                  <span>' . $nomResponsableRH . '</span>
                </div>
                <p class="university">Université ' . $nomUniversite . '</p>
                <p>Fait à ' . $lieuDelivrance . ', le ' . date("Y-m-d") . '.</p>
              </div>
            </div>
          </body>
          </html>
          ';

          // Appeler la fonction pour générer le PDF
          generatePDF($htmlContent, "attestationtravail.pdf");
      } else {
          echo "Erreur lors du déplacement du fichier de signature.";
      }

    } else {
      // Gérer les erreurs d'envoi de fichier si nécessaire
  }
}

// Fonction pour générer le PDF à partir du contenu HTML
function generatePDF($htmlContent, $fileName) {
  // Créer une nouvelle instance de Dompdf
  $dompdf = new Dompdf();

  // Charger le contenu HTML dans Dompdf
  $dompdf->loadHtml($htmlContent);

  // Définir les options de rendu du PDF (par exemple, le format de page et l'orientation)
  $dompdf->setPaper('A4', 'portrait');

  // Rendre le PDF
  $dompdf->render();

  // Vérifier si le PDF est correctement rendu
  if (!$dompdf->output()) {
      echo "Erreur lors de la génération du PDF.";
      return;
  }

  // Définir le chemin de destination pour enregistrer le PDF
  $destination = "attests";
  $filePath = $destination . $fileName;

  // Enregistrer le PDF sur le serveur
  if (!file_put_contents($filePath, $dompdf->output())) {
      echo "Erreur lors de l'enregistrement du PDF.";
      return;
  }

  // Vérifier si le fichier PDF a été correctement enregistré
  if (!file_exists($filePath)) {
      echo "Erreur: Le fichier PDF n'a pas été correctement enregistré.";
      return;
  }

  // Télécharger le PDF
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="' . $fileName . '"');
  readfile($filePath);

  // Supprimer le fichier PDF après le téléchargement
  unlink($filePath);

  // Message de succès
  echo "Le fichier PDF a été généré et téléchargé avec succès.";
}
