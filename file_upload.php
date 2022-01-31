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
            <br>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" placeholder="Title">
            <br>
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" columns="50">File description...</textarea>
            <br>
            <input type="submit" value="Submit and Upload" name="submit">

        </form>

    </body>

    </html>

</div>

<?php

include('includes/footer.php');

mysqli_close($link);

?>