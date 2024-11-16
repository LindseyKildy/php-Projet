<?php
include "connect_db.php";

// Récupérer les données du formulaire si elles existent
// Supposons que vous ayez une fonction pour insérer la commande

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    $type_produit = $_POST['type_produit'];
    $prix_produit = $_POST['prix_produit'];
    $quantite_disponible = $_POST['quantite_disponible'];
    $qty_commande = $_POST['qty_commande'];
    $date_commande = date("Y-m-d H:i:s"); // Générer la date actuelle

    // Vérification si tous les champs sont remplis
    if ($type_produit && $prix_produit && $quantite_disponible && $qty_commande) {
        // Requête pour insérer les données dans la base
        if ($qty_commande > $quantite_disponible) {
            echo "<p style='color:red;'>La quantité commandée ne peut pas dépasser la quantité disponible.</p>";
        } else {
            // Procéder à l'insertion
            $sql = "INSERT INTO `commande` (`type_produit`, `prix_produit`, `date_commande`, `quantite_disponible`, `qty_commande`)
                    VALUES ('$type_produit', '$prix_produit', '$date_commande', '$quantite_disponible', '$qty_commande')";
            $result = mysqli_query($conn, $sql);
        }
        
        
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            // Rediriger vers la même page avec un message de succès (les champs seront réinitialisés)
            header("Location: commande.php?msg=Commande enregistrée avec succès");
            exit;
        } else {
            // Afficher une erreur en cas d'échec
            echo "Erreur : " . mysqli_error($conn);
        }
    } 
}
?>
<?php
include "connect_db.php";

// Récupération des produits
$sql = "SELECT * FROM produits WHERE num_produit = 13 ";
$sql = "SELECT * FROM produits WHERE num_produit = 14 ";
$sql = "SELECT * FROM produits WHERE num_produit = 15 ";
$sql = "SELECT * FROM produits WHERE num_produit = 16 ";
$sql = "SELECT * FROM produits WHERE num_produit = 17 ";
$sql = "SELECT * FROM produits WHERE num_produit = 18 ";
$result = $conn->query($sql);
?>

<!-- MENU -->
<div class="container my-5" id="menu">
    <h1 class="akali text-center mb-5">MENU</h1>
    <div class="row g-4">

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="diva d-flex justify-content-center align-items-center">
                            <!-- Image du produit, utilisez des images différentes selon le type ou ajoutez une colonne image dans la base de données -->
                            <img src="image/Vin_aperitif-removebg-preview.png" class="card-img-top" alt="Image du produit">
                        </div>
                        <div class="card-body">
                            <h4 class="sylas card-title"><?php echo $row['nom_produit']; ?></h4>
                            <ul class="list-unstyled">
                                <li><strong>Prix:</strong> Ar <?php echo $row['prix_produit']; ?></li>
                                <li><strong>Quantité disponible:</strong> <?php echo $row['qty']; ?> bouteilles</li>
                                <li><strong>Type:</strong> <?php echo $row['type_produit']; ?></li>
                            </ul>
                            <!-- Bouton pour commander avec des attributs data-* dynamiques -->
                            <button 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formCommandeModal"
                                data-type="<?php echo $row['type_produit']; ?>"
                                data-prix="Ar <?php echo $row['prix_produit']; ?>"
                                data-quantite="<?php echo $row['qty']; ?>">Commander
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Aucun produit disponible pour le moment.</p>";
        }
// Récupération des produits
$sql = "SELECT * FROM produits WHERE num_produit = 14 ";
$result = $conn->query($sql);
?>



        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="diva d-flex justify-content-center align-items-center">
                            <!-- Image du produit, utilisez des images différentes selon le type ou ajoutez une colonne image dans la base de données -->
                            <img src="image/Vin_Blanc-removebg-preview.png" class="card-img-top" alt="Image du produit">
                        </div>
                        <div class="card-body">
                            <h4 class="sylas card-title"><?php echo $row['nom_produit']; ?></h4>
                            <ul class="list-unstyled">
                                <li><strong>Prix:</strong> Ar <?php echo $row['prix_produit']; ?></li>
                                <li><strong>Quantité disponible:</strong> <?php echo $row['qty']; ?> bouteilles</li>
                                <li><strong>Type:</strong> <?php echo $row['type_produit']; ?></li>
                            </ul>
                            <!-- Bouton pour commander avec des attributs data-* dynamiques -->
                            <button 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formCommandeModal"
                                data-type="<?php echo $row['type_produit']; ?>"
                                data-prix="Ar <?php echo $row['prix_produit']; ?>"
                                data-quantite="<?php echo $row['qty']; ?>">Commander
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Aucun produit disponible pour le moment.</p>";
        }
// Récupération des produits
$sql = "SELECT * FROM produits WHERE num_produit = 15 ";
$result = $conn->query($sql);
?>



        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="diva d-flex justify-content-center align-items-center">
                            <!-- Image du produit, utilisez des images différentes selon le type ou ajoutez une colonne image dans la base de données -->
                            <img src="image/Vin_blanc_vert-removebg-preview 1.png" class="card-img-top" alt="Image du produit">
                        </div>
                        <div class="card-body">
                            <h4 class="sylas card-title"><?php echo $row['nom_produit']; ?></h4>
                            <ul class="list-unstyled">
                                <li><strong>Prix:</strong> Ar <?php echo $row['prix_produit']; ?></li>
                                <li><strong>Quantité disponible:</strong> <?php echo $row['qty']; ?> bouteilles</li>
                                <li><strong>Type:</strong> <?php echo $row['type_produit']; ?></li>
                            </ul>
                            <!-- Bouton pour commander avec des attributs data-* dynamiques -->
                            <button 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formCommandeModal"
                                data-type="<?php echo $row['type_produit']; ?>"
                                data-prix="Ar <?php echo $row['prix_produit']; ?>"
                                data-quantite="<?php echo $row['qty']; ?>">Commander
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Aucun produit disponible pour le moment.</p>";
        }
// Récupération des produits
$sql = "SELECT * FROM produits WHERE num_produit = 16 ";
$result = $conn->query($sql);
?>


        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="diva d-flex justify-content-center align-items-center">
                            <!-- Image du produit, utilisez des images différentes selon le type ou ajoutez une colonne image dans la base de données -->
                            <img src="image/Vin_rose_11-removebg-preview.png" class="card-img-top" alt="Image du produit">
                        </div>
                        <div class="card-body">
                            <h4 class="sylas card-title"><?php echo $row['nom_produit']; ?></h4>
                            <ul class="list-unstyled">
                                <li><strong>Prix:</strong> Ar <?php echo $row['prix_produit']; ?></li>
                                <li><strong>Quantité disponible:</strong> <?php echo $row['qty']; ?> bouteilles</li>
                                <li><strong>Type:</strong> <?php echo $row['type_produit']; ?></li>
                            </ul>
                            <!-- Bouton pour commander avec des attributs data-* dynamiques -->
                            <button 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formCommandeModal"
                                data-type="<?php echo $row['type_produit']; ?>"
                                data-prix="Ar <?php echo $row['prix_produit']; ?>"
                                data-quantite="<?php echo $row['qty']; ?>">Commander
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Aucun produit disponible pour le moment.</p>";
        }
// Récupération des produits
$sql = "SELECT * FROM produits WHERE num_produit = 17 ";
$result = $conn->query($sql);
?>


        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="diva d-flex justify-content-center align-items-center">
                            <!-- Image du produit, utilisez des images différentes selon le type ou ajoutez une colonne image dans la base de données -->
                            <img src="image/Vin_Rouge_1-removebg-preview 1.png" class="card-img-top" alt="Image du produit">
                        </div>
                        <div class="card-body">
                            <h4 class="sylas card-title"><?php echo $row['nom_produit']; ?></h4>
                            <ul class="list-unstyled">
                                <li><strong>Prix:</strong> Ar <?php echo $row['prix_produit']; ?></li>
                                <li><strong>Quantité disponible:</strong> <?php echo $row['qty']; ?> bouteilles</li>
                                <li><strong>Type:</strong> <?php echo $row['type_produit']; ?></li>
                            </ul>
                            <!-- Bouton pour commander avec des attributs data-* dynamiques -->
                            <button 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formCommandeModal"
                                data-type="<?php echo $row['type_produit']; ?>"
                                data-prix="Ar <?php echo $row['prix_produit']; ?>"
                                data-quantite="<?php echo $row['qty']; ?>">Commander
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Aucun produit disponible pour le moment.</p>";
        }

// Récupération des produits
$sql = "SELECT * FROM produits WHERE num_produit = 18 ";
$result = $conn->query($sql);
?>



        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="diva d-flex justify-content-center align-items-center">
                            <!-- Image du produit, utilisez des images différentes selon le type ou ajoutez une colonne image dans la base de données -->
                            <img src="image/Vin_rouge_fotsy-removebg-preview.png" class="card-img-top" alt="Image du produit">
                        </div>
                        <div class="card-body">
                            <h4 class="sylas card-title"><?php echo $row['nom_produit']; ?></h4>
                            <ul class="list-unstyled">
                                <li><strong>Prix:</strong> Ar <?php echo $row['prix_produit']; ?></li>
                                <li><strong>Quantité disponible:</strong> <?php echo $row['qty']; ?> bouteilles</li>
                                <li><strong>Type:</strong> <?php echo $row['type_produit']; ?></li>
                            </ul>
                            <!-- Bouton pour commander avec des attributs data-* dynamiques -->
                            <button 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#formCommandeModal"
                                data-type="<?php echo $row['type_produit']; ?>"
                                data-prix="Ar <?php echo $row['prix_produit']; ?>"
                                data-quantite="<?php echo $row['qty']; ?>">Commander
                            </button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Aucun produit disponible pour le moment.</p>";
        }

// Fermeture de la connexion
$conn->close();
?>

   











<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de commande</title>
    
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
    <link rel="stylesheet" href="acceuil.css">
    
    <style>
        /* Style pour l'arrière-plan sombre */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>    
        <!-- Modal du formulaire de commande -->
        <div class="modal fade" id="formCommandeModal" tabindex="-1" aria-labelledby="formCommandeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCommandeModalLabel">Formulaire de commande</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Message de confirmation caché par défaut -->
                        <div id="confirmationMessage" class="alert alert-success" style="display: none;">
                            Votre commande a été passée avec succès !
                        </div>
                        <form id="commandeForm" action=""  method="POST">
                            <!-- Affichage du type de produit (lecture seule) -->
                            <div class="mb-3">
                                <label for="type_produit" class="form-label">Type de produit</label>
                                <input type="text" class="form-control" id="type_produit" name="type_produit" readonly>
                            </div>
                            <!-- Affichage du prix du produit (lecture seule) -->
                            <div class="mb-3">
                                <label for="prix_produit" class="form-label">Prix unitaire</label>
                                <input type="text" class="form-control" id="prix_produit" name="prix_produit" readonly>
                            </div>
                            <!-- Affichage de la quantité disponible (lecture seule) -->
                            <div class="mb-3">
                                <label for="quantite_disponible" class="form-label">Quantité disponible</label>
                                <input type="text" class="form-control" id="quantite_disponible" name="quantite_disponible" readonly>
                            </div>
                            <!-- Champ pour la quantité commandée, modifiable par l'utilisateur -->
                            <div class="mb-3">
                                <label for="qty_commande" class="form-label">Quantité commandée</label>
                                <input type="number" class="form-control" id="qty_commande" name="qty_commande" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-success" id="submitButton" name="submit">Passer la commande</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="alertMessage" class="alert alert-danger alert-dismissible fade show alert-container" role="alert" style="display: none;">
            La quantité commandée ne doit pas dépasser la quantité disponible.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        

    <script>
        
        // Script pour remplir les champs du formulaire avec les informations du produit sélectionné
        
        const formCommandeModal = document.getElementById('formCommandeModal');
        formCommandeModal.addEventListener('show.bs.modal', function(event) {
        // Réinitialisation du champ "quantité commandée"
        document.getElementById('qty_commande').value = ''; // Vide le champ
        
        // Récupération des données du bouton sur lequel on a cliqué
        const button = event.relatedTarget; // Le bouton qui a ouvert le modal
        const typeProduit = button.getAttribute('data-type');
        const prixProduit = button.getAttribute('data-prix');
        const quantiteDisponible = button.getAttribute('data-quantite');

        // Remplir le formulaire avec ces valeurs
        document.getElementById('type_produit').value = typeProduit;
        document.getElementById('prix_produit').value = prixProduit;
        document.getElementById('quantite_disponible').value = quantiteDisponible;
    });


        
    document.getElementById('commandeForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    // const submitButton = document.getElementById('submitButton');
    // submitButton.disabled = true;

    // Récupérer les valeurs du formulaire
    const qtyCommande = document.getElementById('qty_commande').value;
    const quantiteDisponible = document.getElementById('quantite_disponible').value;

    // Vérifier si la quantité commandée dépasse la quantité disponible
    if (parseInt(qtyCommande) > parseInt(quantiteDisponible)) {
        // Afficher un message d'erreur si la quantité commandée dépasse la quantité disponible
        alert("La quantité commandée ne doit pas dépasser la quantité disponible.");
        return; // Arrêter l'envoi du formulaire
    }

    // Création de l'objet FormData pour récupérer les données du formulaire
    let formData = new FormData(this);

    try {
        // Envoi des données via AJAX
        const response = await fetch('commande.php', {
            method: 'POST',
            body: formData
        });
        const responseText = await response.text();

        console.log(responseText);

        // Afficher le message de confirmation centré
        const confirmationMessage = document.getElementById('confirmationMessage');
        confirmationMessage.style.display = 'block';

        // Optionnel : masquer le message après quelques secondes
        setTimeout(() => {
            confirmationMessage.style.display = 'none';
        }, 3000); // 3000 ms = 3 secondes

    } catch (error) {
        console.error('Erreur:', error);
    }
});

    
    </script>

    </div>

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

    

