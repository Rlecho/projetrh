<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La page d'accueil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  
  <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
  <style>
    /* Styles pour la couleur moutarde */
.moutarde-color {
  color: #DC560E; /* Couleur moutarde */
}

.bg-moutarde {
  background-color: #DC560E; /* Fond couleur moutarde */
}

/* Styles pour la barre de navigation */
.navbar {
  border-bottom: 2px  #DC560E; /* Bordure basse couleur moutarde */
}

.navbar-nav .nav-link {
  color: #DC560E; /* Couleur des liens */
}

.navbar-nav .nav-link:hover {
  color: #FFF; /* Couleur des liens au survol */
}

.navbar-toggler-icon {
  background-color: #DC560E; /* Couleur de l'icône du bouton de basculement */
}

/* Styles pour la section de la bannière */
.banner {
  padding: 100px 0; /* Espacement haut et bas */
}

.banner h1 {
  color: #DC560E; /* Couleur du titre */
}
h2 {
  color: #DC560E; /* Couleur du titre */
}

.banner p {
  color: #666; /* Couleur du texte */
}

.banner .btn-primary {
  background-color: #DC560E;; /* Couleur du bouton */
  border-color: #DC560E; /* Couleur de la bordure du bouton */
}

.banner .btn-primary:hover {
  background-color: #FF8C00; /* Couleur du bouton au survol */
  border-color: #FF8C00; /* Couleur de la bordure du bouton au survol */
}

/* Style pour la couleur de fond personnalisée */
.custom-bg-color {
  background-color: #333; /* Couleur de fond personnalisée (par exemple, noir) */
}
.bgo{
  background-color: #51b37e;
  border: solid 1px #fff;
  height: 1cm;
  color: #DC560E;
}
.bgo:hover{
  background-color: #DC560E;
}


 /* Définir l'animation de fondu entrant */
 @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  /* Appliquer l'animation à la classe de la section */
  .banner-content {
    animation: fadeIn 1.5s ease-in-out;
  }

  /* Style pour la section avec l'image de fond */
  .banners {
    background-image: url('../images/o.jpg');
    background-size: cover;
    background-position: center top;
    color: #fff; /* Couleur du texte sur l'image de fond */
    position: relative; /* Permet de positionner le contenu au-dessus de l'image */
    overflow: hidden; /* Empêche le contenu de déborder de la section */
  }

  /* Appliquer le flou à l'image de fond */
  .banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: inherit;
    background-size: cover;
    background-position: center;
    filter: blur(10px); /* Ajustez la valeur du flou selon vos préférences */
    z-index: -2; /* Place l'élément en arrière-plan */
  }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark custom-bg-color" >
  <div class="container">
    
  <div class="app-branding">
      <a class="app-logo" href="profilEmployes.php"><img class="logo-icon mr-2 " style="height:2.5cm;width: 3cm; margin-top:-21px" src="assets/images/logo1.png" alt="logo"></a>
  </div><!--//app-branding-->  
		
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a class="nav-link" href="accueil.php">Accueil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="candidature.php">Zone de candidature</a>
    </li>
  </ul>
</div>

<!-- Div pour Inscription -->
<div class="d-flex align-items-center btn app-btn bgo rounded mr-4">
  <a href="inscription.php" class="btn cc" style="color:white;" >Inscription</a>
</div>

<!-- Div pour Connexion -->
<div class="d-flex align-items-center bgo  rounded p-2">
  <a href="connexion.php" class="btn cc " style="color:white;" >Connexion</a>
</div>



  </div>
</nav>
<section class="banner banners " >
  <div class="container">
    <div class="row align-items-center">
      
    <div class="col-md-6">
    <div class="banner-content text-white bg-dark-opacity p-4 rounded">
        <h1>Bienvenue</h1>
        <p class="text-white" >
            Bienvenue, la plateforme qui facilite la mise en relation entre les talents les 
            plus brillants et les entreprises les plus innovantes. Découvrez un univers de possibilités 
            où chaque profil trouve sa place idéale et chaque entreprise son prochain talent exceptionnel.
            <br>
            Rejoignez dès aujourd'hui notre communauté dynamique et découvrez comment nous pouvons 
            transformer votre parcour professionnel. Inscivez-vous pour accéder à un univers de 
            possibilités sans limites.
        </p>
    </div>
</div>
    </div>
  </div>
</section>

<section class="banner py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="banner-content">
         <center><h1>Recrutement</h1></center> 
          <p>
            Bienvenue, votre plateforme de référence pour la mise en relation entre les talents, les entreprises et les opportunités professionnelles. 
            Nous vous offrons les meilleures solutions adaptées à vos besoins spécifiques.
          </p>
          <a href="candidature.php" class="btn app-btn-primary ok">Postuler</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="banner-image text-center">
          <img src="../images/l.jpg" alt="Candidat" class="img-fluid rounded">
        </div>
      </div>
    </div>
  </div>
</section>



<section class="features py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="feature text-center">
          <img src="../images/q.jpg" alt="Services" class="img-fluid mb-3">
          <h2>Nos Services</h2>
          <p>Nous offrons une gamme complète de services pour répondre à vos besoins en recrutement. 
            Notre approche personnalisée et notre expertise sectorielle nous permettent de fournir des solutions sur mesure pour chaque client.</p>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="feature text-center">
          <img src="../images/p.jpg" alt="Équipe" class="img-fluid mb-3">
          <h2>Notre Équipe</h2>
          <p>Nous sommes fiers de notre équipe de professionnels passionnés et expérimentés dans le domaine des ressources humaines. Nous sommes là pour vous aider à réaliser vos objectifs professionnels.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>
