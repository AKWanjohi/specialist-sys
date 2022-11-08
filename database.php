<?php

$dsn = 'mysql:' . http_build_query($config['database'], '', ';');

$pdo = new PDO($dsn);
