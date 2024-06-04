<?php
require_once("connexiondb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    $token = $_POST["token"];

    // Vérification de la correspondance des mots de passe
    if ($new_password === $confirm_password) {
        // Mise à jour du mot de passe dans la base de données
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql_update_password = "UPDATE employes SET motdepasse = :password, token = NULL WHERE token = :token";
        $stmt_update_password = $pdo->prepare($sql_update_password);
        $stmt_update_password->bindParam(':password', $hashed_password);
        $stmt_update_password->bindParam(':token', $token);
        $stmt_update_password->execute();

        header("Location: login.php");
        exit();
    } else {
        echo "
            Les mots de passe ne correspondent pas.
        ";
    }
}