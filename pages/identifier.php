<!-- <?php
  session_start();
  if (!isset($_SESSION['user']))
     header('location:connexion.php');
?> -->

<?php

function regenerate_session_id() {
    // Si une session est déjà active, fermez-la
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_write_close();
    }

    // Régénérez l'ID de session
    session_regenerate_id(true);

    // Redémarrez la session avec le nouvel ID de session
    session_start();
}

// Vérifiez si une session est déjà active
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('location:connexion.php');
    exit; // Assurez-vous de terminer le script après une redirection
}

?>