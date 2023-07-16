<?php

$host = "localhost";
$dbname = "vacanties";
$username = "root";
$password = "";

$mysqli = new mysqli($host,
    $username,
    $password,
    $dbname);
$mysqli->set_charset("utf8mb4");
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;