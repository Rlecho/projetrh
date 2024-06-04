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
body {
  font-family: 'Roboto', sans-serif;
  background-color: #f5f5f5;
}

.container {
  max-width: 800px;
  margin: 0 auto;
}

.leave-permit {
  background-color: #fff;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.leave-permit h2 {
  color: #333;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.date, .recipient, .university {
  font-size: 16px;
  margin-bottom: 10px;
}

.signature img {
  width: 150px;
  margin-top: 20px;
}

.signature span {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-top: 10px;
}

  </style>
</head>
<body>
  <div class="container">
    <div class="leave-permit">
     <center> <h2>Autorisation de congé</h2> </center>
      <p class="date">Date : [Date de délivrance]</p>
      <p class="recipient">À qui de droit,</p>
      <p>
        Je soussigné(e), [Nom du responsable des ressources humaines], agissant en qualité de 
        [Titre du responsable des ressources humaines] de l'Université [Nom de l'Université], 
        accorde par la présente l'autorisation de congé à :
      </p>
      <ol>
        <li>[Nom et prénom de l'employé]</li>
        <li>[Type de congé demandé]</li>
        <li>[Dates de début et de fin du congé]</li>
        <li>[Justification du congé, le cas échéant]</li>
      </ol>
      <p>Je soussigné(e),</p>
      <div class="signature">
        <img src="signature.png" alt="Signature">
        <span>[Nom du responsable des ressources humaines]</span>
      </div>
      <p class="university">Université [Nom de l'Université]</p>
      <p>Fait à [Lieu de délivrance], le [Date de délivrance].</p>
    </div>
  </div>
</body>
</html>
