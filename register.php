<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Mash Register</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="admin/css/styles.css">
    <link rel="stylesheet" href="css/login-register.css">

</head>

<body class="text-center">
    <form class="form-signin" action="includes/signup.php" method="POST">
        <a href="index.php"><img class="logo" style="height: 100px; width: 200px;" src="img/Logo.png" alt="Mash"></a>
        <h1 class="h3 mb-3 font-weight-normal">Already have an account? <a href="login.php" style="color:grey; text-decoration:none;">Sign in</a> </h1>
        </h1>
        <label for="firstName" class="sr-only">First name</label>
        <input name="firstname" type="text" id="firstName" class="form-control" placeholder="First name" required autofocus>
        <label for="lastName" class="sr-only">Last name</label>
        <input name="lastname" type="text" id="lastName" class="form-control" placeholder="Last name" required>
        <label for="inputUsername" class="sr-only">Username</label>
        <input name="username" type="username" id="inputUsername" class="form-control" placeholder="Username" required>
        <label for="email" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
        <input name="password2" type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>

        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
</body>

</html>