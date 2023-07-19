<?php
session_start();

$mysqliVac = require __DIR__ . "/database_vacanties.php";
$queryVac = "SELECT * FROM vacanties";
$resultVac = mysqli_query($mysqliVac, $queryVac);

$queryForTags = "SELECT tag_name FROM vacanties";
$resultTag = mysqli_query($mysqliVac, $queryForTags);

$userId = $_SESSION['user_id'];
?>


<!doctype html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Підключення головного CSS файлу -->
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
    <!-- Бібліотека Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
    <!-- Підключення бібліотеки, яка містить в собі гарні векторні значки, які ми використаєм в нашій роботі  -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="../js/addToFav.js"></script>
    <script defer src="../js/toggleFav.js"></script>
    <title>Document</title>
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
<table>
    <p class="vac_form_title">Таблиця вакансій</p>
    <a href="delFromFav.php">Акаунт</a>

    <?php

    while ($row = mysqli_fetch_assoc($resultVac)) {
        $tags = mysqli_fetch_assoc($resultTag);
        $tags_implode = implode("", $tags);
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
                <?php
                $arr = explode(",", $tags_implode);
                foreach ($arr as $item) {
                    echo $item;
                    echo " ";
                }
                ?>
            </td>
            <td><?php echo $row['region']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <?php
                $mysqli = require __DIR__ . "/database.php";
                $query = "SELECT vac_id user_id FROM user_favourite WHERE vac_id = ? AND user_id = ? ";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("ii", $row['id'], $_SESSION['user_id'],);
                $stmt->execute();
                $result = $stmt->get_result();
                $vacIdFav = mysqli_fetch_assoc($result);


                if (isset($vacIdFav)) {
                    $vacIdFav = implode("", $vacIdFav);
                }
                if (isset($vacIdFav) && $vacIdFav === $row['id']): ?>
                    <div class="star-btn" onclick="toggleStar(this)" starred="true"
                         data-id="<?= htmlspecialchars($row['id']) ?>">★
                    </div>
                <?php else: ?>
                    <div class="star-btn" onclick="toggleStar(this)" starred="false"
                         data-id="<?= htmlspecialchars($row['id']) ?>">☆
                    </div>
                <?php endif; ?>
            </td>
            <td>
            </td>
        </tr>
        <?php
    }

    ?>
</table>
</div>
</body>
</html>