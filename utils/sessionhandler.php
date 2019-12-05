<?php

/*
    fonction qui "set" toutes les variables de session quand un utilisateur
    ce login.
  */
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
/*
    fonction qui valide si la Session est encore valide
  */
function validate_session()
{
    // l'usager n'est pas valide si cette variable
    // de session n'est pas definis
    if (!isset($_SESSION["userID"])) {
        return false;
    }
    // si le timeout est arrivé, la session n'est plus valide
    // on dois donc detruire la session
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
        login($userId, $email, $username); 
        return true;
    } else {
        $_SESSION["timeOut"] = time() + (60 * 15);
        return true;
    }
}
/*
    fonction qui detruit la session (logout dans la langue de shakespear)
  */
function end_session()
{
    $_SESSION = array();
    unset($_COOKIE["PHPSESSID"]);
    session_destroy();
}
