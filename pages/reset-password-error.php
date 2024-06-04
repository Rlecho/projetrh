<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Erreur</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <script>
        swal({
            icon: "error",
            title: "Une erreur s'est produite !",
            text: "Une erreur s'est produite lors de l'envoi du lien de réinitialisation. Veuillez réessayer plus tard.",
            showConfirmButton: true,
            confirmButtonText: "Fermer",
            closeOnConfirm: false
        }).then(function(result){
            window.location = "reset-process.php";
        });
    </script>
</body>
</html>
