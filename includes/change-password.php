<?php

session_start();

if(isset($_SESSION['accountID']) ){
    include('includes/header_loggedin.php');
} else {
    header("Location: ../login.php");
}

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Connect to the database.
  require ('connect_DB.php'); 
  
  # Initialize an error array.
  $errors = array();
  # Check for an email address:
  if ( empty( $_POST[ 'email' ] ) )
  { $errors[] = 'Enter your email address.'; }
  else
  { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }
  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }
  
  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT * FROM artaccount WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    
  }
  
  # On success new password into 'users' database table.
  if ( empty( $errors ) ) 
  {
    $hashedPassword = password_hash($_POST[ 'pass1' ], PASSWORD_DEFAULT);
    $q = "UPDATE artaccount SET accountPassword='$hashedPassword' WHERE email='$e'";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {
       header("Location: ../logout.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }
  
    # Close database connection.
    
	mysqli_close($link); 
    exit();
  }
  # Or report errors.
  else 
  {  
    echo ' <div class="container"><div class="alert alert-dark alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
	<h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</div></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}

?>