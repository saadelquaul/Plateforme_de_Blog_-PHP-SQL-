<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>W&R | Sign up</title>
</head>
<body>
<?php include'../includes/header.php'; ?>
    <main>
        <div class="container">
            <h2>Sign up</h2>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text"  id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email"  id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password"  id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password"  id="confirmPassword" name="confirmPassword" required>
                    <small id="passwordHelp" class="text-muted">Must be 8-20 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.</small>
                </div>
                <button type="submit">Sign up</button>
                <a href="login.php" >Already have an account? Login here.</a>

            </form>
        </div>
    </main>
<?php include'../includes/footer.php'; ?>    
</body>
</html>