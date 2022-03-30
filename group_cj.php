<?php

session_start();

include('includes/header.php');
include('includes/connect_DB.php')

?>
<body class="text-center">
<section class="bg-light py-1 border-bottom">
    <a href="user_group.php" role="button"  style=" background-color: #212529" class="btn btn-primary btn-md float-start">Back</a>
    <div class="container px-3 my-3">        
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Create </h2>  
            <p class="lead mb-0">Create a group.</p>
            <div class="card-body">
            <div class="overflow-auto">
            <body>
                <form action="group_cjscript.php" method="POST" class="form-signin">
                    <div class="col-xs-3">
                        <label for="groupName" class="sr-only">Group Name</label>
                        <input type="groupName" id="groupName" class="form-control" placeholder="Group Name" required autofocus>
                    </div>
                    <div class="col-xs-3">
                        <label for="groupPicture" class="sr-only">Group Profile Picture</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" name ="submit" type="submit">Register</button>
                </form>
            </div>
        </div>
   </section>
 </body>









         
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>


<html>
<?php

include('includes/footer.php');


?>

