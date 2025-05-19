<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sampai Jumpa! 🍭</title>
    <link rel="stylesheet" href="logout.css">
    <meta http-equiv="refresh" content="4;url=login.php"> <!-- Auto redirect ke login -->
</head>
<body>
    <div class="container">
        <h1>💖 Sampai Jumpa, Pelanggan imutt💖</h1>
        <p>Semoga harimu manis kayak donat stroberi~ 🍩✨</p>
        <p>Kamu akan diarahkan ke halaman login sebentar lagi yaa... 😘</p>
    </div>
</body>
</html>
