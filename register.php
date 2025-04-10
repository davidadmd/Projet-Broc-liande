<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Brocéliande Immo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="annonces.php?type=vente">Vente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="annonces.php?type=location">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="register.php">Inscription</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Inscription</h2>
        <form action="process_register.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rôle :</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="vendeur">Vendeur</option>
                    <option value="loueur">Loueur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
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
