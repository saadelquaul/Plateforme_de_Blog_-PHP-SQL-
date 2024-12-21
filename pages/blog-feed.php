<?php
include '../includes/database.php';
if(isset($_POST['title'])){
    session_start();
    $title = $_POST['title'];
    $category = $_POST['tags'];
    $content = $_POST['content'];
    echo $content;
    $image = $_POST['image'];
    $userId = $_SESSION['userID'];

    $sql = "INSERT INTO blogs (authorID, title, content, image,category) VALUES ($userId, '$title', '$content', '$image', '$category')";
    if($conn->query($sql) === TRUE){
        echo "Article added successfully";
        header("Location: blog-feed.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: blog-feed.php");
    exit();
}
if(isset($_POST['EditedArticleId'])){
    $EditedArticleID = intval($_POST['EditedArticleId']);
    $title = $conn->real_escape_string($_POST['Editedtitle']);
    $content = $conn->real_escape_string($_POST['Editedcontent']);
    $category = intval($_POST['tags']);
    $image = $_POST['Editedimage'];
    $sql = "UPDATE blogs SET title = '$title', content = '$content', category = '$category' WHERE blogID = $EditedArticleID";
    if($conn->query($sql) === TRUE){
        header("Location: blog-feed.php");
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if($image != ""){
        $sql = "UPDATE blogs SET image = '$image' WHERE blogID = $EditedArticleID";
        if($conn->query($sql) === TRUE){
            header("Location: blog-feed.php");
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $_POST['EditedArticleId'] = null;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>W&R | Blog Feed</title>
</head>
<body>
    <?php include '../includes/header.php' ?>
    <main>
        <div class="blog-feed-header">
            <h1>Blog Feed</h1>
            
            <div class="search-bar">
                <input type="text" placeholder="Search Articles">
                <button>Search</button>
            </div>
            <div class="sort-by">
                <label for="sort">Sort by:</label>
                <select name="sort" id="sort">
                    <option value="newest">Newest</option>
                    <option value="oldest">Oldest</option>
                </select>
            </div>
            <div>
                <button class="add-article">Add New Article</button>
            <!-- <a href="add-article.php"></a> -->
            </div>
        </div>
        <hr>
        
        <section class="blog-feed">
            <div class="filter">
                <h3>Filter by Category</h3>
                <ul>
                    <li><a href="#category-tech">Tech</a></li>
                    <li><a href="#category-health">Health</a></li>
                    <li><a href="#category-lifestyle">Lifestyle</a></li>
                </ul>
            </div>
            
            <div class="articles">
                <?php
                $sql = "SELECT * FROM blogs";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<article class='blog-card' data-id='".$row['blogID']."'>";
                        $image = base64_encode($row['image']);
                        echo "<img src='data:image/jpeg;base64," . $image . "' alt='Article Image'>";
                        $author = $conn->query("SELECT Name FROM users WHERE userID = ".$row['authorID']."");
                        $author = $author->fetch_assoc();
                        echo "<h2>".$row['title']." </h2> <p> by <span>".$author['Name']."</span></p>";
                        $tag = $conn->query("SELECT tagName FROM tags WHERE tagID = ".$row['category']."");
                        $tag = $tag->fetch_assoc();
                        echo "<span class='category-badge'>".$tag['tagName']."</span>";
                        if(!empty($row['content'])){
                            $content = substr($row['content'], 0, 100);
                            echo "<p class='content'>".$content."</p>";
                        }
                        echo "<div style='display:flex;align-self:end; justify-content:space-between;'>
                        <a href='#read-more'>Read More</a>
                        <div class='comments'>
                            <span>Comments</span>
                            <span>0</span>
                        </div>
                        <div class='likes'>
                            <span>Likes</span>
                            <span>0</span>
                        </div>
                        </div>";
                        if(isset($_SESSION['userID'])){
                            if($_SESSION['userID'] == $row['authorID'])
                            echo "<div style='display:flex;place-self:end;gap:4px; justify-content'>
                            <button class='edit-article' data-id='".$row['blogID']."'>Edit</button>
                            <button class='delete-article' data-id='".$row['blogID']."'>Delete</button>
                                    ";
                        }
                        echo "</article>";
                    }
                }
                 ?>
                
            </div>
        </section>


    </main>
    <?php include '../includes/footer.php'?>
    <script src="../js/signup.js"></script>
</body>
</html>