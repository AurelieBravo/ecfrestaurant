<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecfrestaurant";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des horaires d'ouverture depuis la base de données
    $stmt = $bdd->query("SELECT * FROM opening_hours ORDER BY FIELD(day_of_week, 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche')");
    $openingHours = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
    exit();
}
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Horaires d'ouverture :</p>
                <ul>
                    <?php foreach ($openingHours as $openingHour) : ?>
                        <li><?php echo $openingHour['day_of_week'] . " : " . $openingHour['opening_time'] . " - " . $openingHour['closing_time']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Contactez nous</h3>
                <ul class="contact">
                    <li><i class="fa fa-phone"></i> 07 07 06 06 00</li>
                </ul>
                <p>© 2023 Restaurant Michant. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</footer>