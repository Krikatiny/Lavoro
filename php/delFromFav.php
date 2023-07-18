<?php
require __DIR__ . "/connectionCheck.php";
$mysqli = require __DIR__ . "/database.php";

if (!isset($_SESSION["user_id"])) {
    echo json_encode(["message" => "Користувач не увійшов у систему"]);
    exit;
}

$userId = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["vac_id"])) {

        $vacancyId = $_POST["vac_id"];

        $sql = "DELETE FROM user_favourite WHERE user_id = ? AND vac_id = ?";
        $stmt = $mysqli->prepare($sql);

        $stmt->bind_param("ii", $userId, $vacancyId);
        $stmt->execute();

    }
}
?>
