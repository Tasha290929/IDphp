<?php
require_once("./blocks/db.php");
require_once("./product_template.php");

// SQL запрос для выборки всех продуктов
$sql = "SELECT * FROM Product";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список продуктов</title>
    <!-- Подключение стилей -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Список продуктов</h1>

<div class="product-list">
    <?php
    // Проверка наличия продуктов
    if ($result->num_rows > 0) {
        // Вывод продуктов
        while($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<h2><a href='product_template.php?id=" . $row["ProductID"] . "'>" . $row["Name"] . "</a></h2>";
            echo "<p>" . $row["Description"] . "</p>";
            echo "<p>Цена: $" . number_format($row["Price"], 2) . "</p>";
            echo "<img src='" . $row["Icon"] . "' alt='" . $row["Name"] . "'>";
            // Дополнительные поля, если нужно
            echo "<p>Геймплей: " . $row["Gameplay"] . "</p>";
            echo "<p>Движок: " . $row["Engine"] . "</p>";
            echo "<p>Платформа: " . $row["Platform"] . "</p>";
            echo "</div>";
            
        }
    } else {
        echo "Нет продуктов для отображения.";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
