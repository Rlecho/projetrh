<?php
  session_start();
  require_once("connexiondb.php");
  $login=$_POST['email'];
  $mt=$_POST['motdepasse'];


 
  $requete="select *from employes where email='$login' and motdepasse='$mt'";
  $resultat=$pdo->query($requete);
  
  $requete2="select *from rh where email='$login' and motdepasse='$mt'";
  $resultat2=$pdo->query($requete2);
  
  if ($user=$resultat->fetch()){
      if ($user['etat']==1){
          $_SESSION['user']=$user;
          header('location:profilEmployes.php');
      }
      else{
          $_SESSION['erreurLogin']="<strong>Erreur!! </strong>votre compte est désactivé.<br> Veuillez contacter l'administrateur.";
          header('location:connexion.php');
      }
  }
   else if ($user=$resultat2->fetch()){
          $_SESSION['user']=$user;
          header('location:profilRH.php');
      }
  else {
      $_SESSION['erreurLogin']="<strong>Erreur!! </strong> Login ou mot de passe incorrecte ! ";
          header('location:connexion.php');
  }
  

// Vérification si la case "Souvenez-vous de moi" a été cochée
if(isset($_POST['remember_me'])) {
    // Si la case est cochée, vous pouvez exécuter ici le code nécessaire
    // pour mémoriser l'utilisateur, par exemple en créant un cookie ou en
    // enregistrant une session.
    // Exemple de création d'un cookie (à adapter selon vos besoins) :
    setcookie('user_remembered', 'true', time() + (86400 * 30), '/'); // Cookie valide pendant 30 jours
} else {
    // Si la case n'est pas cochée, vous pouvez exécuter ici le code
    // pour annuler toute action de mémorisation de l'utilisateur.
}

?>