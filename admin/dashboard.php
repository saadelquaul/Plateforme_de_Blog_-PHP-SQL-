<?php
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 'admin'){
        echo "<h1>Dashboard</h1>";
        echo "<p>Welcome Admin</p>";
    }
    else{
        header("Location: ../pages/index.php");
        exit();
    }
}
else{
    header("Location: ../pages/index.php");
    exit();
}


?>