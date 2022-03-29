<?php

session_start();

include('includes/header.php');
include('includes/connect_DB.php')

?>
<!doctype html>
<html lang="en">

<head>

<style>img 
{
   width: auto;
   height: 225px;
  max-height: 225px;
   margin: auto;
} 
.carousel-control-prev-icon,
.carousel-control-next-icon {
 
  width: 30%;
  outline: black;

}

.carousel-control-next-icon:after
{
  content: '>';
  font-size: 55px;
  color: black;
}

.carousel-control-prev-icon:after {
  content: '<';
  font-size: 55px;
  color: black;
}




</style>

</head>

<body>
<section class="bg-light py-1">
    
        <div class="container px-3 my-3">
            <div class="text-center mb-5">
                
            <!-- script needed here -->
            <php? 
            $q = "SELECT accountID FROM artAccount WHERE username='$u'";
            echo "<h2 class="fw-bolder">" . $_currentGroup ."Profile</h2>";
            ?>
            
                <h2 class="fw-bolder">GROUP's Profile</h2>  
                

                <p class="lead mb-0">Here are GROUPNAMES projects and members</p>
                <a href="user_group.php" role="button"  style=" background-color: #212529" class="btn btn-primary btn-md float-start">Back</a>
            
            </div>

         
        </div>
    

    


    <section class="py-2 ">

    <div class="row gx-1 justify-content-center">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" >
            <div class="carousel-item active">
            <img class="d-block w-10 img-fluid" src="img/city1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-10 img-fluid" src="img/city2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-10 img-fluid" src="img/city3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>


<div class="container px-3 my-3">
<div class="row gx-1 justify-content-center">

<h1 class="text-center"> Members </h1>
<!-- scripting getting members of chosen group, idk if you want to make it linkable to their profiles or just list them here. -->
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

