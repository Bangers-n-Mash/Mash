<?php

session_start();

if (isset($_SESSION['accountID'])) {
    include('includes/header_loggedin.php');
} else {
    include('includes/header.php'); 
}

?>

    <div class="row">
        <div class="image-block col-sm-4" style="background: url(img/city1.jpg) no-repeat center top;background-size:cover;">
            <p> Image Info </p>
        </div>
        <div class="image-block col-sm-8" style="background: url(img/city2.jpg) no-repeat center top;background-size:cover;">
            <p> Image Info </p>
        </div>
        <div class="image-block col-sm-4" style="background: url(img/city3.jpg) no-repeat center top;background-size:cover;">
            <p> Image Info </p>
        </div>
        <div class="image-block col-sm-4" style="background: url(img/city4.jpg) no-repeat center top;background-size:cover;">
            <p> Image Info </p>
        </div>
        <div class="image-block col-sm-4" style="background: url(img/city5.jpg) no-repeat center top;background-size:cover;">
            <p> Image Info </p>
        </div>
        <div class="image-block col-sm-8" style="background: url(img/city6.jpg) no-repeat center top;background-size:cover;">
            <p> Image Info </p>
        </div>
        <div class="image-block col-sm-4" style="background: url(img/city7.jpg) no-repeat center top;background-size:cover;">
            <p> Image Info </p>            
        </div>
    </div>

<?php

include('includes/footer.php');

?>