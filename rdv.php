<?php
include 'inc/database.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre Rendez-vous - Brocéliande Immo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Brocéliande Immo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vente.php">Vente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="location.php">Location</a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="manage.php">Gérer mes annonces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="take_appointment.php">Prendre Rendez-vous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rdv.php">Rendez-vous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Déconnexion</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Inscription</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Prendre Rendez-vous</h2>
        <form action="process_rdv.php" method="post">
            <div class="mb-3">
                <label for="annonce" class="form-label">Annonce :</label>
                <select class="form-select" id="annonce" name="annonce_id" required>
                    <?php foreach ($annonces as $annonce): ?>
                        <option value="<?= htmlspecialchars($annonce['id']) ?>"><?= htmlspecialchars($annonce['title']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="date_time" class="form-label">Date et Heure :</label>
                <input type="datetime-local" class="form-control" id="date_time" name="date_time" required>
            </div>
            <button type="submit" class="btn btn-primary">valider</button>
        </form>
    </div>

    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">© Brocéliande Immo - Tous droits réservés</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
