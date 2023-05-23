<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant le Quai antique</title>
    <!-- CDN du CSS de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- On appelle notre CSS perso après pour qu'il puisse écraser les valeurs de bootstrap -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Administration</h1>

    <?php
    require("../bdd.php");
    // pour récupérer tous les plats
    $reponse = $bdd->query("SELECT * FROM plat");
    $tableau = $reponse->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table class="table table-bordered" style="background:#DF01A5;width:75%">
        <tr>
            <th>Id</th>
            <th>Genre</th>
            <th>Nom</th>
            <th>Image</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Allergène</th>
            <th>Actions</th>
        </tr>

        <?php
        foreach ($tableau as $plat) {
            if ($plat['genre_plat'] == 0) {
                $genre = "entrée";
            } elseif ($plat['genre_plat'] == 1) {
                $genre = "plat";
            } elseif ($plat['genre_plat'] == 2) {
                $genre = "dessert";
            } else {
                // Gérer le cas où le genre du plat n'est pas valide
                $genre = "inconnu";
            }
        ?>
            <tr>
                <td><?php echo $plat["id_plat"]; ?></td>
                <td><?php echo $genre; ?></td>
                <td><?php echo $plat["nom_plat"]; ?></td>
                <td><?php echo isset($plat["img_plat"]) ? $plat["img_plat"] : ""; ?></td>
                <td><?php echo $plat["prix_plat"] . " €"; ?></td>
                <td><?php echo $plat["description_plat"]; ?></td>
                <td><?php echo $plat["allergene_plat"]; ?></td>
                <td>
                    <a href="formupdate.php?id=<?php echo $plat["id_plat"]; ?>">Modifier</a>
                    <a href="delete.php?id=<?php echo $plat["id_plat"]; ?>">Effacer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <a href="formajout.php" style="background:#DF01A5;">Ajouter</a>

    <!-- CDN de jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- CDN du JavaScript de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>