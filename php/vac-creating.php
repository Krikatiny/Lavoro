<?php

$name = $_POST['vac_name'];
$region = $_POST['region'];
$salary = $_POST['salary'];
$email = $_POST['vac_email'];
$phone = $_POST['phone_number'];
$description = $_POST['vac_description'];
$tags = $_POST['tags'];


if (empty($_POST["vac_name"])) {
    die("Name is required");
}

if (empty($_POST["region"])) {
    die("Region is required");
}

if (empty($_POST["salary"])) {
    die("Salary is required");
}

if (!filter_var($_POST["vac_email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}


$mysqli = require __DIR__ . "/database_vacanties.php";

$sql = "INSERT INTO vacanties (name, region, salary, email, phone, description, tag_name )
        VALUES ('$name', '$region', '$salary', '$email', '$phone', '$description', '$tags')";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param('ssissss',
    $name,
    $region,
    $salary,
    $email,
    $phone,
    $description,
    $tags);
