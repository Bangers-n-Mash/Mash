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