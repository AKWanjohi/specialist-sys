<?php

function setSession($id, $username, $user_type)
{
    $_SESSION['user_id'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = $user_type;
}

function checkIfLoggedIn()
{
    if (isset($_SESSION['user_id'])) {
        header('Location: /');
        exit;
    }
}
