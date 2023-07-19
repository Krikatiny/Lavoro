<?php
require __DIR__ . "/connectionCheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профіль користувача</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/account.css">
    <link href="../css/b.css" rel="stylesheet" type="text/css"/>
    <link href="../css/f.css" rel="stylesheet">
</head>
<body class="signup">
<section class="py-5 my-5">
    <div class="container_account">
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
            <div class="profile-tab-nav border-right">
                <div class="p-4">
                    <div class="img-circle text-center mb-3">
                        <img src="../img/depositphotos_35716051-stock-illustration-user-icon-vector.jpg" alt="Image"
                             class="shadow">
                    </div>
                    <?php if (isset($user)): ?>
                    <p class="text-center">Привіт, <?= htmlspecialchars($user["name"]) ?></p>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" href="../index.html">
                        <i class="fa fa-home text-center mr-1"></i>
                        Головна сторінка
                    </a>
                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab"
                       aria-controls="account" aria-selected="true">
                        <i class="fa fa-user-circle-o text-center mr-1"></i>
                        Відомості щодо акаунту
                    </a>
                    <a class="nav-link active" href="../php/test.php" role="tab"
                       aria-controls="account" aria-selected="true">
                        <i class="fa fa-bookmark-o text-center mr-1"></i>
                        Обрані вакансії
                    </a>
                    <a class="nav-link active" href="../php/vacancy-page.php" role="tab"
                       aria-controls="account" aria-selected="true">
                        <i class="fa fa-bookmark-o text-center mr-1"></i>
                        Усі вакансії
                    </a>
                    <a class="nav-link active" href="../html/vacant_create.html">
                        <i class="fa fa-pencil-square-o text-center mr-1"></i>
                        Створення вакансії
                    </a>
                    <a class="nav-link active" href="../php/logout.php">
                        <i class="fa fa-sign-out mr-1"></i>
                        Вихід
                    </a>
                </div>
            </div>
            <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                <h3 class="mb-4">Відомості щодо акаунту</h3>
                <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ім'я:</label>
                            <p><?= htmlspecialchars($user["name"]) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Пошта:</label>
                            <p><?= htmlspecialchars($user["email"]) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Телефон:</label>
                            <p><?= htmlspecialchars($user["phone_number"]) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>

    header("Location: ../index.html");

endif; ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>