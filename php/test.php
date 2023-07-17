<a href="account.php">Акаунт</a><br>
<?php
require __DIR__ . "/connectionCheck.php";
$mysqli = require __DIR__ . "/database.php";

// Перевірка, чи користувач увійшов у систему
if (!isset($_SESSION["user_id"])) {
    die("Користувач не увійшов у систему");
}

$userID = $_SESSION["user_id"];

// Запит до бази даних для отримання улюблених вакансій залогіненого користувача
$queryForTags = "SELECT vac_id FROM user_favourite WHERE user_id = ?";
$stmt = $mysqli->prepare($queryForTags);

if (!$stmt) {
    die("Помилка SQL: " . $mysqli->error);
}

$stmt->bind_param("i", $userID);
$stmt->execute();
$resultTag = $stmt->get_result();

// Перевірка, чи є у користувача улюблені вакансії
if ($resultTag->num_rows === 0) {
    echo "У вас немає улюблених вакансій";
} else {
    // Підключення до бази даних з вакансіями
    $mysqliVac = require __DIR__ . "/database_vacanties.php";

    while ($tag = $resultTag->fetch_assoc()) {
        $vacancyId = $tag["vac_id"];

        // Запит до бази даних з вакансіями для отримання деталей вакансії за її ідентифікатором
        $queryForVac = "SELECT * FROM vacanties WHERE id = ?";
        $stmtQueryForVac = $mysqliVac->prepare($queryForVac);

        if (!$stmtQueryForVac) {
            die("Помилка SQL: " . $mysqliVac->error);
        }

        $stmtQueryForVac->bind_param("i", $vacancyId);
        $stmtQueryForVac->execute();
        $resultVac = $stmtQueryForVac->get_result();

        while ($row = $resultVac->fetch_assoc()) {
            // Виведення деталей вакансії для кожної улюбленої вакансії
            $out = implode($row);
            echo $out . "<br>";
            // Додавайте інші поля за необхідності

            echo "<br>";
        }
    }
}
?>

