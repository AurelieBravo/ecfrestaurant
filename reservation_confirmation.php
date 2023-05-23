<?php

require("header.php");


// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecfrestaurant";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données de réservation
    $stmt = $bdd->query("SELECT * FROM reservations ORDER BY created_at DESC LIMIT 1");
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($reservation) {
        $name = $reservation['name'];
        $email = $reservation['email'];
        $phone = $reservation['phone'];
        $message = $reservation['message'];
        $reservationTime = $reservation['reservation_time'];
        $nombre_couverts = $reservation['nombre_couverts'];
        $created_at = $reservation['created_at'];
        $allergies = $reservation['allergies'];
    } else {
        echo "Aucune réservation trouvée.";
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Les balises meta, title, styles et scripts ont été supprimées pour plus de clarté -->
</head>

<body>
    <section id="reservation-confirmation" class="reservation-confirmation-section">
        <div class="container">
            <h2>Confirmation de réservation</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Détails de la réservation</h3>
                            <p><strong>Nom :</strong> <?php echo $name; ?></p>
                            <p><strong>Email :</strong> <?php echo $email; ?></p>
                            <p><strong>Téléphone :</strong> <?php echo $phone; ?></p>
                            <p><strong>Heure de réservation :</strong> <?php echo $reservationTime; ?></p>
                            <p><strong>Nombre de couverts :</strong> <?php echo $nombre_couverts; ?></p>
                            <p><strong>Message :</strong> <?php echo $message; ?></p>
                            <p><strong>Allergies :</strong> <?php echo $allergies; ?></p>
                            <p><strong>Date et heure de réservation :</strong> <?php echo $created_at; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>