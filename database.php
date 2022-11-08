<?php

$dsn = 'mysql:' . http_build_query($config['database'], '', ';');

$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
