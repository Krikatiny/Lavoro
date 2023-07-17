<?php
require __DIR__ . "/connectionCheck.php";
$mysqli = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["vac_id"])) {
        // Перевірка, чи користувач увійшов у систему та має дійсний user_id
        if (isset($_SESSION["user_id"])) {
            $vacancyId = $_POST["vac_id"];
            $userId = $_SESSION["user_id"];
            $sql = "DELETE FROM user_favourites WHERE user_id = ? AND vac_id";
            $stmt = $mysqli->prepare($sql);
            if (!$stmt) {
                die("Помилка SQL: " . $mysqli->error);
            }
            $stmt->bind_param("ii", $userId, $vacancyId);
            if ($stmt->execute()) {
                exit;
            }
        }
    }
}