<?php
include "connect_db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_produit = $_POST['nom_produit'] ?? null;
    $type_produit = $_POST['type_produit'] ?? null;
    $prix_produit = $_POST['prix_produit'] ?? null;
    $qty = $_POST['qty'] ?? null;
    $date = $_POST['date'] ?? null;

    if ($nom_produit && $type_produit && $prix_produit && $qty && $date) {
        $sql = "INSERT INTO `produits`(`nom_produit`, `type_produit`, `prix_produit`, `qty`, `date`)
                VALUES ('$nom_produit','$type_produit','$prix_produit','$qty','$date')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "Produit ajouté avec succès"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erreur : " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Veuillez remplir tous les champs."]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (les autres éléments head et les liens CSS) -->
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
    <title>Ajout des Produits</title>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Ajout des Produits</h3>
            <p class="text-muted">Veuillez remplir le champ ci-dessous pour ajouter des produits</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form id="addProductForm" method="post" style="width: 50vw; min-width:300px">
                <!-- Champs de formulaire -->
                <div class="row">
                    <div class="col">
                        <label for="form-label">Nom:</label>
                        <input type="text" class="form-control" name="nom_produit" placeholder="nom" required>
                    </div>
                    <div class="col">
                        <label for="form-label">Type:</label>
                        <input type="text" class="form-control" name="type_produit" placeholder="type" required>
                    </div>
                    <div class="col">
                        <label for="form-label">Prix:</label>
                        <input type="number" class="form-control" name="prix_produit" min="1" placeholder="prix" required>
                    </div>
                    <div class="col">
                        <label for="form-label">Quantité:</label>
                        <input type="number" class="form-control" name="qty" min="1" placeholder="quantité" required>
                    </div>
                    <div class="col mb-3">
                        <label for="form-label">Date:</label>
                        <input type="date" class="form-control" name="date" placeholder="date" required>
                    </div>
                </div>

                <div>
                    <button type="button" id="enregistrerBtn" class="btn btn-dark">Enregistrer</button>
                    <a id="annulerBtn" class="btn btn-danger">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="jquery-3.7.1.min.js"></script>
    <script>
        // Bouton Annuler pour revenir à la page d'affichage
        $('#annulerBtn').on('click', function() {
            loadPage('affichage.php', 'Statistiques');
        });

        // Enregistrer le produit via AJAX
        $('#enregistrerBtn').on('click', function() {
            if ($('#addProductForm')[0].checkValidity()) {
                $.ajax({
                    url: 'ajouter_produit.php',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#addProductForm').serialize(),
                    success: function(response) {
                        if (response.status === "success") {
                            loadPage('affichage.php', 'Statistiques');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Erreur lors de l\'enregistrement du produit.');
                    }
                });
            } else {
                $('#addProductForm')[0].reportValidity();
            }
        });
    </script>
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
