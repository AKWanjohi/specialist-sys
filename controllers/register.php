<?php

checkIfLoggedIn();

$message = "";
$user_type = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $db->getLogin();

    if (!$login) {
        $user_type = $_POST['user_type'];

        if ($user_type == 'admin') {
            $statement = $db->conn->prepare(
                "INSERT INTO admin 
                (name, mobile, email, gender) 
                VALUES (:full_name, :mobile, :email, :gender)"
            );
        } elseif ($user_type == 'patient') {
            $statement = $db->conn->prepare(
                "INSERT INTO patient 
                (name, mobile, email, gender, location, dob) 
                VALUES (:full_name, :mobile, :email, :gender, :location, :dob)"
            );
            $statement->bindValue(":location", $_POST['location']);
            $statement->bindValue(":dob", $_POST['dob']);
        } elseif ($user_type == 'specialist') {
            $statement = $db->conn->prepare(
                "INSERT INTO specialist 
                (name, mobile, email, gender, location) 
                VALUES (:full_name, :mobile, :email, :gender, :location)"
            );
            $statement->bindValue(":location", $_POST['location']);
        }
        $statement->bindValue(":full_name", $_POST['full_name']);
        $statement->bindValue(":mobile", $_POST['mobile']);
        $statement->bindValue(":email", $_POST['email']);
        $statement->bindValue(":gender", $_POST['gender']);
        $statement->execute();

        $user_id = $db->conn->lastInsertId();

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        if ($user_type == 'admin') {
            $statement = $db->conn->prepare(
                "INSERT INTO login 
                (username, password, rank, admin_id) 
                VALUES (:username, :password, :rank, :user_id)"
            );
        } elseif ($user_type == 'patient') {
            $statement = $db->conn->prepare(
                "INSERT INTO login 
                (username, password, rank, patient_id) 
                VALUES (:username, :password, :rank, :user_id)"
            );
        } elseif ($user_type == 'specialist') {
            $statement = $db->conn->prepare(
                "INSERT INTO login 
                (username, password, rank, specialist_id) 
                VALUES (:username, :password, :rank, :user_id)"
            );
        }
        $statement->bindValue(":username", $_POST['username']);
        $statement->bindValue(":password", $password);
        $statement->bindValue(":rank", $user_type);
        $statement->bindValue(":user_id", $user_id);
        $statement->execute();

        setSession($user_id, $_POST['username'], $user_type);

        header("Location: /");
        exit;
    } else {
        $message = "A user with the same username exists.";
    }
}

$user_type = $_POST['user_type'] ?? '';
$full_name = $_POST['full_name'] ?? '';
$username = $_POST['username'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$email = $_POST['email'] ?? '';
$gender = $_POST['gender'] ?? '';
$location = $_POST['location'] ?? '';
$dob = $_POST['dob'] ?? '';

$statement = $db->conn->query(
    "SELECT * FROM admin LIMIT 1"
);
$admin = $statement->fetch(PDO::FETCH_ASSOC);

require "views/register.view.php";
