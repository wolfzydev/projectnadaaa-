<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Data produk referensi
$produk_data = [
    "cupcake" => ["nama" => "Cupcake", "harga" => 25000],
    "ice_cream" => ["nama" => "Es Krim", "harga" => 20000],
    "donat" => ["nama" => "Donat", "harga" => 15000]
];

// Ambil keranjang
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <div class="container">
        <h1>🧺 Keranjang Belanja</h1>

        <?php if (empty($cart)): ?>
            <p>Keranjangmu masih kosong, sayang 😢</p>
            <a href="produk.php" class="btn">🛍️ Belanja Sekarang</a>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $id => $jumlah): 
                        $produk = $produk_data[$id];
                        $subtotal = $jumlah * $produk['harga'];
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td><?= $produk['nama'] ?></td>
                        <td><?= $jumlah ?></td>
                        <td>Rp<?= number_format($produk['harga'], 0, ',', '.') ?></td>
                        <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></td>
                    </tr>
                </tfoot>
            </table>
            <div class="cart-buttons">
                <a href="produk.php" class="btn">➕ Tambah Produk</a>
                <a href="checkout.php" class="btn">💸 Checkout</a>
            </div>
        <?php endif; ?>
        <br>
        <a href="dashboard.php" class="btn">🏠 Kembali ke Menu</a>
    </div>
</body>
</html>
