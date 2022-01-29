<?php

session_start();

include('includes/connect_DB.php');

include('includes/header.php');

?>
<div class="input">

    <!DOCTYPE html>
    <html>

    <body>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>

    </body>

    </html>

    <?php

    /*
    //insert into database
    $sql = "INSERT INTO content (content_id, content_type, title, description, likes)
        VALUES ('2', 'picture', 'pretzel', 'I am a pretzel', '0');";

    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    */

    /*
    //extract data from databse, broken
    $sql = "SELECT  `content_id`,  `content_type`,  `title`, LEFT(`description`, 256),  `likes` FROM `mash`.`content";
    $result = mysqli_query($link, $sql);
        
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "title: " . $row["title"], "<br>";
        } else {
        echo "0 results";
        }
    */

    ?>

</div>

<?php

include('includes/footer.php');

mysqli_close($link);

?>