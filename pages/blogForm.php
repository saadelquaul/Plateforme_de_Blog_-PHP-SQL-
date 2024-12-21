<?php

include '../includes/database.php';
$sql = "SELECT * FROM tags";
$result = $conn->query($sql);
$option="";
if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()){
        $option .= "<option value='".$row['tagID']."'>".$row['tagName']."</option>";
    }
}
else {
    $option = "<option> No tags found</option>";
}
?>


<form  action="blog-feed.php" method="post">
                    <label for="title">Title:</label> 
                    <input type="text" id="title" name="title">
                    <label for="tags">Tags:</label>
                    <select name="tags" id="tags">
                        <?php
                            echo $option;
                        ?>
                    </select>
                    <label for="image">
                        IMAGE:
                    </label>
                    <input type="file" id="image" name="image">
                    <label for="content">Content:</label>
                    <textarea name="content" id="content" placeholder="Write your toughts here.."></textarea>

                    <button type="submit">Submit</button>
</form>
