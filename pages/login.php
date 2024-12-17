<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>W&R | Login</title>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main>
        <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
        <?php
            if (isset($_GET['error'])) {
                echo "<p style='color: red;'>Invalid email or password.</p>";
            }
       ?>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </main>
    
    <?php include'../includes/footer.php'; ?>
</body>
</html>