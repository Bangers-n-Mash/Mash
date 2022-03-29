<?php # PROCESS LOGIN ATTEMPT.

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Open database connection.
  require ( 'connect_DB.php' ) ;

  # Get connection, load, and validate functions.
  require ( 'login_tools.php' ) ;

  # Check login.
  list ( $check, $data ) = validate ( $link, $_POST[ 'username' ], $_POST[ 'inputPassword' ] ) ;

  # On success set session data and display logged in page.
  if ( $check )  
  {
    # Access session.
    session_start();
    $_SESSION[ 'accountID' ] = $data[ 'accountID' ] ;
    $_SESSION[ 'username' ] = $data[ 'username' ] ;
    $_SESSION[ 'accountPassword' ] = $data[ 'accountPassword' ] ;
    $_SESSION[ 'forename' ] = $data[ 'forename' ] ;
    $_SESSION[ 'surname' ] = $data[ 'surname' ] ;
    $_SESSION[ 'email' ] = $data[ 'email' ] ;
    $_SESSION[ 'account_type' ] = $data[ 'account_type' ] ;
    $_SESSION[ 'creation_date' ] = $data[ 'creation_date' ] ;   
    $_SESSION[ 'dateOfBirth' ] = $data[ 'dateOfBirth' ] ;
    load ( '../user_content.php' ) ;
  }
  # Or on failure set errors.
  else { $errors = $data; } 

  # Close database connection.
  mysqli_close( $link) ; 
}

# Continue to display login page on failure.
load ( '../login.php' ) ;
