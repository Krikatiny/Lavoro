<?php
session_start();

$name = $_POST['vac_name'];
$region = $_POST['region'];
$salary = $_POST['salary'];
$email = $_POST['vac_email'];
$phone = $_POST['phone_number'];
$description = $_POST['vac_description'];
$tags = $_POST['tags'];

$mysqli = require __DIR__ . "/database_vacanties.php";

if (empty($name)) {
    die("Name is required");
}

if (empty($region)) {
    die("Region is required");
}

if (empty($salary)) {
    die("Salary is required");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

$mysqli->autocommit(false); // Вимикаємо автокоміт
echo "work1";

// Виконуємо окремий запит для кожного тегу, використовуючи підготовлений запит
$tagSql = "INSERT INTO vacanties (tag_name) VALUES (?)";
$tagStmt = $mysqli->prepare($tagSql);

if (!$tagStmt) {
    die("SQL error: " . $mysqli->error);
}
$tagNames = implode(',', $tags); // Об'єднуємо теги через кому


// Виконуємо запит INSERT INTO для збереження основних даних в таблиці vacanties
$sql = "INSERT INTO vacanties (name, region, salary, tag_name, email, phone, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param('ssissss', $name, $region, $salary, $tagNames, $email, $phone, $description);

if ($stmt->execute()) {


    $mysqli->commit(); // Зберігаємо всі зміни у базі даних
    $_SESSION['status'] = "Inserted Successfully";
    header("Location: index.php");
    exit;
} else {
    $mysqli->rollback(); // Скасовуємо зміни у випадку помилки
    $_SESSION['status'] = "Data Not Inserted";
    header("Location: index.php");
    exit;
}