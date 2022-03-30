<?php
session_start();

if (isset($_SESSION['accountID'])) {
    include('includes/header_loggedin.php');
} else {
    header("Location: /login.php");
}

?>

<section class="bg-light py-1">
    
        <div class="container px-3 my-3">
            <div class="text-center mb-5">
            <?php
                echo "<h2 class='fw-bolder'> ".$_SESSION['username']."'s Profile</h2>";
            ?>  
                <p class="lead mb-0">Here, you will be able to manage your account, check what groups you are in, and what projects you are undertaking.</p>
            </div>
        </div>

    <section class="py-2 ">
        <div class="row gx-1 justify-content-center">
            <div class="col-lg-5">  
                    <!-- Testimonial 1-->
                <div class="card mb-3">
                    <a href="user_settings.php" role="button" style=" background-color: #212529" class="btn btn-primary btn-lg">Account Settings</a>
                    <a href="user_group.php" role="button" style=" background-color: #212529" class="btn btn-primary btn-lg">Groups</a>
                    <a href="group_cj.php" role="button" style=" background-color: #212529" class="btn btn-primary btn-lg">Projects</a>
                </div>
                    <!-- Testimonial 2-->
            </div>
        </div>
    </section>

</section>

<?php

include('includes/footer.php');

?>

