<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: account.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вхід</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Підключення головного CSS файлу -->
    <link type="text/css" rel="stylesheet" href="../css/style.css"/>
    <!-- Бібліотека Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
    <!-- Підключення бібліотеки, яка містить в собі гарні векторні значки, які ми використаєм в нашій роботі  -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body class="signup">
<?php if ($is_invalid): ?>
    <em>Неправильний пароль</em>
<?php endif; ?>
    <div class="box"> 
         <!-- Кнопка будиночка -->
         <div class="navbar-home">
            <a class="home_button" href="../index.html">
                <img src="../img/free-icon-home-88282.png" alt="home_buttom">
            </a>
        </div>   
    <form method="post">
    <div class="vac_name-label">
    <h1 class="reg_form_title">Увійти</h1>
    </div>
    <input class="log_input" type="email" name="email" id="email" autofocus placeholder="Пошта"
           value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

    <input class="log_input" type="password" name="password" id="password" autofocus placeholder="Пароль">
    <div class="text-center reg_button">
    <button type="submit" name="vac-create" class="main-button icon-button reg_button">Увійти</button>
</form>
</div>
</div>

</form>
</body>
</html>









