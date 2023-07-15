<?php
session_start();

$name = $_POST['vac_name'];
$region = $_POST['region'];
$salary = $_POST['salary'];
$email = $_POST['vac_email'];
$phone = $_POST['phone_number'];
$description = $_POST['vac_description'];

$mysqli = require __DIR__ . "/database_vacanties.php";

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
if (isset($_POST['vac-create'])) {
    $tags = $_POST['tags'];
    $tagsString = implode(",", $tags); // Рядок тегів, розділених комами

    // Виконуємо перший запит INSERT INTO для збереження основних даних в таблиці vacanties
    $sql = "INSERT INTO vacanties (name, region, salary, email, phone, description, tag_name) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param('ssissss', $name, $region, $salary, $email, $phone, $description, $tagsString);

    if ($stmt->execute()) {
        // Перший запит INSERT INTO виконаний успішно

        $_SESSION['status'] = "Inserted Successfully";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: index.php");
        exit;
    }
}