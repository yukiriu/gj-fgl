<?php

function StartSession($email)
{
    $user = new User();
    $user->load_user($email);
    $_SESSION["userID"] = $user->get_id();
    $_SESSION["userEmail"] = $email;
    $_SESSION["userName"] = $user->get_username();
    //Session timeout dans 15 minutes
    $_SESSION["timeOut"] = time() + (60 * 15);
    //renew_timeout
    $_SESSION["innitTimeStamp"] = time();
}

function validate_session_public()
{
    if(!isset($_SESSION["userID"]))
    {
        return true;
    }
    return validate_session_private();
}
function validate_session_private()
{
    if (time() >= $_SESSION["timeOut"]) {
        end_session();
        return false;
    }
    // Si la Session est active depuis plus de 30 mins,
    // on change son PHP_sessionID
    // peux aussi etre substituer par session_regenerate_id();
    if (time() - $_SESSION["innitTimeStamp"] > (60 * 30)) {
        $userId = $_SESSION["userID"];
        $email = $_SESSION["userEmail"];
        $username = $_SESSION["userName"];
        end_session();
        session_start();
        StartSession($email); 
        return true;
    } else {
        $_SESSION["timeOut"] = time() + (60 * 15);
        return true;
    }
}

    /*fonction qui detruit la session (logout dans la langue de shakespear)
  */
function end_session()
{
    $_SESSION = array();
    unset($_COOKIE["PHPSESSID"]);
    session_destroy();
}