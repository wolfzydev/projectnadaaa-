<?php
session_start();

// Dummy user data
$users = [
    "admin" => "123",
    "nadaa" => "123"
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah, coba lagi yaa 💔";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px 15px;
            border: 2px solid #f4a261;
            border-radius: 8px;
            font-size: 14px;
            width: 100%;
        }

        .error {
            color: #e63946;
            font-size: 14px;
            margin-top: 10px;
        }

        .btn-login {
            background-color: #e07a5f;
        }

        .btn-login:hover {
            background-color: #d66b4f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🍬 Login 🍬</h1>

        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username imutmu..." required>
            <input type="password" name="password" placeholder="Password rahasia..." required>
            <button type="submit" class="btn-login">💖 Masuk Sekarang 💖</button>
        </form>
    </div>
</body>
</html>
