<?php

session_start();


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  # Connect to the database.
  require('includes/connect_DB.php');

  # Initialize an error array.
  $errors = array();

  # Check for a username.
  if (empty($_POST['inputUsername'])) {
    $errors[] = 'Enter your username.';
  } else {
    $u = mysqli_real_escape_string($link, trim($_POST['inputUsername']));
  }

  # Check for a first name.
  if (empty($_POST['forename'])) {
    $errors[] = 'Enter your forename.';
  } else {
    $fn = mysqli_real_escape_string($link, trim($_POST['forename']));
  }

  # Check for a last name.
  if (empty($_POST['surname'])) {
    $errors[] = 'Enter your surname.';
  } else {
    $ln = mysqli_real_escape_string($link, trim($_POST['surname']));
  }

  # Check for a date of birth.
  if (empty($_POST['birthday'])) {
    $errors[] = 'Enter your birthday.';
  } else {
    $bd = mysqli_real_escape_string($link, trim($_POST['birthday']));
  }

  # Check for an email address:
  if (empty($_POST['inputEmail'])) {
    $errors[] = 'Enter your email address.';
  } else {
    $e = mysqli_real_escape_string($link, trim($_POST['inputEmail']));
  }

  # Check for a password and matching input passwords.
  if (!empty($_POST['inputPassword'])) {
    if ($_POST['inputPassword'] != $_POST['inputConfirmPassword']) {
      $errors[] = 'Passwords do not match.';
    } else {
      $p = mysqli_real_escape_string($link, trim($_POST['inputPassword']));
    }
  } else {
    $errors[] = 'Enter your password.';
  }

  # Check if username/email address already registered.
  if (empty($errors)) {
    $q = "SELECT accountID FROM artAccount WHERE username='$u'";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) $errors[] = 'Username already registered. <a href="login.php">Login</a>';
  }
  
  if (empty($errors)) {
    $q = "SELECT accountID FROM artAccount WHERE email='$e'";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) $errors[] = 'Email address already registered. <a href="login.php">Login</a>';
  }


  $cd = mysqli_real_escape_string($link, trim(date('y-m-d')));

  # On success register user inserting into 'artAccount' database table.
  if (empty($errors)) {
    echo 'Some random text';
    $q = "INSERT INTO artAccount(username, accountPassword, forename, surname, email, account_type, creation_date, dateOfBirth) VALUES ('$u', SHA2('$p',256), '$fn', '$ln', '$e', '1', '$cd', '$bd')";
    $r = @mysqli_query($link, $q);
    echo 'Some random text';
    if ($r) {
      header("Location: index.php");
    }

    # Close database connection.
    mysqli_close($link);

    exit();
  }
  # Or report errors.
  else {
    echo '<div class="container">
			<div class="alert alert-primary alert-dismissible fade show" role="alert">
			<h1>Error!</h1>
			<p id="err_msg">The following error(s) occurred:<br>';
    foreach ($errors as $msg) {
      echo " - $msg<br>";
    }
    echo '<hr>
			<p class="mb-0">Please try again.</p>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		   </div>
		  </div>';
    # Close database connection.
    mysqli_close($link);
  }
}
?>  

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
    <form class="form-signin"  action="register.php" method="post">
        <a href="index.php"><img class="logo" style="height: 100px; width: 200px;" src="img/Logo.png" alt="Mash"></a>
        <h1 class="h3 mb-3 font-weight-normal">Already have an account? <a href="login.php" style="color:grey; text-decoration:none;">Sign in</a> </h1>
        </h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" class="form-control" id="inputUsername" name="inputUsername" placeholder="Enter Username" size="50" required value="<?php if (isset($_POST['inputUsername'])) echo $_POST['inputUsername']; ?>">

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Enter Email" size="50" required value="<?php if (isset($_POST['inputEmail'])) echo $_POST['inputEmail']; ?>">

        <label for="forename" class="sr-only">Forename</label>
        <input type="text" class="form-control" id="forename" name="forename" placeholder="Enter First Name" size="20" required value="<?php if (isset($_POST['forename'])) echo $_POST['forename']; ?>">

        <label for="surname" class="sr-only">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Last Name" size="20" required value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Create Password" size="20" required">
        
        <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
        <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password" size="20" required">
        
        <label for="dateOfBirth" class="sr-only"> Date of Birth</label>
        <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Day" required>

        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
</body>

</html>