<?php

$mysqli = require __DIR__ . "/database_vacanties.php";
$query = "SELECT * FROM vacanties";
$result = mysqli_query($mysqli, $query);

$queryForTags = "SELECT tag_name FROM vacanties";
$resultTag = mysqli_query($mysqli, $queryForTags);

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
    <title>Document</title>
</head>
<body>
<table>
    <p>Таблиця вакансій</p>
    <a href="account.php">Акаунт</a>
    <a href="delFromFav.php">Акаунт</a>

    <?php

    while ($row = mysqli_fetch_assoc($result)) {
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
                <button type="button" class="add-to-favorite" data-id="<?= htmlspecialchars($row['id']) ?>">Add to
                    favourite
                </button>
            </td>
            <td>
                <button type="button" class="delete-from-favorite" data-id="<?= htmlspecialchars($row['id']) ?>">Delete
                    from favourite
                </button>
            </td>
        </tr>
        <?php
    }

    ?>
</table>

</body>
</html>