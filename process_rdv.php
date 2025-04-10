<?php
include 'inc/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id'])) {
        die("Erreur: L'ID de l'annonce est requis.");
    }

    $annonce_id = $_POST['id'];

    try {
        $stmt = $pdo->prepare("INSERT INTO rdv (id) VALUES (?)");
        $stmt->execute([$id]);
        echo "Votre rendez vous est validé";
    } catch (PDOException $e) {
        die("Erreur lors dede la prise de rendez vous : " . $e->getMessage());
    }
} else {
    echo "Méthode HTTP non autorisée.";
}
?>