<?php
require __DIR__ . "/connectionCheck.php";

$mysqliVac = require __DIR__ . "/database_vacanties.php";
$queryVac = "SELECT * FROM vacanties";
$resultVac = mysqli_query($mysqliVac, $queryVac);

$queryForTags = "SELECT tag_name FROM vacanties";
$resultTag = mysqli_query($mysqliVac, $queryForTags);

$userId = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Форма реєстрації</title>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script defer src="../js/validation.js"></script>
    <!-- Посилання на Google шрифт -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Підключення головного CSS файлу -->
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    <!-- Бібліотека Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Підключення бібліотеки, яка містить в собі гарні векторні значки, які ми використаєм в нашій роботі  -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <script defer src="../js/toggleFav.js"></script>
    <script  defer src="../js/reload.js"></script>
</head>
<body class="signup-test">
<div class="box-all-vac">
    <!-- Кнопка профілю -->
    <div class="navbar-home">
        <a class="home_button" href="../php/account.php">
            <img alt="home_buttom" src="../img/profile.png">
        </a>
    </div>
    <!-- /Кнопка профілю -->
    <div class="profile-tab-nav border-right">
        <div class="p-4">
            <p class="fav-vac-text-head">Ось ваші улюблені вакансії</p>
            <br>

            <?php

            $mysqli = require __DIR__ . "/database.php";

            // Перевірка, чи користувач увійшов у систему
            if (!isset($_SESSION["user_id"])) {
                die("Користувач не увійшов у систему");
            }
            ?>

            <?php
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
                header("Location: vacancies.php");
            } else {
            ?>
            <table class="your-fav-table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Назва</th>
                    <th>Теги</th>
                    <th>Місто</th>
                    <th>Зарплатня</th>
                    <th>e-mail</th>
                    <th>Мобільний</th>
                    <th>Деталі</th>
                    <th>Обрані</th>
                </tr>
                </thead>
                <tbody><?php
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

                ?>
                <tbody>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['tag_name']; ?></td>
                    <td><?php echo $row['region']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php if (isset($vacIdFav) && $vacIdFav === $row['id']): ?>
                            <div class="star-btn" onclick="toggleStar(this); reload()" starred="false"
                                 data-id="<?= htmlspecialchars($row['id']) ?>">☆
                            </div>

                        <?php else: ?>
                            <div class="star-btn" onclick="toggleStar(this); reload()" starred="true"
                                 data-id="<?= htmlspecialchars($row['id']) ?>">★
                            </div>
                        <?php endif; ?>
                    </td>

                    <?php
                    }
                    }
                    }
                    ?>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
