<?php

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create vacant</title>
</head>
<body>
<form action="../php/vac-creating.php" method="post" id="vac-create" novalidate>

    <div class="vac_name-label">
        <label for="vac_name">Enter vacant name</label>
    </div>
    <div class="vac_name">
        <input type="text" name="vac_name" id="vac_name">
    </div>

    <div class="tags">
        <input type="checkbox" name="tags[]" value="Red MI"> Red MI <br>
        <input type="checkbox" name="tags[]" value="Samsung"> Samsung <br>
        <input type="checkbox" name="tags[]" value="Nokia"> Nokia <br>
        <input type="checkbox" name="tags[]" value="Vivo"> Vivo <br>
        <input type="checkbox" name="tags[]" value="Karbon"> Karbon <br>
    </div>
    <div class="regin-label">
        <label for="region">Choose region</label>
    </div>

    <div class="region">
        <input list="regions" name="region" id="region">
        <datalist id="regions">
            <option value="Kyiv">Kyiv</option>
            <option value="Odesa">Odessa</option>
            <option value="Berezan'">Berezan'</option>
        </datalist>
    </div>

    <div class="salary-label">
        <label for="salary">Enter Salary</label>
    </div>
    <div class="salary">
        <input type="number" name="salary" id="salary">
    </div>

    <div class="vac_email-label">
        <label for="vac_email">Email</label>
    </div>
    <div class="vac-email">
        <input type="email" name="vac_email" id="vac_email"
            value="<?= htmlspecialchars($user["email"]) ?>">
    </div>
    <div class="phone_number-label">
        <label for="phone_number">Phone number</label>
    </div>
    <div class="phone_number">
        <input type="tel" name="phone_number" id="phone_number"
               value="<?= htmlspecialchars($user["phone_number"]) ?>">
    </div>

    <div class="vac_description-label">
        <label for="vac_description">Description</label>
    </div>
    <div class="description">
        <textarea name="vac_description" id="vac_description" cols="30" rows="10"></textarea>
    </div>

    <button type="submit">Submit</button>
</form>
</body>
</html>