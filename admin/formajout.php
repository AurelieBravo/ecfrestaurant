<?php
require("../bdd.php");

$reponse = $bdd->query("SELECT * FROM plat");
$tableau = $reponse->fetchALL($mode = PDO::FETCH_ASSOC);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<form method="POST" action="ajout.php">

    Nom : <input type="text" name="nom"></br>
    Prix : <input type="text" name="prix"></br>
    Genre : <input type="radio" name="genre" value="0">Entrée
    <input type="radio" name="genre" value="1">Plat</br>
    <input type="radio" name="genre" value="2">Dessert</br>
    images : <input type="file"></br>
    Description : <textarea rows="10" cols="70" name="desc"></textarea></br>
    Allergene : <input type="text" name="allergene"></br>

    </select>
    <input type="submit" value="Creer un plat">


</form>