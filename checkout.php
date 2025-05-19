<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Konfigurasi Database
$servername = "localhost"; // Ganti dengan server Anda
$username = "root"; // Ganti dengan username DB Anda
$password = ""; // Ganti dengan password DB Anda
$dbname = "toko_nadaa"; // Nama database

// Koneksi ke Database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
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

// Jika form di-submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_SESSION['username'];
    
    foreach ($cart as $id => $jumlah) {
        $produk = $produk_data[$id];
        $subtotal = $jumlah * $produk['harga'];
        $total += $subtotal;
        
        // Simpan data transaksi ke dalam database
        $stmt = $conn->prepare("INSERT INTO transaksi (username, produk, jumlah, total) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $username, $produk['nama'], $jumlah, $subtotal);
        $stmt->execute();
    }

    // Clear keranjang setelah checkout
    unset($_SESSION['cart']);

    echo "<script>alert('Checkout berhasil! Terima kasih sudah berbelanja.'); window.location.href='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>
    <div class="container">
        <h1>💖 Checkout Belanjaanmu</h1>

        <?php if (empty($cart)): ?>
            <p>Keranjangmu kosong, sayang 😢</p>
            <a href="produk.php" class="btn">🛍️ Belanja Sekarang</a>
        <?php else: ?>
            <form method="POST">
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
                <button type="submit" class="btn">💸 Bayar Sekarang</button>
            </form>
        <?php endif; ?>

        <br>
        <a href="dashboard.php" class="btn">🏠 Kembali ke Menu</a>
    </div>
</body>
</html>
