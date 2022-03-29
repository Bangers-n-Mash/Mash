<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Mash Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="admin/css/styles.css">
    <link rel="stylesheet" href="css/login-register.css">

</head>

<body class="text-center">
    <?php
    require('includes/connect_DB.php');
    session_start();
    
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['inputPassword']);

    $query = "SELECT * FROM 'artAccount' WHERE username='$username' AND password='" . md5($password) ."'";
    $result = mysqli_query($link, $query) or die(my_sql_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1){
        $_SESSION['username'] = $username;
    }
    else{
        echo "<div class='form'>
        <h3>Incorrect Username/password.</h3><br/>
        
        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>

        </div>";
    }

    ?>


    <form class="form-signin" action = "" method="post">
        <a href="index.php"><img class="logo" style="height: 100px; width: 200px;" src="img/Logo.png" alt="Mash"></a>
        <h1 class="h3 mb-3 font-weight-normal">Become a masher, <a href="register.php" style="color:grey; text-decoration:none;">Sign up</a> </h1>
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
</body>

</html>