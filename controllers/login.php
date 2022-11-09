<?php

$message = "";
$username = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $db->getLogin($_POST['username']);

    if ($login) {
        if (password_verify($_POST['password'], $login['password'])) {

            $id = $login['admin_id'] ?? $login['patient_id'] ?? $login['specialist_id'];
            $rank = $login['rank'];

            if ($rank == 'admin') {
                $statement = $db->conn->prepare(
                    "SELECT * FROM admin WHERE id=:id"
                );
            } elseif ($rank == 'patient') {
                $statement = $db->conn->prepare(
                    "SELECT * FROM patient WHERE id=:id"
                );
            } elseif ($rank == 'specialist') {
                $statement = $db->conn->prepare(
                    "SELECT * FROM specialist WHERE id=:id"
                );
            }
            $statement->bindValue(":id", $id);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['user_type'] = $rank;

            header("Location: /");
        } else {
            $message = "You have entered an incorrect password.";
            $username = $_POST['username'];
        }
    } else {
        $message = "User does not exist.";
        $username = $_POST['username'];
    }
}

require "views/login.view.php";
