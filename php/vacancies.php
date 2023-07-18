<?php
session_start();

$mysqli = require __DIR__ . "/database_vacanties.php";
$query = "SELECT * FROM vacanties";
$result = mysqli_query($mysqli, $query);

$queryForTags = "SELECT tag_name FROM vacanties";
$resultTag = mysqli_query($mysqli, $queryForTags);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lavoro - пошук твого майбутнього </title>
    <!-- Посилання на Google шрифт -->
    <link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
    <!-- Підключення головного CSS файлу -->
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    <!-- Бібліотека Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Підключення бібліотеки, яка містить в собі гарні векторні значки, які ми використаєм в нашій роботі  -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <script defer src="../js/addToFav.js"></script>
</head>
<body>

<!-- Оформлення навігаційної панелі -->
<header class="transparent-nav" id="header">
    <div class="container">
        <div class="navbar-header">
            <!-- Кнопка будиночка -->
            <div class="navbar-home">
                <a class="home_buttom" href="../index.html">
                    <img alt="home_buttom" src="../img/home.png">
                </a>
            </div>
            <!-- /Кнопка будиночка -->
        </div>
        <!-- Меню навігації сайту-->
        <nav id="nav">
                <ul class="main-menu nav navbar-nav navbar-right searchbar">
                    <div class="searchbar">
                        <form action="search.php" method="GET">
                            <input type="text" name="query" placeholder="Знайдіть свою вакансію" />
                            <button type="button" class="search-button"></button>
                        </form>
                    </div>
                <li><a href="../index.html">Головна</a></li>
                <li><a href="../php/vacancies.php">Вакансії</a></li>
                <li><a href="../html/contact.html">Контакти</a></li>
                <a class="profile_buttom" href="../php/signup.php">
                    <img alt="profile_buttom" src="../img/profile (1).png">
                </a>
            </ul>
        </nav>


        <!-- /Меню навігації сайту -->
    </div>
</header>
<!-- /Оформлення навігаційної панелі -->

<!-- Вступна частина сторінки  -->
<div class="main-area section">

    <!-- Фонове зоображення -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(../img/background2.jpg)"></div>
    <!-- /Фонове зоображення -->

    <!-- Наповнення вступної частини -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="main-area-tree">
                    <li><a href="../index.html">Головна</a></li>
                    <li>Вакансії</li>
                </ul>
                <p class="empty_place">.</p>
                <p class="empty_place">.</p>
                <h1 class="white-text">Залиште свої пропозиції!</h1>
                <p class="empty_place">.</p>
                <p class="empty_place">.</p>
                <p class="empty_place">.</p>
            </div>
        </div>
    </div>
    <!-- /Наповнення вступної частини  -->
</div>
<!-- /Вступна частина сторінки -->

<!-- Наповнення основної частини сторінки -->
<div class="section" id="contact">

<!-- Таблиця Вакансій -->
    <table class="table-vacancies">
        <h1 class="table-name">Таблиця вакансій</h1>


        <?php

        while($row = mysqli_fetch_assoc($result))
        {
            $tags = mysqli_fetch_assoc($resultTag);
            $tags_implode = implode("",$tags);
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <?php
                    $arr = explode(",", $tags_implode);
                    foreach ($arr as $item){
                        echo $item;
                        echo " ";
                    }
                    ?>
                </td>
                <td><?php echo $row['region']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><button type="button" class="add-to-favorite" data-id="<?= htmlspecialchars($row['id']) ?>">Add to favourite</button></td>
            </tr>
            <?php
        }

        ?>
    </table>

    <!-- Чекбокси -->
    <div class="checkboxes">
        <div class="checkbox-column">
            <h3 class="name-colum">Категорії</h3>
            <label>
                <input type="checkbox" name="tags[]" value="Робота з дітьми">
                Робота з дітьми
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Гнучкий графік">
                Гнучкий графік
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Робота для студента">
                Робота для студента
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Зелена компанія">
                Зелена компанія
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Премії та надбавки">
                Премії та надбавки
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Державна робота">
                Державна робота
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Волонтерство">
                Волонтерство
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Навчання з нуля">
                Навчання з нуля
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Дистанційна робота">
                Дистанційна робота
            </label>
            <label>
                <input type="checkbox" name="tags[]" value="Гаряча пропозиція">
                Гаряча пропозиція
            </label>
        </div>

        <div class="checkbox-column">
            <h3 class="name-colum">Регіони</h3>
            <label>
                <input type="checkbox" name="region" value="АР Крим">
                АР Крим
            </label>
            <label>
                <input type="checkbox" name="region" value="Вінниця">
                Вінниця
            </label>
            <label>
                <input type="checkbox" name="region" value="Волинь">
                Волинь
            </label>
            <label>
                <input type="checkbox" name="region" value="Дніпро">
                Дніпро
            </label>
            <label>
                <input type="checkbox" name="region" value="Донецьк">
                Донецьк
            </label>
            <label>
                <input type="checkbox" name="region" value="Житомир">
                Житомир
            </label>
            <label>
                <input type="checkbox" name="region" value="Закарпаття">
                Закарпаття
            </label>
            <label>
                <input type="checkbox" name="region" value="Запоріжжя">
                Запоріжжя
            </label>
            <label>
                <input type="checkbox" name="region" value="Івано-Франківськ">
                Івано-Франківськ
            </label>
            <label>
                <input type="checkbox" name="region" value="Київ">
                Київ
            </label>
            <label>
                <input type="checkbox" name="region" value="Кіровоград">
                Кіровоград
            </label>
            <label>
                <input type="checkbox" name="region" value="Луганськ">
                Луганськ
            </label>
            <label>
                <input type="checkbox" name="region" value="Львів">
                Львів
            </label>
            <label>
                <input type="checkbox" name="region" value="Миколаїв">
                Миколаїв
            </label>
            <label>
                <input type="checkbox" name="region" value="Одеса">
                Одеса
            </label>
            <label>
                <input type="checkbox" name="region" value="Полтава">
                Полтава
            </label>
            <label>
                <input type="checkbox" name="region" value="Рівне">
                Рівне
            </label>
            <label>
                <input type="checkbox" name="region" value="Суми">
                Суми
            </label>
            <label>
                <input type="checkbox" name="region" value="Тернопіль">
                Тернопіль
            </label>
            <label>
                <input type="checkbox" name="region" value="Харків">
                Харків
            </label>
            <label>
                <input type="checkbox" name="region" value="Херсон">
                Херсон
            </label>
            <label>
                <input type="checkbox" name="region" value="Хмельницький">
                Хмельницький
            </label>
            <label>
                <input type="checkbox" name="region" value="Черкаси">
                Черкаси
            </label>
            <label>
                <input type="checkbox" name="region" value="Чернівці">
                Чернівці
            </label>
            <label>
                <input type="checkbox" name="region" value="Чернігів">
                Чернігів
            </label>
        </div>
    </div>

    <!-- Слайдер -->
    <div class="slider">
        <input type="range" min="0" max="100000" value="10000" oninput="filter(this)">
        <output>0</output>
    </div>


    <!-- Нижня менюшка -->
    <footer class="section bottom-footer" id="footer">

        <div class="container">

            <div class="row">

                <!-- Логотип нижньої менюшки-->
                <div class="col-md-6">
                    <div class="footer-logo">
                        <a class="logo" href="../index.html">
                            <img alt="logo" src="../img/Lovaro (1).png">
                        </a>
                    </div>
                </div>
                <!-- /Логотип нижньої менюшки-->

                <!-- Навігація нижньої менюшки -->
                <div class="col-md-6">
                    <ul class="main-menu nav navbar-nav navbar-right">
                        <li><a href="../index.html">Головна</a></li>
                        <li><a href="vacancies.html">Вакансії</a></li>
                        <li><a href="../html/contact.html">Контакти</a></li>
                    </ul>
                </div>
                <!-- /Навігація нижньої менюшки -->
            </div>
        </div>
    </footer>
    <!-- /Нижня менюшка -->

    <!-- Попередній завантажувач -->
    <div id='preloader'>
        <div class='preloader'></div>
    </div>
    <!-- /Попередній завантажувач -->


</html>

