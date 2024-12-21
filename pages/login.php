<?php 

include '../includes/database.php';
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("SELECT Password FROM users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0){
    
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        if(password_verify($password,$hashedPassword))
        {
            session_start();
            $_SESSION['email'] = $email;
            $sql = "SELECT * FROM users WHERE Email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['role'] = $row['role'];
            $_SESSION['userID'] = $row['userID'];
            if($row['role'] == 'admin'){
                header("Location:../admin/dashboard.php");
                exit();
            }
            else{
                header("Location:index.php");
                exit();
            }
        }
        else{
            header("Location: login.php?error=true");
            exit();
        }


    }
}


?>


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
        <div class="Alert">
            <p class="Alert">lala</p>
        </div>
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