<?php

session_start();

require "config.php";

require "Database.php";

$dsn = 'mysql:' . http_build_query($config['database'], '', ';');
$db = new Database($dsn);

require 'functions.php';

require "router.php";
