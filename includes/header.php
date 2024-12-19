<?php
session_start();
 ?>
<header>
    <nav class="navbar">
        <div class="logo"><img src="../assets/images/logo2.png" alt="Write and Read Logo"></div>
        <ul class="nav-links">
            <li><a href="../pages/index.php">Home</a></li>
            <li><a href="../pages/blog-feed.php">Blogs</a></li>
        </ul>
        <ul class="nav-links">
            <?php if(!isset($_SESSION['role'])): ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Register</a></li>
            <?php else: ?>
            <li><a href="../pages/profile.php">Profile</a></li>
            <li><a href="../pages/logout.php">Logout</a></li>
            <?php endif; ?>
        </ul>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
           echo " <ul class='nav-links'>
                <li><a href='../admin/dashboard.php'>Dashboard</a></li>
            </ul>";
        } ?>

    </nav>
</header>