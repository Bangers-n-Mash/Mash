<?php

session_start();

include('includes/header.php');
//include('includes/connect_DB.php')








?>
<!doctype html>
<html lang="en">

<head>

</head>

<body>
<section class="bg-light py-1">
    
        <div class="container px-3 my-3">
            <div class="text-center mb-5">
                
            <!-- script needed here -->
                <h2 class="fw-bolder">USERNAMEHERE's Profile</h2>  
                

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








 </body>









         
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>


<html>
<?php

include('includes/footer.php');

?>

