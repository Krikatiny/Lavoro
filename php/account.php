<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
</head>
<body>

<h1>Home</h1>

<?php if (isset($user)): ?>

    <p>Hello, <?= htmlspecialchars($user["name"]) ?></p>
    <div>
        <p>
            <a href="../index.html"> Home </a>
        </p>
        <p>
            <a href="vacant_create.php"> Create Vacant </a>
        </p>
        <p>
            <a href="vacancy-page.php"> Vacant page</a>
        </p>
    </div>
    <div>
        <p><a href="../php/logout.php">Log out</a></p>
    </div>

<?php else: ?>

    <p><a href="../php/login.php">Log in</a> or <a href="../html/signup.html">sign up</a></p>

<?php endif; ?>

</body>
</html>
    
    
    
    
    
    
    
    
    
    
    