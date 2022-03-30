<?php

session_start();

include('includes/connect_DB.php');

if (isset($_SESSION['accountID'])) {
    include('includes/header_loggedin.php');
} else {
    header("Location: /login.php");
}

?>

    <section class="bg-light py-1">
        <div class="container px-3 my-3">
            <div class="text-center mb-5">

                <!-- script needed here -->
                <?php
                echo "<h2 class='fw-bolder'>" . $_SESSION['username'] . "'s Projects</h2>";
                echo "<p class='lead mb-0'>Have a look at " . $_SESSION['username'] . "'s current collaborative projects.</p>";
                ?>
            </div>
        </div>
    </section>




    <section>
        <!--pull content from database, put this as a placeholder however if it is possible, put data straight into the fluid tables. -->
        <div class="row gx-1 justify-content-center">
            <div class="container-fluid" style="min-height:100%;">
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
            </div>
        </div>
    </section>

<?php

include('includes/footer.php');

?>