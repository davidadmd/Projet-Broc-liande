<?php
include 'inc/database.php'; 

echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Brocéliande Immo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger">Adresse email non valide.</div>';
        exit;
    }

    if (empty($password) || strlen($password) < 6) {
        echo '<div class="alert alert-danger">Le mot de passe doit contenir au moins 6 caractères.</div>';
        exit;
    }

    if (!in_array($role, ['vendeur', 'loueur'])) {
        echo '<div class="alert alert-danger">Rôle non valide.</div>';
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");

    try {
        $stmt->execute([$email, $hashed_password, $role]);
        echo '<div class="alert alert-success">Inscription réussie. <a href="login.php">Connectez-vous ici</a>.</div>';
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            echo '<div class="alert alert-warning">Cet email est déjà utilisé. Veuillez en choisir un autre.</div>';
        } else {
            echo '<div class="alert alert-danger">Erreur lors de l\'inscription: ' . $e->getMessage() . '</div>';
        }
    }
} else {
    echo '<div class="alert alert-info">Méthode HTTP non autorisée. Retournez à la <a href="register.php">page d\'inscription</a>.</div>';
}

echo '</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>';
?>
