<?php

session_start();

include('includes/connect_DB.php');

$entry = "INSERT INTO content (content_id, content_type, title, description, likes)
        VALUES ('21', 'picture', 'pretzel', 'I am a pretzel', '0');";
if (mysqli_query($link, $entry)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $entry . "<br>" . mysqli_error($link);
}

mysqli_close($link);

?>