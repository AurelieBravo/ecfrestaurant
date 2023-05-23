<?php
require("../bdd.php");
$id = $_GET['id'];

// Récupérer les informations du plat à modifier
$req = $bdd->prepare("SELECT * FROM plat WHERE id_plat = :id");
$req->execute(array('id' => $id));
$plat = $req->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de la soumission du formulaire

    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $genre = $_POST['genre'];
    $description = $_POST['description'];
    $allergene = $_POST['allergene'];

    // Mettre à jour les données du plat dans la base de données
    $updateReq = $bdd->prepare("UPDATE plat SET nom_plat = :nom, prix_plat = :prix, genre_plat = :genre, description_plat = :description, allergene_plat = :allergene WHERE id_plat = :id");
    $updateReq->execute(array(
        'nom' => $nom,
        'prix' => $prix,
        'genre' => $genre,
        'description' => $description,
        'allergene' => $allergene,
        'id' => $id
    ));

    // Rediriger vers la page de tableau de bord ou une autre page appropriée
    header('Location: board.php');
    exit();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<form method="POST" action="modif.php?id=<?= $id ?>" enctype="multipart/form-data">

    Nom : <input type="text" name="nom" value="<?= $plat['nom_plat']; ?>"><br>
    Prix : <input type="text" name="prix" value="<?= $plat['prix_plat']; ?>"><br>
    Genre :
    <input type="radio" name="genre" value="0" <?= ($plat['genre_plat'] == 0) ? 'checked' : ''; ?>>Entrée
    <input type="radio" name="genre" value="1" <?= ($plat['genre_plat'] == 1) ? 'checked' : ''; ?>>Plat
    <input type="radio" name="genre" value="2" <?= ($plat['genre_plat'] == 2) ? 'checked' : ''; ?>>Dessert<br>
    Images : <input type="file"><br>
    Description : <textarea rows="10" cols="70" name="description"><?= $plat['description_plat']; ?></textarea><br>
    Allergènes : <input type="text" name="allergene" value="<?= $plat['allergene_plat']; ?>"><br>

    <input type="submit" value="Modifier un plat">

</form>