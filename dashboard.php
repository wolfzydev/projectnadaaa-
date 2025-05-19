<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil nama user
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Hai, <?php echo htmlspecialchars($username); ?>! 🧁</h1>
        <p>Selamat datang di Toko Nadaa💖</p>

        <div class="menu">
    <a href="produk.php">🛍️ Produk</a>
    <a href="transaksi.php">🧾 Transaksi</a>
    <a href="profil.php">👤 Profil</a>
    <a href="logout.php">🚪 Logout</a>
</div>

    </div>
</body>
</html>
