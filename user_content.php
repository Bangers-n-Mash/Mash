<?php

session_start();

include('includes/header.php');
include('includes/connect_DB.php')

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
                <h2 class="fw-bolder">USERNAMEHERE's Projects</h2>  
                

                <p class="lead mb-0">Have a look at USERNAMEHERE'S current collaborative projects.</p>
                <a href="user.php" role="button"  style=" background-color: #212529" class="btn btn-primary btn-md float-start">Back</a>
            </div>

         
        </div>
    

    


    <section class="py-2 ">
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



 </section>








 </body>









         
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>


<html>
<?php

include('includes/footer.php');

?>

