<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi</title>
    <link rel="stylesheet" href="transaksi.css">
</head>
<body>
    <div class="container">
        <h1>Riwayat Transaksi Kamu💸</h1>

        <table class="transaksi-table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh data dummy -->
                <tr>
                    <td>2025-04-29</td>
                    <td>Donat🍩</td>
                    <td>2</td>
                    <td>Rp 30.000</td>
                </tr>
                <tr>
                    <td>2025-04-28</td>
                    <td>Cupcake🧁</td>
                    <td>1</td>
                    <td>Rp 25.000</td>
                </tr>
            </tbody>
        </table>

        <div class="menu">
            <a href="dashboard.php" class="kembali-btn">Kembali ke Menu</a>
        </div>
    </div>
</body>
</html>
