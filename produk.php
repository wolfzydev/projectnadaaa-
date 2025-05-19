<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Data produk (simulasi)
$produk_data = [
    "cupcake" => ["nama" => "Cupcake", "harga" => 25000],
    "ice_cream" => ["nama" => "Es Krim", "harga" => 20000],
    "donat" => ["nama" => "Donat", "harga" => 15000]
];

// Proses pembelian
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['produk_id'])) {
    $id = $_POST['produk_id'];
    if (isset($produk_data[$id])) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
        header("Location: cart.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk Toko Nadaa</title>
    <link rel="stylesheet" href="produk.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Produk Toko Nadaa 💖</h1>
        <div class="produk-list">
            <!-- Cupcake -->
            <div class="produk-item">
                <img src="https://img.icons8.com/ios/50/ff4d6d/cupcake.png" alt="Cupcake" class="produk-img">
                <h3>Cupcake</h3>
                <p>Harga: Rp 25.000,-</p>
                <form method="POST">
                    <input type="hidden" name="produk_id" value="cupcake">
                    <button type="submit" class="beli-btn">Beli Sekarang</button>
                </form>
            </div>
            <!-- Es Krim -->
            <div class="produk-item">
                <img src="https://img.icons8.com/ios/50/ff4d6d/ice-cream-cone.png" alt="Es Krim" class="produk-img">
                <h3>Es Krim</h3>
                <p>Harga: Rp 20.000,-</p>
                <form method="POST">
                    <input type="hidden" name="produk_id" value="ice_cream">
                    <button type="submit" class="beli-btn">Beli Sekarang</button>
                </form>
            </div>
            <!-- Donat -->
            <div class="produk-item">
                <img src="https://img.icons8.com/ios/50/ff4d6d/doughnut.png" alt="Donat" class="produk-img">
                <h3>Donat</h3>
                <p>Harga: Rp 15.000,-</p>
                <form method="POST">
                    <input type="hidden" name="produk_id" value="donat">
                    <button type="submit" class="beli-btn">Beli Sekarang</button>
                </form>
            </div>
        </div>
        <div class="menu">
            <a href="dashboard.php" class="kembali-btn">Kembali ke Menu</a>
        </div>
    </div>
</body>
</html>
