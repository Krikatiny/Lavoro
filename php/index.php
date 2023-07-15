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

        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>

        <p><a href="../php/logout.php">Log out</a> or <a href="../html/vacant_create.html">Create Vacant</a> </p>

    <?php else: ?>

        <p><a href="../php/login.php">Log in</a> or <a href="../html/signup.html">sign up</a></p>

    <?php endif; ?>

</body>
</html>
    
    
    
    
    
    
    
    
    
    
    