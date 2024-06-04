<?php
require_once("identifier.php");
require_once("connexiondb.php");
// Récupération des données des fichiers depuis la base de données
$query = "SELECT * FROM document";
// Vérifie si une recherche a été effectuée
if(isset($_GET['searchdocs']) && !empty($_GET['searchdocs'])) {
    // Filtrer les résultats en fonction de la recherche sur le type de congé
    $search = $_GET['searchdocs'];
    $query .= " WHERE file_name LIKE '%$search%'";
}
$stmt = $pdo->query($query);
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Définir le nombre d'éléments à afficher par page
$perPage = 16;

// Récupérer le numéro de page actuel à partir de la requête GET
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculer l'offset pour la requête SQL en fonction du numéro de page
$offset = ($current_page - 1) * $perPage;

// Requête SQL pour récupérer les documents pour la page actuelle
$query = "SELECT * FROM document LIMIT $perPage OFFSET $offset";
$stmt = $pdo->query($query);
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Requête SQL pour compter le nombre total de documents
$queryTotal = "SELECT COUNT(*) AS total_documents FROM document";
$stmtTotal = $pdo->query($queryTotal);
$totalDocuments = $stmtTotal->fetch(PDO::FETCH_ASSOC)['total_documents'];

// Calculer le nombre total de pages nécessaires
$totalPages = ceil($totalDocuments / $perPage);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">   
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
</head> 
<body class="app">   	
<?php include('header.php');?>
  <br>
    <div class="app-wrapper">  
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Mes Docs</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								<form  class="docs-search-form row gx-1 align-items-center">
									<div class="col-auto">
										<input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
									</div>
									<div class="col-auto">
										<button type="submit" class="btn app-btn-secondary">Rechercher</button>
									</div>
								</form>
							    </div><!--//col-->					    
								<div class="col-auto">
								<select id="select-file-type" class="form-select w-auto">
									<option value="all">Tous</option>
									<option value="plain">Fichier Texte</option>
									<option value="image">Images</option>
									<option value="word">Word</option>
									<option value="vnd.openxmlformats-officedocument.spreadsheetml.sheet">Excel</option>
									<option value="pdf">PDF</option>
									<option value="zip">Fichier Zip</option>
									<!-- <option value="autres">Autres</option> -->
								</select>
							    </div>					
							<div class="col-auto">
							    <form action="upload.php" method="post"class="d-flex" enctype="multipart/form-data">
									<div class="col-auto m-1">
										<label for="file-upload" class="btn app-btn-primary">
											<svg width="1em" height="1em" class="fas fa-upload"></svg> Upload File
										</label>
										<input id="file-upload" type="file" name="file" style="display: none;">
									</div>
									<div class="col-auto d-flex">
										<button type="submit" class="btn app-btn-primary mt-1" style="height: .9cm;">Submit</button>
									</div>
								</form>
							</div>
							<div id="file-selected-message" class='bg-danger'></div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
 <!-- j'ai un dossier qui contient l'image des icones des autre types d'extensions (pdf,word,exel,zip,vidéo.... -->    
				<div class="row g-6 d-flex flex-wrap" id="fileListContainer">
				<?php foreach ($files as $file) : ?>
				<?php if ($file['idemp']==$_SESSION['user']['idemp']){?>

					<div class="col-3 col-md-4 col-xl-3 col-xxl-2 " data-file-type="<?php echo $file['file_type']; ?>">
						<div class="app-card app-card-doc shadow-sm h-100">
						<div class="app-card-thumb-holder p-3" style="height: 100px;"> <!-- Définissez la hauteur souhaitée ici -->
						<?php if (strpos($file['file_type'], 'image') !== false) : ?>
							<img src="<?php echo $file['cover_image_path']; ?>" alt="File Cover" class="file-cover img-fluid" style="height: 100%;">
						<?php else : ?>
							<span class="icon-holder d-flex justify-content-center align-items-center">
								<i class="fas fa-file-alt text-file"></i>
							</span>
						<?php endif; ?>
            <!-- <span class="badge bg-success">NEW</span> -->
            <a class="app-card-link-mask" href="#file-link"></a>
        </div>
        <div class="app-card-body p-3 has-card-actions">
            <h4 class="app-doc-title truncate mb-0"><a href="#file-link"><?php echo $file['filed']; ?></a></h4>
            <div class="app-doc-meta">
                <ul class="list-unstyled mb-0">
                    <li><span class="text-muted">Type:</span> <?php echo $file['file_type']; ?></li>
                    <li><span class="text-muted">Taille:</span> <?php echo $file['file_size']; ?></li>
                    <li><span class="text-muted">Enregistré le:</span> <?php echo $file['uploaded_at']; ?></li>
                </ul>
            </div><!--//app-doc-meta-->
            <div class="app-card-actions">
			<div class="dropdown">
    <div class="dropdown-toggle no-toggle-arrow" data-toggle="dropdown" aria-expanded="false">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
        </svg>
    </div><!--//dropdown-toggle-->
    <div class="dropdown-menu dropdown-menu-right">
        <!-- <a onclick="return confirm('Etes vous sûr de vouloir visualiser ce fichier')" href="visualiserfichier.php?id=<?php echo $file['id'] ?>" class="dropdown-item"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
	  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
	</svg>View</a> -->
	<a onclick="return confirm('Êtes-vous sûr de vouloir télécharger ce fichier ?')" href="telechargerfichier.php?file_name=<?php echo $file['file_name']; ?>" class="dropdown-item">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
        <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
    </svg>
    Download
</a>
        <hr class="dropdown-divider">
        <a onclick="return confirm('Etes vous sûr de vouloir supprimer ce fichier')" href="supprimerfichier.php?id=<?php echo $file['id'] ?>" class="dropdown-item"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
	</svg>Delete</a>
    </div>
</div>
            </div><!--//app-card-actions-->
			</div>
       					 </div><!--//app-card-body-->
    </div><!--//app-card-->
	<?php } ?>
<?php endforeach; ?>			   
			    </div><!--//row-->
			    <!-- Afficher la pagination -->
    <nav class="app-pagination mt-5">
        <ul class="pagination justify-content-center">
            <?php if ($current_page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($current_page < $totalPages) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->    					
	<script src="assets/plugins/popper.min.js"></script>
    <!-- <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>   -->
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 
	<script>
document.addEventListener('DOMContentLoaded', function() {
  var fileInput = document.getElementById('file-upload');
  fileInput.addEventListener('change', function() {
    var selectedFile = fileInput.files[0];
    var messageContainer = document.getElementById('file-selected-message');
    if (selectedFile) {
      messageContainer.textContent = 'Le fichier "' + selectedFile.name + '" est sélectionné. Cliquez sur "Envoyer" pour soumettre.';
    } else {
      messageContainer.textContent = 'Aucun fichier sélectionné.';
    }
  });
});
document.addEventListener('DOMContentLoaded', function() {
    var selectFileType = document.getElementById('select-file-type');
    selectFileType.addEventListener('change', function() {
        var selectedType = selectFileType.value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'filter_files.php?type=' + selectedType, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Mettre à jour la liste des fichiers avec la réponse du serveur
                var fileListContainer = document.getElementById('fileListContainer');
                fileListContainer.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
});
</script>
</body>
<!-- Mirrored from themes.3rdwavemedia.com/demo/portal/docs.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Aug 2021 13:45:52 GMT -->
</html> 
