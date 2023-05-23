<?php
require("header.php");
require("bdd.php"); // récupère l'instance de la classe PDO qui établit la connexion à la BDD

try {
    $reponse = $bdd->query("SELECT * FROM plat WHERE id_plat = $page");
    $plat = $reponse->fetch(PDO::FETCH_ASSOC);

    if ($plat) {
?>
        <!----------------------Liste déroulante bootstrap ----------------------->
        <select class="form-select form-select-lg mb-3 espece" aria-label=".form-select-lg example">
            <!-- la classe espece est rajoutée pour réduire la width de bootsrap -->
            <option selected>Genre</option>
            <option value="1">Entrée</option>
            <option value="2">Plat</option>
            <option value="3">Dessert</option>
        </select>

        <div class="container groupe">
            <div class="card" style="width: 30%;">
                <img src="images/<?php echo $plat['img_plat']; ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $plat['nom_plat']; ?></h5>
                    <p class="card-text"><?php echo ucfirst($plat['prix_plat']) . " €"; ?></p>
                    <a href="plat.php?page=<?php echo urlencode($plat['id_plat']); ?>&nom_plat=<?php echo urlencode($plat['nom_plat']); ?>" class="card bg-transparent" style="text-decoration : none">
                        <button class="btn  rounded-pill text-uppercase" style="background : rgb(89, 18, 170);color :white">
                            voir fiche
                        </button>
                    </a>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Aucun plat trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des données : " . $e->getMessage();
}
require("footer.php");
?>