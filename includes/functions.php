<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use LDAP\Result;

function emptyInput($input)
{
    if (empty($input)) {
        return "emptyinput";
    }
    return "";
}

function validEmail($email)
{
    if ((bool) emptyInput($email)) {
        return "emptyinput";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "invalidemail";
    }
    return "";
}

function passwordMatch($password, $password2)
{
    if ((bool) emptyInput($password) || (bool) emptyInput($password2)) {
        return "emptyinput";
    }
    if ($password !== $password2) {
        return "pwdmismatch";
    }
    return "";
}

function exists($dbConn, $username, $email)
{
    $query = "SELECT * FROM artaccount WHERE username = ? OR email = ?;";
    $preparedStmt = mysqli_stmt_init($dbConn);

    if (!mysqli_stmt_prepare($preparedStmt, $query)) {
        header("location: ../index.php?error=inputerror");
        mysqli_stmt_close($preparedStmt);
        exit();
    }

    mysqli_stmt_bind_param($preparedStmt, "ss", $username, $email);
    mysqli_stmt_execute($preparedStmt);
    $queryResult = mysqli_stmt_get_result($preparedStmt);

    if ($row = mysqli_fetch_assoc($queryResult)) {
        mysqli_stmt_close($preparedStmt);
        return $row;
    }
    mysqli_stmt_close($preparedStmt);
    return false;
}

function createUser($dbConn, $firstname, $lastname, $username, $email, $password, $password2)
{
    $errorPath = "";
    $error = emptyInput($firstname);
    if (!empty($error)) {
        $errorPath .= empty($errorPath) ? $error : "&" . $error;
    }
    $error = emptyInput($lastname);
    if (!empty($error)) {
        $errorPath .= empty($errorPath) ? $error : "&" . $error;
    }
    $error = emptyInput($username);
    if (!empty($error)) {
        $errorPath .= empty($errorPath) ? $error : "&" . $error;
    }
    $error = validEmail($email);
    if (!empty($error)) {
        $errorPath .= empty($errorPath) ? $error : "&" . $error;
    }
    $error = passwordMatch($password, $password2);
    if (!empty($error)) {
        $errorPath .= empty($errorPath) ? $error : "&" . $error;
    }

    if (!empty($errorPath)) {
        $header = "location: ../register.php?error=" . $errorPath;
        header($header);
        exit();
    } else if ($exists = exists($dbConn, $username, $email)) {
        echo ($exists['username'] . "<br>" . $exists['email']);
        // if username error = usernameoccupied
        // if email error = emailoccupied
    } else {
        $query = "INSERT INTO artaccount (username, accountPassword, forename, surname, email, creation_date, profilePicture) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $preparedStmt = mysqli_stmt_init($dbConn);

        if (!mysqli_stmt_prepare($preparedStmt, $query)) {
            header("location: ../index.php?error=inputerror");
            mysqli_stmt_close($preparedStmt);
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $date = date("Y-m-d");
        $defaultPic = "img/person-circle.svg";
        mysqli_stmt_bind_param($preparedStmt, "sssssss", $username, $hashedPassword, $firstname, $lastname, $email, $date, $defaultPic);
        mysqli_stmt_execute($preparedStmt);
        mysqli_stmt_close($preparedStmt);
        header("location: ../login.php");
        exit();
    }
}

function loginUser($dbConn, $username, $password)
{
    session_destroy();
    $errorPath = "";

    $error = emptyInput($username);
    if (!empty($error)) {
        $errorPath .= empty($errorPath) ? $error : "&" . $error;
    }
    $error = emptyInput($password);
    if (!empty($error)) {
        $errorPath .= empty($errorPath) ? $error : "&" . $error;
    }
    if (!empty($errorPath)) {
        $header = "location: ../login.php?error=" . $errorPath;
        header($header);
        exit();
    } else if ($exists = exists($dbConn, $username, $username)) {
        $hashedPassword = $exists['accountPassword'];
        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION['accountID'] = $exists['accountID'];
            $_SESSION['username'] = $exists['username'];
            $_SESSION['email'] = $exists['email'];
            $_SESSION['firstname'] = $exists['forename'];
            $_SESSION['lastname'] = $exists['surname'];
            $_SESSION['account_type'] = $exists['account_type'];
            header("location: ../index.php");
            exit();
        }
    } else {
        header("location: ../login.php?error=usernotfound");
        exit();
    }
}
