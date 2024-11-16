



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sombre avec Icônes</title>
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
    <style>
        .sidebar {
            color: white;
            background-color: #272727;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 245px;
            padding-top: 20px;
            
            
        }
        .sidebar a {
            color: white;
            padding: 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a.active {
            background-color: white;
            color: #343a40;
            border-radius: 10px;
        }
        .sidebar a:hover {
            background-color: #4a4d4e;
            border-radius: 5px;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .content {
            margin-left: 230px;
            background-color: #f8f9fa;
            min-height: 100vh;
            padding: 20px;
        }
        .header {
            color: #343a40;
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 10px;
            width: 100%;
            padding-left: 5%;
            border: 1px solid #ececec; /* Bordure grise visible */
            border-radius: 8px; /* Bordure arrondie */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15); /* Ombre pour l'effet d'élévation */
        }

        .btn-light {
            background-color: #f8f9fa;
            border-color: #ccc;
        }
        .btn-light:hover {
            background-color: #e2e6ea;
        }
        #dynamicContent {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: none;
        }
        .content {
            background-color: #fff;
            margin-left: 18%;
        }
    </style>
</head>
<body>

    <div class="sidebar position-fixed top-0 start-0 p-3">
        <h4><i class="fas fa-tachometer-alt mb-5 mt-4 "></i>Tableau de bord</h4>
        <a href="#" id="statistiquesLink"><i class="fas fa-chart-line"></i>Statistique</a>
        <a href="#" id="gestionProduitsLink"><i class="fas fa-shopping-cart"></i>Produits</a>
        <a href="#" id="commandesLink"><i class="fas fa-box"></i> Commandes</a>
        <a href="#" id="clientsLink"><i class="fas fa-users"></i>Clients</a>
    </div>

    <div class="content">
        <div class="header d-flex justify-content-between align-items-center w-100">
            <h2 id="pageTitle">Tableau de Bord</h2>
            <div>
                <form id="logoutForm" action="logout.php" method="POST" style="display: inline;">
                    <button type="submit" class="btn btn-dark">Se déconnecter</button>
                </form>
            </div>

        </div>

        <div id="dynamicContent" class="dynamic-content">
            <!-- Contenu dynamique sera chargé ici -->
        </div>
    </div>

    
    <script src="jquery-3.7.1.min.js"></script>
    <script>
    // Fonction pour charger le contenu et mettre à jour le titre
    function loadPage(page, title) {
        $.ajax({
            url: page,
            type: 'GET',
            success: function(response) {
                $('#dynamicContent').html(response); // Charge le contenu
                $('#pageTitle').text(title); // Met à jour le titre
            },
            error: function(xhr, status, error) {
                $('#dynamicContent').html('<p>Erreur : ' + xhr.status + ' - ' + error + '</p>'); // Affiche une erreur
            }
        });
    }
    
    // Gérer les clics sur les liens de la sidebar
    $('#statistiquesLink').on('click', function() {
        loadPage('', 'Statistiques');
        setActiveLink(this);
    });
    
    $('#gestionProduitsLink').on('click', function() {
        loadPage('affichage.php', 'Produits');
        setActiveLink(this);
    });
    
    $('#commandesLink').on('click', function() {
        loadPage('commandes.php', 'Commandes');
        setActiveLink(this);
    });
    
    $('#clientsLink').on('click', function() {
        loadPage('clients.php', 'Clients');
        setActiveLink(this);
    });
    
    // Met à jour la classe active
    function setActiveLink(element) {
        $('.sidebar a').removeClass('active');
        $(element).addClass('active');
    }
    
    // Chargement initial
    loadPage('tableau_de_bord.php', 'Tableau de Bord');

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
