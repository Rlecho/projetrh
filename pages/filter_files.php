<?php
require_once("connexiondb.php");

if(isset($_GET['type']) && !empty($_GET['type'])) {
    $selectedType = $_GET['type'];
    
    // Si l'option "Tous" ou "Autres" est sélectionnée, récupérer tous les fichiers sans filtre
    if ($selectedType === "all" || $selectedType === "autres") {
        $query = "SELECT * FROM document";
    } else {
        // Sinon, construire la requête SQL pour récupérer les fichiers du type sélectionné
        $query = "SELECT * FROM document WHERE file_type LIKE '%$selectedType%'";
    }
} else {
    // Si aucun type sélectionné, récupérer tous les fichiers sans filtre
    $query = "SELECT * FROM document";
}
$stmt = $pdo->query($query);
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Générer le code HTML de la liste mise à jour des fichiers
foreach ($files as $file) {
    // Générer le code HTML pour chaque fichier ici
    echo "<div class='col-3 col-md-4 col-xl-3 col-xxl-2' data-file-type='{$file['file_type']}'>";
    echo "<div class='app-card app-card-doc shadow-sm h-100'>";
    echo "<div class='app-card-thumb-holder p-3' style='height: 100px;'>";
    if (strpos($file['file_type'], 'image') !== false) {
        echo "<img src='{$file['cover_image_path']}' alt='File Cover' class='file-cover img-fluid' style='height: 100%;'>";
    } else {
        echo "<span class='icon-holder d-flex justify-content-center align-items-center'><i class='fas fa-file-alt text-file'></i></span>";
    }
    echo "<a class='app-card-link-mask' href='#file-link'></a>";
    echo "</div>";
    echo "<div class='app-card-body p-3 has-card-actions'>";
    echo "<h4 class='app-doc-title truncate mb-0'><a href='#file-link'>{$file['file_name']}</a></h4>";
    echo "<div class='app-doc-meta'>";
    echo "<ul class='list-unstyled mb-0'>";
    echo "<li><span class='text-muted'>Type:</span> {$file['file_type']}</li>";
    echo "<li><span class='text-muted'>Taille:</span> {$file['file_size']}</li>";
    echo "<li><span class='text-muted'>Enregistré le:</span> {$file['uploaded_at']}</li>";
    echo "</ul>";
    echo "</div>"; // Fermeture de app-doc-meta
    echo "<div class='app-card-actions'>";
    echo "<div class='dropdown'>";
    echo "<div class='dropdown-toggle no-toggle-arrow' data-toggle='dropdown' aria-expanded='false'>";
    echo "<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-three-dots-vertical' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>";
    echo "<path fill-rule='evenodd' d='M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z'/>";
    echo "</svg>";
    echo "</div>"; // Fermeture de dropdown-toggle
    echo "<ul class='dropdown-menu dropdown-menu-right'>";
    echo "<li><a class='dropdown-item' data-action='view' data-file-id='{$file['id']}' href='#'><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-eye mr-2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>";
    echo "<path fill-rule='evenodd' d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z'/>";
    echo "<path fill-rule='evenodd' d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>";
    echo "</svg>View</a></li>";
    echo "<li><a class='dropdown-item' data-action='download' data-file-id='{$file['id']}' href='#'><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-download mr-2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>";
    echo "<path fill-rule='evenodd' d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>";
    echo "<path fill-rule='evenodd' d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>";
    echo "</svg>Download</a></li>";
    echo "<li><hr class='dropdown-divider'></li>";
    echo "<li><a class='dropdown-item' data-action='delete' data-file-id='{$file['id']}' href='#'><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash mr-2' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>";
    echo "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>";
    echo "<path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>";
    echo "</svg>Delete</a></li>";
    echo "</ul>";
    echo "</div>"; // Fermeture de dropdown
    echo "</div>"; // Fermeture de app-card-actions
    echo "</div>"; // Fermeture de app-card-body
    echo "</div>"; // Fermeture de app-card
    echo "</div>"; // Fermeture de col
}
?>
