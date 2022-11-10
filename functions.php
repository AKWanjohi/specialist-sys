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

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateText($data)
{
    $data = testInput($data);

    return !preg_match("/^[a-zA-Z-' ]*$/", $data);
}
