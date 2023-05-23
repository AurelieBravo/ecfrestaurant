<?php

require("header.php");


session_start();

// Vérifier si l'administrateur est déjà connecté, rediriger vers la page d'administration s'il est connecté
if (isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}

// Vérifier les informations de connexion lors de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérifier les informations de connexion (à adapter selon vos besoins)
    if ($username === "admin" && $password === "admin123") {
        // Enregistrement de la connexion de l'administrateur dans une variable de session
        $_SESSION['admin'] = $username;

        // Rediriger vers la page d'administration
        header("Location: admin.php");
        exit();
    } else {
        $error = "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

</head>

<body>
    <section id="admin-login" class="admin-login-section">
        <div class="container">
            <h2>Connexion administrateur</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Entrez vos identifiants</h3>
                            <?php if (isset($error)) : ?>
                                <p><?php echo $error; ?></p>
                            <?php endif; ?>
                            <form class="admin-login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Se connecter</button>
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