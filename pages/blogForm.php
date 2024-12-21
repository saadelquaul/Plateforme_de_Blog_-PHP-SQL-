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

                    <select name="tags" id="tags">
                        <?php
                            echo $option;
                        ?>
                    </select>
