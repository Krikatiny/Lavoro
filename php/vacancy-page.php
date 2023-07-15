<?php
$mysqli = require __DIR__ . "/database.php";

$query = "SELECT * FROM vacanties";
$result = $mysqli->query($query);

if ($result) {
    $counter = 0;
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $salary = $row['salary'];
        $description = $row['description'];

        // Генеруємо HTML-код для кожного запису
        echo "<div>";
        echo "<h2>Name $name</h2>";
        echo "<h3>Salary: $salary</h3>";
        echo "<p>Description: $description</p>";
        echo "</div>";
        $counter++;
        if ($counter == 3){
            break;
        }
    }

    // Звільнюємо пам'ять від результату запиту
    $result->free();
} else {
    echo "Error executing query: " . $mysqli->error;
}

// Закриваємо з'єднання з базою даних
$mysqli->close();
?>