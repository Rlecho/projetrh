<?php 
  require_once("identifier.php");
  require_once("connexiondb.php");
  $id= $_POST['id_employe']; 
  
  $pays =  $_POST['pays'];
  $ville =  $_POST['ville'];
  $quartier =  $_POST['quartier'];
  $facebook_nom =  $_POST['facebook_nom'];
  $facebook_lien =  $_POST['facebook_lien'];
  $instagram_nom =  $_POST['instagram_nom'];
  $instagram_lien =  $_POST['instagram_lien'];
  $twitter_nom =  $_POST['twitter_nom'];
  $twitter_lien =  $_POST['twitter_lien'];
  $linkedin_nom =  $_POST['linkedin_nom'];
  $linkedin_lien =  $_POST['linkedin_lien'];
 
  // $requete="update employes set email=?,dateNaissance=?,nom=?,departement=?,poste=?,telephone=?,motdepasse=? where idemp=?";
  // $params=array($email,$date,$nom,$departement,$poste,$telephone,$mt,$id);
  
  $requete="update coordonnees set pays=?,ville=?,quartier=?,facebook_nom=?,facebook_lien=?,twitter_nom=?,twitter_lien=?,linkedin_nom=?,linkedin_lien=?,instagram_nom=?,instagram_lien=?  where idemp=?";
  $params=array($pays,$ville,$quartier,$facebook_nom,$facebook_lien,$twitter_nom,$twitter_lien,$linkedin_nom,$linkedin_lien,$instagram_nom,$instagram_lien,$id);
  $resultat=$pdo->prepare($requete);
  $resultat->execute($params);

?>

 <html>
     <body>
     
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
          icon: "success",
          title: "Bon travail !",
          text: "Vos informations seront modifiés après la déconnexion!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
         }). then(function(result){
            window.location = "profilEmployes.php";
             })
         </script>     

     </body></html>