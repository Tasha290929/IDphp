<?php
require_once("./blocks/db.php");

// Данные для вставки
$name = "Monster Hunter Now";
$description = "The thrill of the hunt is calling. Begin your hunting adventure now! Hunt monsters in the real world: Embark on a global quest to track down and hunt some of the most formidable monsters from the Monster Hunter universe as they appear in our world. Forge powerful weapons and team up with fellow hunters to track down larger-than-life monsters and take them head-on.";
$price = 20000.00;
$icon = "monster.png";
$gameplay = "Some gameplay description";
$engine = "Some engine";
$platform = "Some platform";

// SQL запрос для вставки данных
$sql = "INSERT INTO Product (Name, Description, Price, Icon, Gameplay, Engine, Platform) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdssss", $name, $description, $price, $icon, $gameplay, $engine, $platform);

// Выполнение запроса
if ($stmt->execute() === TRUE) {
    echo "Данные успешно добавлены в таблицу Product.";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие соединения
$conn->close();
