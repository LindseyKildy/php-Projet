<?php
include 'connect_db.php';

if (isset($_GET['num_produit'])) {
    $num_produit = $_GET['num_produit'];

    // Suppression du produit dans la base de données
    $sql = "DELETE FROM produits WHERE num_produit = $num_produit";
    if (mysqli_query($conn, $sql)) {
        echo "success";  // Renvoie un succès
    } else {
        echo "error: " . mysqli_error($conn);  // Renvoie une erreur détaillée
    }
}
?>
