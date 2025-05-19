<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css"> <!-- Link ke login.css -->
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <?php if (!empty($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
