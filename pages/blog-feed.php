<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>W&R | Blog Feed</title>
</head>
<body>
    <?php include '../includes/header.php' ?>
    <main>
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
                <article class="blog-card">
                    <img src="thumbnail1.jpg" alt="Article Image">
                    <h2>Article Title 1</h2>
                    <span class="category-badge">Tech</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    <a href="#read-more">Read More</a> <p class="time">
                </article>
                <article class="blog-card">
                    <img src="thumbnail2.jpg" alt="Article Image">
                    <h2>Article Title 2</h2>
                    <span class="category-badge">Health</span>
                    <p>Nulla facilisi. Donec tincidunt lacus eu urna suscipit...</p>
                    <a href="#read-more">Read More</a>
                </article>
                
            </div>
        </section>


    </main>
    <?php include '../includes/footer.php'?>
</body>
</html>