<?php
require_once("connexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Vérification de l'existence de l'utilisateur avec cet e-mail
    $sql_check_user = "SELECT * FROM employes WHERE email = :email";
    $stmt_check_user = $pdo->prepare($sql_check_user);
    $stmt_check_user->bindParam(':email', $email);
    $stmt_check_user->execute();
    $user = $stmt_check_user->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(16));
        $reset_link = "http://localhost/projetRh/pages/reset.php?token=$token";

        $subject = 'Réinitialisation de mot de passe';
        $message = "Bonjour,<br><br>Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien suivant :<br>$reset_link<br><br>Cordialement,<br>Votre site";

        $headers = "From: elechosergetest@gmail.com\r\n";
        $headers .= "Reply-To: elechosergetest@gmail.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        if (mail($email, $subject, $message, $headers)) {
            // Stocker le token dans la base de données avec l'e-mail associé pour la vérification ultérieure
            $sql_store_token = "UPDATE employes SET token = :token WHERE email = :email";
            $stmt_store_token = $pdo->prepare($sql_store_token);
            $stmt_store_token->bindParam(':token', $token);
            $stmt_store_token->bindParam(':email', $email);
            $stmt_store_token->execute();

            header("Location: reset-password-success.php");
            exit();
        } else {
            header("Location: reset-password-error.php");
            exit();
        }
    } else {
        echo "Utilisateur introuvable.";
    }
}
?>
