<?php
require("bdd.php");

// On vérifie si les valeurs du formulaire existent avant de les stocker dans des variables
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$mdp = isset($_POST['mdp']) ? $_POST['mdp'] : "";
$allergene = isset($_POST['allergie']) ? $_POST['allergie'] : "";
$arachide = isset($_POST['arachide']) ? $_POST['arachide'] : 0;
$fruitsacoque = isset($_POST['fruitsacoque']) ? $_POST['fruitsacoque'] : 0;
$laitage = isset($_POST['laitage']) ? $_POST['laitage'] : 0;
$aucuneallergie = isset($_POST['aucuneallergie']) ? $_POST['aucuneallergie'] : 0;

// Requête préparée pour l'insertion des données
$req = $bdd->prepare("INSERT INTO client(login_client, nom_client, prenom_client, email_client, mdp_client, allergene_client, arachide_client, fruitsacoque_client, laitage_client, aucuneallergie_client) 
VALUES (:login, :nom, :prenom, :email, :mdp, :allergene, :arachide, :fruitsacoque, :laitage, :aucuneallergie)");

// Exécution de la requête en fournissant un tableau associatif des valeurs
$req->execute(array(
    'login' => 'default',
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'mdp' => $mdp,
    'allergene' => $allergene,
    'arachide' => $arachide,
    'fruitsacoque' => $fruitsacoque,
    'laitage' => $laitage,
    'aucuneallergie' => $aucuneallergie
));

// Redirection après l'insertion
header('Location: index.php');
