<?php
require("header.php");
require("bdd.php");
$reponse = $bdd->query("SELECT * FROM plat WHERE id_plat = $page");
$plat = $reponse->fetch();
?>

<section class="container-fluid w-100 h-100 background">
    <article class="row col-8 h-100 m-auto d-flex flex-wrap bg-dark align-items-center justify-content-around">
        <div class="col col-12 d-flex align-items-center justify-content-around">
            <h1 class="text-light text-uppercase"><?= $plat['nom_plat']; ?></h1>
            <img src="images/<?= $plat['img_plat']; ?>" class="border border-white border-4 rounded-circle" alt="...">
        </div>
        <div class="info col col-6 d-flex align-items-center justify-content-around">
            <p class="card-text text-uppercase text-light">
                <?= $plat['genre_plat']; ?> <br>
                <?= $plat['nom_plat']; ?> <br>
                <?= $plat['prix_plat'] . " € "; ?><br>
                <?= $plat['description_plat']; ?> <br>
                <?php if (isset($plat['allergene_plat'])) { ?>
                    <?= $plat['allergene_plat']; ?> <br>
                <?php } ?>
            </p>
        </div>
        <div class="col col-6 description text-light">
            <?= $plat['description_plat']; ?>
            <a href="genre.php?" class="btn btn-success text-uppercase">Retour</a>
        </div>
    </article>
</section>