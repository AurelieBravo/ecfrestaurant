<?php
require("../bdd.php");

$nom = $_POST['nom'];
$genre = isset($_POST['genre']) ? $_POST['genre'] : null;
$prix = $_POST['prix'];
$description = isset($_POST['description']) ? $_POST['description'] : null;
$allergene = isset($_POST['allergene']) ? $_POST['allergene'] : null;
$id = $_POST['id']; // Assurez-vous que cette variable est correctement définie

$req = $bdd->prepare("UPDATE plat SET nom_plat=:nom, genre_plat=:genre, prix_plat=:prix, description_plat=:description, allergene_plat=:allergene WHERE id_plat=:id");
$req->execute(array(
    'nom' => $nom,
    'genre' => $genre,
    'prix' => $prix,
    'description' => $description,
    'allergene' => $allergene,
    'id' => $id
));

header('location:board.php');
