<?php
include("connect_db.php"); // Connexion à la base de données

// Vérifier si un terme de recherche a été passé
if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
    $searchTerm = "%" . $_GET['searchTerm'] . "%"; // Préparer le terme de recherche pour la requête

    // Préparer la requête pour rechercher dans plusieurs colonnes
    $sql = "SELECT * FROM produits WHERE 
            CAST(num_produit AS CHAR) LIKE ? OR 
            nom_produit LIKE ? OR 
            type_produit LIKE ? OR 
            CAST(prix_produit AS CHAR) LIKE ? OR 
            CAST(qty AS CHAR) LIKE ? OR 
            CAST(date AS CHAR) LIKE ?";

    $stmt = mysqli_prepare($conn, $sql); // Préparer la requête

    // Lier les paramètres à la requête
    mysqli_stmt_bind_param($stmt, 'ssssss', $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt); // Exécuter la requête et obtenir les résultats
} else {
    // Si aucun terme de recherche, récupérer tous les produits
    $sql = "SELECT * FROM produits";
    $result = mysqli_query($conn, $sql);
}

echo "<table id='productTable' class='table text-hover text-center mt-5'>
        <thead class='table-dark'>
            <tr>
                <th scope='col'>Num</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Type</th>
                <th scope='col'>Prix</th>
                <th scope='col'>Quantité</th>
                <th scope='col'>Date</th>
                <th scope='col'>Action</th>
            </tr>
        </thead>
        <tbody>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['num_produit']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom_produit']) . "</td>";
        echo "<td>" . htmlspecialchars($row['type_produit']) . "</td>";
        echo "<td>" . htmlspecialchars($row['prix_produit']) . "</td>";
        echo "<td>" . htmlspecialchars($row['qty']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "<td>
                <a href='#' onclick='loadModifierPage(" . $row['num_produit'] . ");' class='link-dark'>
                    <i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a>
                <a href='#' class='link-dark' onclick='openModal(" . $row['num_produit'] . ")'>
                    <i class='fa-solid fa-trash fs-5'></i></a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Aucun produit trouvé</td></tr>";
}


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css.map">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
    <link rel="stylesheet" href="css/bootstrap-grid.rtl.css">
    <link rel="stylesheet" href="css/bootstrap-grid.rtl.css.map">
    <link rel="stylesheet" href="css/bootstrap-grid.rtl.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.rtl.min.css.map">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css.map">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css.map">
    <link rel="stylesheet" href="css/bootstrap-reboot.rtl.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.rtl.css.map">
    <link rel="stylesheet" href="css/bootstrap-reboot.rtl.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.rtl.min.css.map">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css.map">
    <link rel="stylesheet" href="css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.min.css.map">
    <link rel="stylesheet" href="css/bootstrap-utilities.rtl.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.rtl.css.map">
    <link rel="stylesheet" href="css/bootstrap-utilities.rtl.min.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.rtl.min.css.map">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.css.map">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/bootstrap.rtl.css">
    <link rel="stylesheet" href="css/bootstrap.rtl.css.map">
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css.map">
     <!-- font awesome -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="fontawesome/css/brands.css">
    <link rel="stylesheet" href="fontawesome/css/brands.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome/css/regular.css">
    <link rel="stylesheet" href="fontawesome/css/regular.min.css">
    <link rel="stylesheet" href="fontawesome/css/solid.css">
    <link rel="stylesheet" href="fontawesome/css/solid.min.css">
    <link rel="stylesheet" href="fontawesome/css/svg-with-js.css">
    <link rel="stylesheet" href="fontawesome/css/svg-with-js.min.css">
    <link rel="stylesheet" href="fontawesome/css/v4-font-face.css">
    <link rel="stylesheet" href="fontawesome/css/v4-font-face.min.css">
    <link rel="stylesheet" href="fontawesome/css/v4-shims.css">
    <link rel="stylesheet" href="fontawesome/css/v4-shims.min.css">
    <link rel="stylesheet" href="fontawesome/css/v5-font-face.css">
    <link rel="stylesheet" href="fontawesome/css/v5-font-face.min.css">

    <link rel="stylesheet" href="affichage.css">

     <title>Affichage des Produits</title>
     <style>
     /* Style de la barre de recherche */

        a .ajout{
            background-color: red;
            margin-bottom: 200px;
        }
        .search-bar {
            color: #f1f1f1;
            border: 1px solid #666;
            border-radius: 20px;
        }

        /* Couleur de la barre de recherche lors du focus */
        

        /* Style du bouton de recherche */
        .search-button {
            background-color: #555;
            color: #f1f1f1;
            border: 1px solid #666;
        }

        /* Couleur du bouton lors du survol */
        .search-button:hover {
            background-color: #666;
            color: #fff;
        }
        .barr{
            width: 50%;
            float: right;
            margin-top: 4%;
            
        }
    </style>
     
    </head>
<body>

    <div class="container mt-3">
        <!-- Barre de recherche alignée à droite -->
        <div class="barr d-flex justify-content-end">
            <div class="input-group" style="width: 230px;">
                <input  type="text" id="searchTerm" class="form-control search-bar" placeholder="Rechercher...">
                <button id="searchButton" class="btn search-button" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </div>

    <div id="dynamicContent"></div>


    <div class="container">
        <?php
          if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          } 
        ?>
        <a id="ajouterProduit"  class=" ajout btn btn-dark ">Ajouter</a>
        <div id="messageSuccess" class="alert alert-success" style="display:none;"></div>

        <script>
            // Lorsque le bouton "Ajouter un produit" est cliqué, charge la page ajouter_produit.php
            $('#ajouterProduit').on('click', function() {
                loadPage('ajouter_produit.php');  // Charge la page ajouter_produit.php dans la zone dynamique
            });
        </script>


                                    
                    <!-- Modal Bootstrap pour la confirmation de suppression -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark text-white">
                                <div class="modal-header border-0">
                                    
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    Êtes-vous sûr de vouloir supprimer ce produit ? 
                                </div>
                                <div class="modal-footer border-0 d-flex justify-content-center">
                                    <button type="button" id="confirmDelete" class="btn btn-danger">Supprimer</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                                    
                    
                    
                    

                  </tr>
                  
              <script src="jquery-3.7.1.min.js"></script>
              <script>
                    
                    // Fonction pour charger la page de modification
                    function loadModifierPage(numProduit) {
                        $.ajax({
                            url: 'modifier.php',  // Vérifiez que 'modifier.php' renvoie bien un formulaire de modification
                            type: 'GET',
                            data: { num_produit: numProduit },
                            success: function(response) {
                                // Remplace le contenu de la section dynamique avec le formulaire de modification
                                $('#dynamicContent').html(response); 
                                $('#pageTitle').text('Modifier Produit');  // Met à jour le titre
                            },
                            error: function() {
                                alert("Erreur lors du chargement de la page de modification.");
                            }
                        });
                    }
                    
                        
 

                   
                    
                    
                    
                    
                    
    // Fonction pour ouvrir la modal et définir l'ID du produit
    function openModal(num_produit) {
        // Définit l'ID du produit dans un attribut de donnée personnalisé
        document.getElementById('confirmDelete').setAttribute('data-num-produit', num_produit);
        // Affiche la modal Bootstrap
        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        confirmationModal.show();
    }

    // Fonction pour gérer la suppression d'un produit
document.getElementById('confirmDelete').onclick = function() {
    var num_produit = this.getAttribute('data-num-produit'); // Récupérer l'ID du produit
    
    fetch(`supprimer.php?num_produit=${num_produit}`, {
        method: 'GET'
    })
    .then(response => response.text())  // On récupère la réponse sous forme de texte
    .then(data => {
        if (data.trim() === 'success') {
            // Recharger la page pour refléter les changements
            loadPage('affichage.php', 'Statistiques');  // Recharge la page actuelle (affichage.php) sans redirection
            
            // Fermer la modale Bootstrap
            var confirmationModal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
            confirmationModal.hide();
        } else {
            // Si la suppression échoue, afficher l'erreur retournée
            alert("Erreur lors de la suppression : " + data);  // Affiche l'erreur détaillée
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert("Une erreur s'est produite.");
    });
};

$(document).ready(function() {
    $('#searchButton').click(function() {
        var searchTerm = $('#searchTerm').val().trim(); // Récupérer la valeur de la barre de recherche

        // Si le champ de recherche n'est pas vide, envoyer la requête AJAX
        if (searchTerm !== '') {
            $.ajax({
                url: 'affichage.php', // Le fichier où la recherche sera traitée
                type: 'GET',
                data: { searchTerm: searchTerm },
                success: function(response) {
                    $('#dynamicContent').html(response); // Mettre à jour le tableau avec les résultats
                },
                error: function() {
                    alert('Erreur lors de la recherche');
                }
            });
        } else {
            // Si la recherche est vide, récupérer tous les produits
            $.ajax({
                url: 'affichage.php',
                type: 'GET',
                data: { searchTerm: '' },
                success: function(response) {
                    $('#dynamicContent').html(response); // Mettre à jour le tableau avec tous les produits
                },
                error: function() {
                    alert('Erreur lors de la récupération des produits');
                }
            });
        }
    });
});



















                </script>
              
        </table>

    </div>

    <!-- bootstrap -->
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.bundle.js.map"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js.map"></script>
    <script src="js/bootstrap.esm.js"></script>
    <script src="js/bootstrap.esm.js.map"></script>
    <script src="js/bootstrap.esm.min.js"></script>
    <script src="js/bootstrap.esm.min.js.map"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.js.map"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js.map"></script>
</body>
</html>
