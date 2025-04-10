<?php
session_start();
include 'inc/database.php';  

$stmt = $pdo->prepare("SELECT * FROM annonces");
$stmt->execute();
$annonces = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualisation des annonces - Brocéliande Immo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Annonces disponibles</h1>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="add_annonce.php" class="btn btn-success mb-4">Ajouter une nouvelle annonce</a>
        <?php endif; ?>
        
        <?php if (empty($annonces)): ?>
            <p>Aucune annonce disponible.</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($annonces as $annonce): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($annonce['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($annonce['title']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($annonce['title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($annonce['description']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>


