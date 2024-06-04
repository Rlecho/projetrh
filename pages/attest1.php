<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Autorisation de congé</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    /* styles.css */

/* Modifier les styles de base du formulaire */
.leave-permit form {
  margin-top: 50px; /* Espacement du haut */
}

.leave-permit h2 {
  text-align: center; /* Centrer le titre */
  margin-bottom: 30px; /* Espacement du bas */
}

.leave-permit label {
  font-weight: bold; /* Texte en gras */
}

.leave-permit input[type="text"],
.leave-permit textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.leave-permit button[type="submit"] {
  background-color: #007bff; /* Couleur du bouton */
  color: #fff; /* Couleur du texte */
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.leave-permit button[type="submit"]:hover {
  background-color: #0056b3; /* Couleur du bouton au survol */
}

  </style>
</head>
<body>
  <div class="container">
    <div class="leave-permit">
      <h2>Autorisation de congé</h2>
      <form method="post" action="attest.php" enctype="multipart/form-data" >
        <label for="date">Date de délivrance :</label>
        <input type="text" id="date" name="date_de_délivrance" required>
        
        <label for="nom">Nom du responsable RH :</label>
        <input type="text" id="nom" name="nomResponsableRH" required>
        
        <label for="titre">Titre du responsable RH :</label>
        <input type="text" id="titre" name="titre_responsable_RH" required>
        
        <label for="universite">Nom de l'Université :</label>
        <input type="text" id="universite" name="nomUniversite" required>
        
        <label for="employe">Nom et prénom de l'employé :</label>
        <input type="text" id="employe" name="nomEmploye" required>
        
        <label for="conge">Type de congé demandé :</label>
        <input type="text" id="conge" name="typeConge" required>
        
        <label for="dates">Dates de début et de fin du congé :</label>
        <input type="text" id="dates" name="datesConge" required>
        
        <label for="justification">Justification du congé :</label>
        <textarea id="justification" name="justificationConge"></textarea>
        
        <label for="lieu">Lieu de délivrance :</label>
        <input type="text" id="lieu" name="lieuDelivrance" required>
        
        <label for="date-delivrance">Date de délivrance :</label>
        <input type="text" id="date-delivrance" name="date_de_délivrance" required>

        <label for="signature">Signature :</label>
        <input type="file" id="signature" name="signature" accept="image/png, image/jpeg, image/gif">
        
        <button type="submit">Valider</button>
      </form>
    </div>
  </div>
</body>
</html>
