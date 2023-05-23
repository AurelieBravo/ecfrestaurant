<?php

require("../bdd.php");

$id = $_GET['id'];

$bdd->exec("DELETE FROM plat WHERE id_plat=$id");

header('location:board.php');
