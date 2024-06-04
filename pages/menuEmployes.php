<?php
 require_once("identifier.php");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Espace Employes</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-WoBcU4joqZtL9/lhJKvO6Lzfr9KEFVFG47BL2EG/zc1O6cJG+oz+cuNcr7irzl0ErR7dnuQh2LlwKMkLwjqCHw==" crossorigin="anonymous" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding-top: 50px; /* Pour éviter de masquer le contenu par le haut */
            background-color: #333; /* Couleur du fond du sidebar */
            color: #fff; /* Couleur du texte */
        }

        .sidebar-item {
            padding: 10px 20px;
            border-bottom: 1px solid #555; /* Ligne de séparation entre les éléments */
        }

        .sidebar-item a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar-item:hover {
            background-color: #555; /* Couleur de fond au survol */
        }

        .content {
            margin-left: 250px; /* Marge pour laisser de la place au sidebar */
            padding: 20px;
        }
    </style>

</head>
<body>

<nav class="sidebar">
    <div class="sidebar-item">
        <a href="profilEmployes.php">Profil</a>
    </div>

    <div class="sidebar-item">
    <a href="demandeconges.php">Demande Congé</a>
    </div>

    <div class="sidebar-item">
    <a href="mesconges.php">Consulter mes Congés</a>
    </div>
  




    <div class="sidebar-item">
        <a href="annoncementsEmployes.php">Annoncements</a>
    </div>
    <div class="sidebar-item">
        <a href="deconnecter.php">Se déconnecter</a>
    </div>
</nav>

<div class="content">
    <!-- Le contenu principal de la page va ici -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>

