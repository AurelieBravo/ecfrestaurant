<?php
require("header.php");

?>

<form method="POST" action="ajoutclient.php">
    <input class="form-control" type="text" name="nom" placeholder="Votre nom" aria-label="default input example" required>

    <input class="form-control" type="text" name="prenom" placeholder="Votre prénom" aria-label="default input example" required>

    <input type="email" class="form-control" name="email" placeholder="Votre adresse email" required>




    Avez vous des Allergie alimentaire ?
    <div class="form-check">
        <input class="form-check-input" type="radio" name="allergie" id="flexRadioDefault1" value="1" required>
        <label class="form-check-label" for="flexRadioDefault1">
            Arachide
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="allergie" id="flexRadioDefault2" value="0" required>
        <label class="form-check-label" for="flexRadioDefault2">
            Fruits a coque
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="allergie" id="flexRadioDefault1" value="1" required>
        <label class="form-check-label" for="flexRadioDefault3">
            Laitage
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="allergie" id="flexRadioDefault1" value="1" required>
        <label class="form-check-label" for="flexRadioDefault4">
            Aucune Allergie
        </label>
    </div>

    <input class="form-control" type="text" name="login" placeholder="Votre nom d'utilisateur" aria-label="default input example" required>

    <input type="password" name="mdp" class="form-control" placeholder="Votre mot de passe" id="inputPassword" required>

    <input type="submit" value="Je m'inscris" onclick="inscription()">

</form>

<script src="inscription.js"></script>

<?php
require("footer.php");

?>