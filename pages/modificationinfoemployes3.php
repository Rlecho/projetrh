<?php 
  require_once("identifier.php");
  require_once("connexiondb.php");
  $id=$_POST['id']; 
   $departement=$_POST['dep'];
   $poste=$_POST['poste'];
 
  // $requete="update employes set email=?,dateNaissance=?,nom=?,departement=?,poste=?,telephone=?,motdepasse=? where idemp=?";
  // $params=array($email,$date,$nom,$departement,$poste,$telephone,$mt,$id);
  
  $requete="update employes set departement=?,poste=? where idemp=?";
  $params=array($departement,$poste,$id);
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
            window.location = "situa_prof.php";
             })
         </script>     

     </body></html>