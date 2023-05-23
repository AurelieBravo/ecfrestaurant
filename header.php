<?php
//ON stock dans une variable la valeur de l'information page, transmise par la barre d'URL sans la superglobale GET
$page = 1;
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
}

//Si on arrive de la page traitementconnexion avec une info err en GET
if (isset($_GET['err'])) {
    if ($_GET['err'] == 0) {
?>
        <style>
            .connection,
            .inscri {
                display: none !important;
            }

            .mapage {
                display: block !important;
            }
        </style>
<?php
    }
}

// var_dump permet de voir le contenu d'une variable ainsi que toutes informations la concernant (type, taille, ...)
//  var_dump($page);
?>
<!-- Le header est créé une unique fois ici, puis appelé sur toutes les pages -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <!-- DEBUT Navbar Bootsrap -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #802B75;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- Le href envoie vers la page adaptée et fourni une information "page" // Superglobale GET (Tableau construit avec les infos fournies après le ? dans l'URL) -->
                    <!-- Avec php, on test sur quelle page nous sommes avec la variable créée plus tôt gràce à GET puis nous ajoutons les classes "active" et "disabled" si nous sommes sur la bonne page -->
                    <a class="nav-link <?php if ($page == 1) {
                                            echo "active disabled";
                                        }
                                        //SI la variable page contient 1, ALORS écrit "active" et "disabled"   
                                        ?>" href="index.php?page=1">Accueil</a>
                    <a class="nav-link <?php if ($page == 2) {
                                            echo "active disabled";
                                        }
                                        ?>" href="genre.php?page=2">Les plats</a>
                    <a class="nav-link <?php if ($page == 3) {
                                            echo "active disabled";
                                        }
                                        ?>" href="login.php?page=4">Se connecter</a>
                    <a class="nav-link inscri <?php if ($page == 5) {
                                                    echo "active disabled";
                                                }
                                                ?>" href="inscription.php?page=5">Inscription</a>
                    <!-- Ma page est display none initialement et devient visible si on est connecté -->
                    <a class="nav-link mapage <?php if ($page == 6) {
                                                    echo "active disabled";
                                                }
                                                ?>" href="pageperso.php">Ma page</a>

                </div>

            </div>
        </div>
    </nav>
    <!-- FIN  Navbar Bootsrap -->