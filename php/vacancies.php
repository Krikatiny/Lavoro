<?php
session_start();

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
    <script defer src="../js/searchText.js"></script>
    <script defer src="../js/checkboxesFilter.js"></script>
    <script defer src="../js/toggleFav.js"></script>
    <!-- Скрипти для фільтрації даних по чекбоксах та слайдеру
    <script defer src="../js/rangeSlider.js"></script>
    <script defer src="../js/sliderFilter.js"></script>-->

    <!-- Спільний скрипт -->
    <script defer src="../js/filterDataOnThePage.js"></script>


</head>
<body>
<!-- Оформлення навігаційної панелі -->
<header class="transparent-nav" id="header">
    <div class="container">
        <div class="navbar-header">
            <!-- Кнопка будиночка -->
            <div class="navbar-home">
                <a class="home_button" href="../index.html">
                    <img alt="home_buttom" src="../img/home.png">
                </a>
            </div>
            <!-- /Кнопка будиночка -->
        </div>
        <!-- Меню навігації сайту-->
        <nav id="nav">
            <ul class="main-menu nav navbar-nav navbar-right">
                <li><a href="../index.html">Головна</a></li>
                <li><a href="../php/vacancies.php">Вакансії</a></li>
                <li><a href="../html/contact.html">Контакти</a></li>
                <a class="profile_button" href="../php/signup.php">
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
    <div class="bg-image bg-parallax overlay bg-contact" style="background-image:url(../img/background2.jpg)"></div>
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
                <h1 class="white-text">Ким ви хочете працювати?</h1>
                <p class="empty_place">.</p>
                <p class="empty_place">.</p>
                <!-- search widget -->
                <div class="widget search-widget">
                    <form class="searchbar">
                        <input type="text" id="searchText" placeholder="Пошук бажаної посади"
                               style="background-color: rgba(228,224,238,0.43) "/>
                        <button id="searchButton" class="search-button"></button>
                    </form>
                </div>
                <!-- /search widget -->
            </div>
        </div>
    </div>
    <!-- /Наповнення вступної частини  -->
</div>
<!-- /Вступна частина сторінки -->

<!-- Наповнення основної частини сторінки -->
<div class="section" id="contact">
    <div>
        <h2 class="header-filter">Фільтри</h2>
    </div>
    <!-- Sidebar -->
    <div class="sidebar-shadow">
        <aside class="sidebar">


            <!-- Слайдер -->
            <div class="slidercontainer">
                <div>
                    <h3 class="filtername">Фільтр за зарплатнею</h3>
                </div>
                <input type="range" min="1000" max="100000" value="1000" step="500" class="slider" id="myRange">
                <span class="filter" id="sliderValue">1000</span>
            </div>

            <!-- Чекбокси -->
            <div class="checkbox-group">
                <h3 class="filternamebox">Категорії</h3>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="tags" id="checkbox1" value="Робота з дітьми">
                        Робота з дітьми
                    </label>
                    <label>
                        <input type="checkbox" name="tags" id="checkbox2" value="Гнучкий графік">
                        Гнучкий графік
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="tags" id="checkbox3" value="Робота для студента">
                        Робота для студента
                    </label>
                    <label>
                        <input type="checkbox" name="tags" id="checkbox4" value="Зелена компанія">
                        Зелена компанія
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="tags" id="checkbox5" value="Премії та надбавки">
                        Премії та надбавки
                    </label>
                    <label>
                        <input type="checkbox" name="tags" id="checkbox6" value="Державна робота">
                        Державна робота
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="tags" id="checkbox7" value="Волонтерство">
                        Волонтерство
                    </label>
                    <label>
                        <input type="checkbox" name="tags" id="checkbox8" value="Навчання з нуля">
                        Навчання з нуля
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="tags" id="checkbox9" value="Дистанційна робота">
                        Дистанційна робота
                    </label>
                    <label>
                        <input type="checkbox" name="tags" id="checkbox10" value="Гаряча пропозиція">
                        Гаряча пропозиція
                    </label>
                </div>
            </div>

            <div class="checkbox-group">
                <h3 class="filternamebox">Регіони</h3>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox1" value="АР Крим">
                        АР Крим
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox2" value="Березань">
                        Березань
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox3" value="Вінниця">
                        Вінниця
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox4" value="Волинь">
                        Волинь
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox5" value="Дніпро">
                        Дніпро
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox6" value="Донецьк">
                        Донецьк
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox7" value="Житомир">
                        Житомир
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox8" value="Закарпаття">
                        Закарпаття
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox9" value="Запоріжжя">
                        Запоріжжя
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox10" value="Івано-Франківськ">
                        Івано-Франківськ
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox11" value="Київ">
                        Київ
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox12" value="Кіровоград">
                        Кіровоград
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox13" value="Луганськ">
                        Луганськ
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox14" value="Львів">
                        Львів
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox15" value="Миколаїв">
                        Миколаїв
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox16" value="Одеса">
                        Одеса
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox17" value="Полтава">
                        Полтава
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox18" value="Рівне">
                        Рівне
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox19" value="Суми">
                        Суми
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox20" value="Тернопіль">
                        Тернопіль
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox21" value="Харків">
                        Харків
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox22" value="Херсон">
                        Херсон
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox23" value="Хмельницький">
                        Хмельницький
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox24" value="Черкаси">
                        Черкаси
                    </label>
                </div>
                <div class="checkbox-column">
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox25" value="Чернівці">
                        Чернівці
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox26" value="Чернігів">
                        Чернігів
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox27" value="Солоне">
                        Солоне
                    </label>
                    <label>
                        <input type="checkbox" name="region" id="rcheckbox28" value="НУБІП">
                        НУБІП
                    </label>
                </div>
            </div>
        </aside>
    </div>
</div>
<!-- Таблиця Вакансій -->
<h1 class="table-name">Таблиця вакансій</h1>
<table class="table-vacancies">
    <thead class="vacancies-head">
    <tr>
        <th>№</th>
        <th>Ім'я</th>
        <th>Теги</th>
        <th>Місто</th>
        <th>Зарплатня</th>
        <th>Деталі</th>
        <th>Обрані</th>
    </tr>
    </thead>
    <tbody>
    <?php
    
    while ($row = mysqli_fetch_assoc($resultVac)) {
        $tags = mysqli_fetch_assoc($resultTag);
        $tags_implode = implode("", $tags);
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td class="vacancyname"><?php echo $row['name']; ?></td>
            <td class="vacancytags">
                <?php
                $arr = explode(",", $tags_implode);
                foreach ($arr as $item) {
                    echo $item;
                    echo "";
                }
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
                ?>
            </td>
            <td class="vacancyregion"><?php echo $row['region']; ?></td>
            <td class="price"><?php echo $row['salary']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <?php if (isset($vacIdFav) && $vacIdFav === $row['id']): ?>
                    <div class="star-btn" onclick="toggleStar(this)" starred="true"
                         data-id="<?= htmlspecialchars($row['id']) ?>">★
                    </div>
                <?php else: ?>
                    <div class="star-btn" onclick="toggleStar(this)" starred="false"
                         data-id="<?= htmlspecialchars($row['id']) ?>">☆
                    </div>
                <?php endif; ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>


<!-- Нижня менюшка -->
<footer class="bottom-footer" id="footer">
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
                    <li><a href="../php/vacancies.php">Вакансії</a></li>
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

</body>
</html>

