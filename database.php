<?php

$dsn = "mysql:host=localhost;port=3306;user=root;dbname=specialist_sys";

$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
