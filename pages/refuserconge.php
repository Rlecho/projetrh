<?php
   session_start();
  if (isset($_SESSION['user'])){
  require_once("connexiondb.php");
    if (isset($_GET['idemp']))
        
        $id = $_GET['idemp'];
    
    else
        
        $id = "";

   $requete2="delete from congesdemandes where idemp=$id";
   $resultat2=$pdo->prepare($requete2);
   $resultat2->execute();

   $sql_email = "SELECT email,nom FROM employes WHERE idemp = ?";
   $stmt_email = $pdo->prepare($sql_email);
   $stmt_email->execute([$id]);
   $user = $stmt_email->fetch(PDO::FETCH_ASSOC);
   $user_email = $user['email'];


    // Envoyer un e-mail à l'employé
    $to = $user_email['email'];
    $subject = 'Nouvelle réunion';
    $message = "Bonjour " . $user_email['nom'] . ",\n\n";
    $message .= "Votre demande a été refusé  \n\n";
    $message .= "Cordialement,\nVotre entreprise";
    $headers = 'From: votreentreprise@example.com' . "\r\n" .
        'Reply-To: votreentreprise@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

   }
?>
<html>
     <body>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
          icon: "success",
          title: "bon travail !",
          text: "Le congé a été supprimé avec succès !",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
         }). then(function(result){
            window.location = "congesdemandes.php";
             })
         </script>     
     </body></html>