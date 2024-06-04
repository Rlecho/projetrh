<?php

class EmployeeList
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getEmployees($size, $page, $nomE)
    {
        $offset = ($page - 1) * $size;

        $query = "SELECT * FROM employes WHERE nom LIKE :nomE LIMIT :size OFFSET :offset";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':nomE', "%$nomE%", PDO::PARAM_STR);
        $stmt->bindValue(':size', $size, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployeeCount($nomE)
    {
        $query = "SELECT COUNT(*) AS countE FROM employes WHERE nom LIKE :nomE";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':nomE', "%$nomE%", PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result['countE'];
    }

    public function renderEmployeesTable($employees, $nbpage, $nomE)
    {
        // Add your HTML rendering logic here
        ?>
        <!doctype html>
        <html lang="fr">
        <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="nada barir">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Employés</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Festive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   
    <link rel="stylesheet" href="chercherStyle.css">
      
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
      .lignecolor{
        background: white;
        text-align: center;
    }
      .tablecolor{
        background: #228B22;
        color: white;
        font-weight: bold;
        font-family:serif;
        padding: 12px 15px;
        text-align: center;
    }
      .tablecontent{
        border-radius: 10px 10px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
        width: 100%;
        height: 100%;
    }
    .pagination {
     display: inline-block;

     
     }

   .pagination a {
     color: green;
     background-color: white;
     float: left;
     margin-top: 20%;
     padding: 8px 16px;
     text-decoration: none;
     border-radius: 30px 30px 30px 30px;
}
.icon {
  color: #555; /* Couleur moins frappante */
  font-size: 18px; /* Taille de police */
  margin-right: 8px; /* Marge à droite pour l'espacement */
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
            <?php include('headerRh.php'); ?>
            <br>
            <div class="app-wrapper">
                <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="row d-flex justify-content-center mb-4">

        </div>
        <div class="row g-3 mb-4 mt-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Les employés</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center" method="get" action="employes.php">
					                    <div class="col-auto">
					                        <input type="text" id="nomE" name="nomE" class="form-control search-orders" placeholder="Search">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Search</button>
					                    </div>
					                </form>
							    </div><!--//col-->			
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div>

    <form method="get" action="modifieremployes.php">
    <div class="panel panel-primary margetop">
    <div class="panel-body">
        <table class="table app-table-hover mb-0 text-left">
        <thead >
         <tr>
            <th class="cell"></th>
            <th class="cell">Nom</th>
            <th class="cell">Poste</th>
            <th class="cell">Email</th>
            <th class="cell">Téléphone</th>
            <th class="cell">Actions</th>
            </tr>
        
        </thead>
                                <tbody>
                                    <?php foreach ($employees as $employe) { ?>
                                      <tr class="lignecolor">
                                        <td><img style="width:80px;height:80px;border-radius:500px;" src="../images/<?php echo $employe['photo'] ?>" /></td>
                                        <td><?php echo $employe['nom'] ?></td>
                                        <td><?php echo $employe['poste'] ?></td>
                                        <td><?php echo $employe['email'] ?></td>
                                        <td><?php echo $employe['telephone'] ?></td>
                                        <td>
                                            <a href="modifieremployes.php?idemp=<?php echo $employe['idemp'] ?>"><i class="material-icons  icon" style="color: yellowgreen;" data-toggle="tooltip" title="Modifier">&#xE254;</i></a>
                                            <a onclick="return confirm('Etes vous sûr de vouloir archiver l\'employé')" href="supprimeremployes.php?idemp=<?php echo $employe['idemp'] ?>"><i style="color: #CABD08;" class="material-icons  icon" data-toggle="tooltip" title="Supprimer">&#xE872;</i></a>
                                            <a href="activeremployes.php?idemp=<?php echo $employe['idemp'] ?>&etat=<?php echo $employe['etat'] ?>">
                                                <?php if ($employe['etat'] == 0) { ?>
                                                    <span class="material-icons icon" style="color:#228B22;">done</span>
                                                <?php } ?>
                                                <?php if ($employe['etat'] == 1) { ?>
                                                    <span class="material-icons  icon" style="color: red;">close</span>
                                                <?php } ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div>
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $nbpage; $i++) { ?>
                                        <li><a href="employes.php?page=<?php echo $i; ?>&nomE=<?php echo $nomE; ?>"><?php echo $i; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    }
}

require_once("identifier.php");
require_once("connexiondb.php");

$employeeList = new EmployeeList($pdo);
$size = isset($_GET['size']) ? $_GET['size'] : 6;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$nomE = isset($_GET['nomE']) ? $_GET['nomE'] : "";

$employees = $employeeList->getEmployees($size, $page, $nomE);
$employeeCount = $employeeList->getEmployeeCount($nomE);

$nbemployes = $employeeCount;
$reste = $nbemployes % $size;
$nbpage = ($reste === 0) ? $nbemployes / $size : floor($nbemployes / $size) + 1;

$employeeList->renderEmployeesTable($employees, $nbpage, $nomE);
