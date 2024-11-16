<?php
include "connect_db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_produit = $_POST['num_produit'] ?? null;
    $nom_produit = $_POST['nom_produit'] ?? null;
    $type_produit = $_POST['type_produit'] ?? null;
    $prix_produit = $_POST['prix_produit'] ?? null;
    $qty = $_POST['qty'] ?? null;
    $date = $_POST['date'] ?? null;

    if ($num_produit && $nom_produit && $type_produit && $prix_produit && $qty && $date) {
        $sql = "UPDATE `produits` 
                SET `nom_produit` = '$nom_produit', `type_produit` = '$type_produit', 
                    `prix_produit` = '$prix_produit', `qty` = '$qty', `date` = '$date' 
                WHERE `num_produit` = '$num_produit'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "Produit modifié avec succès"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Erreur : " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Veuillez remplir tous les champs."]);
    }
    exit;
}

// Récupérer l'ID du produit à modifier
if (isset($_GET['num_produit'])) {
    $num_produit = $_GET['num_produit'];
    $sql = "SELECT * FROM `produits` WHERE `num_produit` = '$num_produit'";
    $result = mysqli_query($conn, $sql);
    $produit = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Modifier le Produit</h3>
            <p class="text-muted">Veuillez modifier les informations du produit</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form id="modifyProductForm" method="post" style="width: 50vw; min-width:300px">
                <input type="hidden" name="num_produit" value="<?= $produit['num_produit'] ?>">

                <div class="row">
                    <div class="col">
                        <label for="form-label">Nom:</label>
                        <input type="text" class="form-control" name="nom_produit" value="<?= $produit['nom_produit'] ?>" required>
                    </div>
                    <div class="col">
                        <label for="form-label">Type:</label>
                        <input type="text" class="form-control" name="type_produit" value="<?= $produit['type_produit'] ?>" required>
                    </div>
                    <div class="col">
                        <label for="form-label">Prix:</label>
                        <input type="number" class="form-control" name="prix_produit" value="<?= $produit['prix_produit'] ?>" min="1" required>
                    </div>
                    <div class="col">
                        <label for="form-label">Quantité:</label>
                        <input type="number" class="form-control" name="qty" value="<?= $produit['qty'] ?>" min="1" required>
                    </div>
                    <div class="col mb-3">
                        <label for="form-label">Date:</label>
                        <input type="date" class="form-control" name="date" value="<?= $produit['date'] ?>" required>
                    </div>
                </div>

                <div>
                    <button type="button" id="modifierBtn" class="btn btn-dark">Modifier</button>
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

        // Modifier le produit via AJAX
        $('#modifierBtn').on('click', function() {
            if ($('#modifyProductForm')[0].checkValidity()) {
                $.ajax({
                    url: 'modifier.php',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#modifyProductForm').serialize(),
                    success: function(response) {
                        if (response.status === "success") {
                            loadPage('affichage.php', 'Statistiques');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Erreur lors de la modification du produit.');
                    }
                });
            } else {
                $('#modifyProductForm')[0].reportValidity();
            }
        });
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
