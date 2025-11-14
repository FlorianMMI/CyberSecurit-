<?php

function checkMethod()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return true;
    } else {
        return false;
    }
}

function checkCredentials()
{
    if (isset($_POST['username'], $_POST['password'])) {
        if (hash("sha1", $_POST['password']) === CREDENTIALS[$_POST['username']]) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function destroySession()
{
    session_regenerate_id(true);
    $_SESSION = array();
    $res = session_destroy();
    return $res;
}
