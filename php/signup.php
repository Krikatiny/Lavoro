<?php
require __DIR__ . "/connectionCheck.php";

    if (isset($_SESSION["user_id"])) {
        // Якщо користувач залогінений, перенаправити його до особистого кабінету
        header("Location: account.php");
        exit;
    }

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
</head>
<body class="signup">
<div class="box">
    <!-- Кнопка будиночка -->
    <div class="navbar-home">
        <a class="home_buttom" href="../index.html">
            <img src="../img/free-icon-home-88282.png" alt="home_buttom">
        </a>
    </div>
    <form action="../php/process-signup.php" class="reg" id="signup" method="post" novalidate>
        <h1 class="reg_form_title">Зареєструватися</h1>
        <div class="reg_form_input">
            <input id="name" name="name" type="text" autofocus placeholder="Ім'я">
        </div>

        <div class="reg_form_input">
            <input id="email" name="email" type="email" autofocus placeholder="Пошта">
        </div>

        <div class="reg_form_input">
            <input id="phone_number" name="phone_number" type="tel" autofocus placeholder="Телефон">
        </div>

        <div class="reg_form_input">
            <input id="password" name="password" type="password" autofocus placeholder="Пароль">
        </div>

        <div class="reg_form_input">
            <input type="password" name="password_commit" id="password_commit" autofocus placeholder="Повторення пароля">
        </div>
        <div class="reg_button">
            <button class="reg__button">Відправити</button>
        </div>
    </form>
    <a href="../php/login.php" class="col-lg-offset-2" >Зайти</a>
</div>
</div>

</body>
</html>