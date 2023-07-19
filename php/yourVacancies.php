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
            <p class="text-center">Ось ваші улюблені вакансії</p>
            <br>

            <?php
            require __DIR__ . "/connectionCheck.php";
            $mysqli = require __DIR__ . "/database.php";

            // Перевірка, чи користувач увійшов у систему
            if (!isset($_SESSION["user_id"])) {
                die("Користувач не увійшов у систему");
            }
            ?>
            <table class="your-fav-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Tags</th>
                    <th>Region</th>
                    <th>Salary</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
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
