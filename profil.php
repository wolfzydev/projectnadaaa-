<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Kamu</title>
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    <div class="container">
        <h1>✨ Profil Kamu ✨</h1>
        <div class="profile-card">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Status:</strong> Member aktif 💕</p>
            <p><strong>Level:</strong> Pelanggan Imut 🧁</p>
        </div>

        <div class="menu">
            <a href="dashboard.php" class="kembali-btn">Kembali ke Menu</a>
        </div>
    </div>
</body>
</html>
