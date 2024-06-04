<?php 
$idEmp = isset($_GET['idemp']) ? $_GET['idemp'] : 0;
?>


<div class="col-md-12">
            <div class="nav-link-wrapper">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="modifieremployes.php?idemp=<?php echo $idEmp; ?>">Détails personnels</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="coordoRh.php?idemp=<?php echo $idEmp; ?>">Coordonnées</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="situa_profRh.php?idemp=<?php echo $idEmp; ?>">Situation professionnelle</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="info_bancaireRh.php?idemp=<?php echo $idEmp; ?>">Informations bancaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="langueRh.php?idemp=<?php echo $idEmp; ?>">Langues</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="diplomeRh.php?idemp=<?php echo $idEmp; ?>">Diplômes</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="formationRh.php?idemp=<?php echo $idEmp; ?>">Formations</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-sm app-btn-secondary mx-1"  style="text-decoration: none;" href="congesRhEp.php?idemp=<?php echo $idEmp; ?>">Congés et absences</a>
                    </li>
                    <li class="nav-item" style="margin-top: .4cm;">
                        <a class="btn-sm app-btn-secondary mx-1" style="text-decoration: none;" href="carierreRh.php?idemp=<?php echo $idEmp; ?>">Carrière</a>
                    </li>
                </ul>
            </div>
                    </div>