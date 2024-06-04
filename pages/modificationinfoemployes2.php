<?php 
  require_once("identifier.php");
  require_once("connexiondb.php");
  $id=$_POST['id_employe']; 
  $num_cip = $_POST['num_cip'];
  $num_ifu = $_POST['num_ifu'];
  $lieu_naissance = $_POST['lieu_naissance'];
  $genre = $_POST['genre'];
  $situation_familiale = $_POST['situation_familiale'];
  $nationalite = $_POST['nationalite'];
 
  // $requete="update employes set email=?,dateNaissance=?,nom=?,departement=?,poste=?,telephone=?,motdepasse=? where idemp=?";
  // $params=array($email,$date,$nom,$departement,$poste,$telephone,$mt,$id);
  
  $requete="update details_perso set num_cip=?,num_ifu=?,lieu_naissance=?,genre=?,situation_familiale=?,nationalite=? where id_employes=?";
  $params=array($num_cip,$num_ifu,$lieu_naissance,$genre,$situation_familiale,$nationalite,$id);
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
            window.location = "coordo.php";
             })
         </script>     

     </body></html>