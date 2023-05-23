<?php
require("../bdd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = isset($_POST['nom']) ? $_POST['nom'] : "";
    $genre = isset($_POST['genre']) ? $_POST['genre'] : "";
    $prix = isset($_POST['prix']) ? $_POST['prix'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $allergene = isset($_POST['allergene']) ? $_POST['allergene'] : "";

    $req = $bdd->prepare("INSERT INTO plat (nom_plat, genre_plat, prix_plat, description_plat, allergene_plat) 
                          VALUES (:nom, :genre, :prix, :description, :allergene)");

    $req->execute(array(
        'nom' => $nom,
        'genre' => $genre,
        'prix' => $prix,
        'description' => $description,
        'allergene' => $allergene
    ));

    header('Location: board.php');
    exit();
} else {
    // Redirection en cas d'accès direct à ce script sans requête POST
    header('Location: board.php');
    exit();
}
