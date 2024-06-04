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
    <title>Demander un congé</title>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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

      .weekend {
        background-color: #f0f0f0; /* Gris clair pour les week-ends */
    }

    .jour-ferie {
        background-color: red; /* Gris clair pour les jours fériés */
        color: red; /* Gris clair pour les jours fériés */
    }
</style>
 <link href="navbar-top.css" rel="stylesheet"> 
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
  </head>
  <body>
     <?php include('head.php');?> 
<br>
     <h1>Demande d'absence</h1>
    <br>  
   <!-- <div class="container">
    <div class="myform">
        <form id="mainForm" class="form" method="post" action="ajouterconge.php">
            <div class="row">
                <div class="form-group col-12">
                    <label>Type</label>
                    <select id="typeSelect" name="type" class="form-control" style="height: 1.2cm;" onchange="afficherChamps(this.value)">
                        <option value="">Selectionnez</option>
                        <option value="Conge">Congé</option>
                        <option value="Absence">Absence</option>
                        <option value="Mise en disponibilité">Mise en disponibilité</option>
                    </select>
                </div>
            </div>

            <div class="champ champ-conge" id="congeForm" style="display: none;">
                <div class="row">
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début Congé :</label>
                        <input id="datecreation" type="date" name="datecreation" class="form-control" placeholder="Date de création" readonly value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début</label>
                        <input type="date" name="debutconge" class="form-control" required placeholder="Date de début" onchange="calculerDureeConge()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de fin</label>
                        <input type="date" name="finconge" class="form-control" required placeholder="Date de fin" onchange="calculerDureeConge()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Nombre de jours de congé</label>
                        <input type="text" id="nombrejoursconge" name="nombrejoursconge" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group col-12 mt-4">
                    <label for="motif">Details :</label>
                    <textarea id="motif" spellcheck="true" name="motifConge" class="form-control" rows="4" required></textarea>
                </div>
            </div>

            <div class="champ champ-absence" id="absenceForm" style="display: none;">
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début Congé :</label>
                        <input id="datecreation" type="hidden" name="datecreation" class="form-control" placeholder="Date de création" readonly value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début</label>
                        <input type="date" id="debutAbsence" name="debutAbsence" required class="form-control" placeholder="Date de début" onchange="calculerDureeAbsence()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de fin</label>
                        <input type="date" id="finAbsence" name="finAbsence" required class="form-control" placeholder="Date de fin" onchange="calculerDureeAbsence()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Nombre de jours d'absence</label>
                        <input type="text" id="nombreJoursAbsence" name="nombreJoursAbsence" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group col-12 mt-4">
                    <label for="motifAbsence">Détails :</label>
                    <textarea id="motifAbsence" spellcheck="true" name="motifAbsence" class="form-control" rows="4" required></textarea>
                </div>
                
            </div>

            <div class="champ champ-mise-dispo" id="miseDispoForm" style="display: none;">
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début Congé :</label>
                        <input id="datecreation" type="hidden" name="datecreation" class="form-control" placeholder="Date de création" readonly value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début</label>
                        <input type="date" name="debutMiseDispo" id="debutMiseDispo" required class="form-control" placeholder="Date de début" onchange="calculerDureeMiseDispo()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de fin</label>
                        <input type="date" name="finMiseDispo"  id="finMiseDispo" required class="form-control" placeholder="Date de fin" onchange="calculerDureeMiseDispo()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Nombre de mois de mise en disponibilité</label>
                        <input type="text" id="nombreMoisDispo" name="nombreMoisDispo" required class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group col-12 mt-4">
                    <label for="motif">Details :</label>
                    <textarea id="motif" spellcheck="true" name="motifMisedispo" class="form-control" required rows="4"></textarea>
                </div>
                
            </div>

            <div class="row">
                <div class="form-group col-6">
                    <input type="submit"  class="btn app-btn-primary mt-4" value="Enregistrer" >
                </div>
            </div>
        </form>
    </div> 
  </div>  -->



  <div class="container">
    <div class="myform">
        <!-- Formulaire pour le congé -->
        <form id="congeForm" class="form" method="post" action="ajouterconge.php">
            <div class="row">
                <div class="form-group col-12">
                    <label>Type:</label> <h5>Congé</h5>
                    <input type="hidden" name="type" value="Conge">
                </div>
            </div>
            <div class="row">
                <!-- Champs spécifiques au congé -->
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début Congé :</label>
                        <input id="datecreation" type="date" name="datecreation" class="form-control" placeholder="Date de création" readonly value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 mt-4">
                    <label>Date de début</label>
                    <input type="date" name="debutconge" class="form-control" required placeholder="Date de début" onchange="calculerDureeConge()">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 mt-4">
                    <label>Date de fin</label>
                    <input type="date" name="finconge" class="form-control" required placeholder="Date de fin" onchange="calculerDureeConge()">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 mt-4">
                    <label>Nombre de jours de congé</label>
                    <input type="text" id="nombrejoursconge" name="nombrejoursconge" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group col-12 mt-4">
                <label for="motif">Details :</label>
                <textarea id="motif" spellcheck="true" name="motifConge" class="form-control" rows="4" required></textarea>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <input type="submit" class="btn app-btn-primary mt-4" value="Enregistrer">
                </div>
            </div>
        </form>

        <!-- Formulaire pour l'absence -->
        <form id="absenceForm" class="form" method="post" action="ajouterconge.php">
            <div class="row">
                <div class="form-group col-12">
                    <label>Type: </label><h5>Abscence</h5>
                    <input type="hidden" name="type" value="Absence">
                </div>
            </div>
            <div class="row">
                <!-- Champs spécifiques à l'absence -->
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <input id="datecreation" type="hidden" name="datecreation" class="form-control" placeholder="Date de création" readonly value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début</label>
                        <input type="date" id="debutAbsence" name="debutAbsence" required class="form-control" placeholder="Date de début" onchange="calculerDureeAbsence()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de fin</label>
                        <input type="date" id="finAbsence" name="finAbsence" required class="form-control" placeholder="Date de fin" onchange="calculerDureeAbsence()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Nombre de jours d'absence</label>
                        <input type="text" id="nombreJoursAbsence" name="nombreJoursAbsence" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group col-12 mt-4">
                    <label for="motifAbsence">Détails :</label>
                    <textarea id="motifAbsence" spellcheck="true" name="motifAbsence" class="form-control" rows="4" required></textarea>
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <input type="submit" class="btn app-btn-primary mt-4" value="Enregistrer">
                </div>
            </div>
        </form>

        <!-- Formulaire pour la mise en disponibilité -->
        <form id="miseDispoForm" class="form" method="post" action="ajouterconge.php">
            <div class="row">
                <div class="form-group col-12">
                    <label>Type:</label><h5>Mise à disponibilité</h5>
                    <input type="hidden" name="type" value="Mise en disponibilité">
                </div>
            </div>
            <div class="row">
                <!-- Champs spécifiques à la mise en disponibilité -->
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début Congé :</label>
                        <input id="datecreation" type="hidden" name="datecreation" class="form-control" placeholder="Date de création" readonly value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de début</label>
                        <input type="date" name="debutMiseDispo" id="debutMiseDispo" required class="form-control" placeholder="Date de début" onchange="calculerDureeMiseDispo()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Date de fin</label>
                        <input type="date" name="finMiseDispo"  id="finMiseDispo" required class="form-control" placeholder="Date de fin" onchange="calculerDureeMiseDispo()">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 mt-4">
                        <label>Nombre de mois de mise en disponibilité</label>
                        <input type="text" id="nombreMoisDispo" name="nombreMoisDispo" required class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group col-12 mt-4">
                    <label for="motif">Details :</label>
                    <textarea id="motif" spellcheck="true" name="motifMisedispo" class="form-control" required rows="4"></textarea>
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <input type="submit" class="btn app-btn-primary mt-4" value="Enregistrer">
                </div>
            </div>
        </form>
    </div> 
</div>









  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script>

function afficherChamps(type) {
    document.getElementById('congeForm').style.display = 'none';
    document.getElementById('absenceForm').style.display = 'none';
    document.getElementById('miseDispoForm').style.display = 'none';

    if (type === 'Conge') {
        document.getElementById('congeForm').style.display = 'block';
    } else if (type === 'Absence') {
        document.getElementById('absenceForm').style.display = 'block';
    } else if (type === 'Mise en disponibilité') {
        document.getElementById('miseDispoForm').style.display = 'block';
    }
}

    function calculerDureeConge() {
        var debutConge = document.getElementsByName("debutconge")[0].value;
        var finConge = document.getElementsByName("finconge")[0].value;
        var nombreJours = calculerJoursOuvrables(debutConge, finConge);
        document.getElementById("nombrejoursconge").value = nombreJours;
    }
    function calculerDureeAbsence() {
    var debutAbsence = new Date(document.getElementById("debutAbsence").value);
    var finAbsence = new Date(document.getElementById("finAbsence").value);
    // Calcul de la durée totale en jours
    var differenceEnJours = Math.ceil((finAbsence - debutAbsence) / (1000 * 60 * 60 * 24));
    // Compteur de jours fériés et de weekends
    var joursNonTravailles = 0;
    // Boucle à travers chaque jour entre le début et la fin de l'absence
    for (var i = 0; i <= differenceEnJours; i++) {
        var currentDate = new Date(debutAbsence);
        currentDate.setDate(debutAbsence.getDate() + i);
        // Vérifier si le jour est un weekend (samedi ou dimanche)
        if (currentDate.getDay() === 0 || currentDate.getDay() === 6) {
            joursNonTravailles++;
        }
        // Vérifier si le jour est un jour férié
        if (estJourFerie(currentDate.toISOString().split("T")[0])) {
            joursNonTravailles++;
        }
    }
    // Calculer la durée d'absence en jours ouvrables
    var dureeAbsence = differenceEnJours - joursNonTravailles;
    // Afficher la durée d'absence
    document.getElementById("nombreJoursAbsence").value = dureeAbsence;
}
    function calculerDureeMiseDispo() {
    var debutMiseDispo = document.getElementById("debutMiseDispo").value;
    var finMiseDispo = document.getElementById("finMiseDispo").value;
    // Conversion des dates en objets de date
    var dateDebut = new Date(debutMiseDispo);
    var dateFin = new Date(finMiseDispo);
    // Calcul de la différence en mois
    var differenceEnMois = (dateFin.getFullYear() - dateDebut.getFullYear()) * 12 + (dateFin.getMonth() - dateDebut.getMonth());
    // Vérifier si la différence en mois dépasse 12
    if (differenceEnMois > 12) {
        alert("La mise à disposition ne peut pas dépasser 12 mois.");
        // Réinitialiser les champs de date et le champ de nombre de mois
        document.getElementById("debutMiseDispo").value = "";
        document.getElementById("finMiseDispo").value = "";
        document.getElementById("nombreMoisDispo").value = "";
        return;
    }
    // Affichage du nombre de mois
    document.getElementById("nombreMoisDispo").value = differenceEnMois + 1; // Ajoute 1 car le premier mois est inclus
}

    // Liste des jours fériés
    var joursFeries = [
        "2024-01-01", // Nouvel An
        "2024-01-10", // Fête du Vodoun
        "2024-04-10", // Vendredi Saint
        "2024-04-13", // Lundi de Pâques
        "2024-05-01", // Fête du Travail
        "2024-05-09", // Jour de l'Ascension
        "2024-05-20", // Pentecôte
        "2024-06-10", // Lundi de Pentecôte
        "2024-08-01", // Fête de l'Indépendance
        "2024-08-15", // Assomption de Marie
        "2024-10-29", // Maouloud (Fête du Prophète)
        "2024-11-01", // Toussaint
        "2024-12-25" // Noël
    ];
    // Fonction pour vérifier si une date est un jour férié
    function estJourFerie(date) {
        return joursFeries.includes(date);
    }
   
    // Fonction pour calculer le nombre de jours de congé
    function calculerNombreJoursConge() {
        var debutConge = document.getElementById("debutConge").value;
        var finConge = document.getElementById("finConge").value;
        var nombreJoursConge = calculerJoursOuvrables(debutConge, finConge);
        document.getElementById("nombreJoursConge").innerHTML = nombreJoursConge;
    }
     // Fonction pour calculer le nombre de jours ouvrables entre deux dates
     function calculerJoursOuvrables(debut, fin) {
        var joursOuvrables = 0;
        var currentDate = new Date(debut);
        var endDate = new Date(fin);
        while (currentDate <= endDate) {
            if (currentDate.getDay() !== 0 && currentDate.getDay() !== 6 && !estJourFerie(currentDate.toISOString().split("T")[0])) {
                joursOuvrables++;
            }
            currentDate.setDate(currentDate.getDate() + 1);
        }
        return joursOuvrables;
    }
   // Fonction pour mettre en surbrillance les jours fériés et les week-ends dans le calendrier
      // Fonction pour mettre en surbrillance les jours fériés et les week-ends dans le calendrier
      function mettreEnSurbrillance() {
        var calendarCells = document.querySelectorAll('.calendar-cell');
        calendarCells.forEach(function(cell) {
            var date = cell.dataset.date;
            var currentDate = new Date(date);
            if (currentDate.getDay() === 0 || currentDate.getDay() === 6) {
                cell.classList.add('weekend');
            }
            if (estJourFerie(date)) {
                cell.classList.add('jour-ferie');
            }
        });
    }
    // Exécuter la fonction mettreEnSurbrillance lorsque la page est chargée
    window.onload = mettreEnSurbrillance;

</script>
  </body>
</html>