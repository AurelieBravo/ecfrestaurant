<?php


require("header.php");


// Vérification du formulaire de réservation
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    $reservationTime = $_POST["heure"]; // Correction de la clé d'accès
    $nombreCouverts = $_POST["nombre_couverts"]; // Nouvelle variable pour le nombre de couverts
    $allergies = isset($_POST["allergies"]) ? $_POST["allergies"] : ""; // Nouvelle variable pour les allergies
    $reservation = ""; // Valeur par défaut pour la variable $reservation


    // Validation et enregistrement des données dans la base de données
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($reservationTime) && !empty($nombreCouverts)) {
        // Connexion à la base de données (à adapter selon vos paramètres)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ecfrestaurant";

        try {
            $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête d'insertion des données de réservation dans la table appropriée
            $stmt = $bdd->prepare("INSERT INTO reservations (name, email, phone, message, reservation_time, allergies, reservation) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $message, $reservationTime, $allergies, $reservation]);

            // ...

            // Redirection vers une page de confirmation ou un message de succès
            header("Location: reservation_confirmation.php");
            exit();
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs obligatoires.";
    }
}
?>

<!-- Code HTML de la page de réservation avec des cartes -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Les balises meta, title, styles et scripts ont été supprimées pour plus de clarté -->
</head>

<body>
    <section id="reservation" class="reservation-section">
        <div class="container">
            <h2>Réservez une table</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Formulaire de réservation</h3>
                            <form class="reservation-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nom" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <input type="tel" name="phone" class="form-control" placeholder="Téléphone" required>
                                </div>
                                <div class="form-group">
                                    <label for="heure">Heure :</label></br>
                                    <select id="heure" name="heure" required></br>
                                        <?php
                                        // Générer la liste des horaires
                                        $ouverture = strtotime('12:00');
                                        $fermeture = strtotime('15:00');
                                        $pas = 900; // 15 minutes en secondes
                                        for ($heure = $ouverture; $heure < $fermeture; $heure += $pas) {
                                            $heure_debut = date('H:i', $heure);
                                            $heure_fin = date('H:i', $heure + $pas);
                                            echo "<option value=\"$heure_debut\">$heure_debut - $heure_fin</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="number" name="nombre_couverts" class="form-control" placeholder="Nombre de couverts" required>
                                </div>
                                <div class="mb-3">
                                    <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="allergies" class="form-control" placeholder="Allergies">
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>