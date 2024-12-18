<?php 
include '../includes/database.php';
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $confirmPas = $_POST['confirmPassword'];
    
    $sql = "SELECT * FROM users WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<script> isExist = true;</script>";
        return;
    }
    if(strlen($password) < 8 || strlen($password) > 20){
        echo "Password must be between 8 and 20 characters long";
        exit;
    }
    if($password!== $confirmPas){
        echo "Passwords do not match";
        exit;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (Name, Email, Password) VALUES ('$userName', '$email', '$hashedPassword')";
    mysqli_query($conn, $sql);
    echo "Registration successful";


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>W&R | Sign up</title>
</head>
<body>
<?php include '../includes/header.php'; ?>
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
<script src="../js/signup.Js"></script>   
</body>
</html>