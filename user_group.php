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
<section class="bg-light py-1 border-bottom">
    
        <div class="container px-3 my-3">
            <div class="text-center mb-5">
                
                <h2 class="fw-bolder">Collaborative Groups</h2>  
                

                <p class="lead mb-0">Here is a list of what groups you are in.</p>


                <a href="user.php" role="button"  style=" background-color: #212529" class="btn btn-primary btn-md float-start">Back</a>
                <a href="group_cj.php" role="button" style=" background-color: #212529" class="btn btn-primary btn-md float-end">Create/Join Group</a>
            </div>

         
        </div>
    

    


    <section class="py-2 border-bottom">
    <div class="row gx-3 justify-content-center">
    <div class ="card">
        <div class="card-body">
            <h5 class ="text-center"> No groups found </h5>
            <div class="overflow-auto">
            
            <!---this text here should effectively be put in the php script if there are no groups found for the user.  -->
            <p class ="text-center">Looks like you aren't part of any groups yet. Click the "Create/Join Group" button on the top right of your screen to create or join one now. </p>

            <!-- php script needed that gets all groups user is a part of, and outputs them here as links (links to the same dynamic webpage but will need the groups name and id passed into the webpage).
            if needed it can also pull in images -->







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

