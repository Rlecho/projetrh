<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Succès</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <script>
        swal({
            icon: "success",
            title: "Lien envoyé avec succès",
            text: "Un lien de réinitialisation de mot de passe a été envoyé à votre adresse e-mail.",
            showConfirmButton: true,
            confirmButtonText: "Fermer",
            closeOnConfirm: false
        }).then(function(result){
            window.location = "reset-process.php";
        });
    </script>
</body>
</html>
