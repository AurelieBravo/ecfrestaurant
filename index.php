<?php
// appel de la page header avec require qui renvera une erreur si header n'est pas chargée
// include et require font un copier/coller du contenu de la page appelé
require("header.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="hero-section">
        <div class="container">
            <h1>Bienvenue au Restaurant Le Quai Antique</h1>
            <p>Découvrez une expérience culinaire exceptionnelle</p>
            <a href="reservation.php" class="btn btn-primary btn-lg">Réservez une table</a>
        </div>
    </section>

    <section class="menu-section">
        <div class="container">
            <h2>Notre Menu</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="menu-item">
                        <h3>Entrées</h3>
                        <p>Commencez votre repas avec nos délicieuses entrées préparées avec des ingrédients frais.</p>
                        <a href="entrees.html" class="btn btn-primary">Voir le menu</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="menu-item">
                        <h3>Plats principaux</h3>
                        <p>Découvrez notre sélection de plats principaux savoureux, cuisinés avec passion.</p>
                        <a href="plats.html" class="btn btn-primary">Voir le menu</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="menu-item">
                        <h3>Desserts</h3>
                        <p>Terminez votre repas en beauté avec nos desserts exquis, préparés avec amour.</p>
                        <a href="desserts.html" class="btn btn-primary">Voir le menu</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
//même principe que pour header
require("footer.php");

?>