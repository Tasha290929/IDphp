<?php

/**
 * This code snippet is a PHP script that handles the submission of a product form.
 * It performs validation on the form fields and checks for errors.
 * If there are no errors, it uploads the product image and inserts the product data into the database.
 * The script uses the $_POST and $_FILES superglobals to access form data and uploaded files.
 * It also includes a database connection and executes an SQL query to insert the data into the "Product" table.
 * The script outputs success or error messages depending on the result of the database query.
 */
require_once("./blocks/db.php");

$errors = array();

// Проверка заполнения полей формы
if (empty($_POST['name'])) {
    $errors['name'] = "Name is required";
}

if (empty($_POST['description'])) {
    $errors['description'] = "Description is required";
}

if (empty($_POST['price'])) {
    $errors['price'] = "Price is required";
}

if (empty($_FILES['icon']['name'])) {
    $errors['icon'] = "Product image is required";
}

// Если есть ошибки, перенаправляем обратно на страницу добавления продукта с сообщениями об ошибках
if (!empty($errors)) {
    include 'add_product.php'; // Путь к странице добавления продукта
    exit;
}

// Обработка загрузки изображения продукта
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["icon"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Перемещение файла из временной директории в указанную
if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
    echo "The file " . htmlspecialchars(basename($_FILES["icon"]["name"])) . " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Вставка данных в таблицу Product
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$icon = basename($_FILES["icon"]["name"]); // Здесь сохраняем только название файла
$gameplay = isset($_POST['gameplay']) ? $_POST['gameplay'] : '';
$engine = isset($_POST['engine']) ? $_POST['engine'] : '';
$platform = isset($_POST['platform']) ? $_POST['platform'] : '';

$sql = "INSERT INTO Product (Name, Description, Price, Icon, Gameplay, Engine, Platform) 
        VALUES ('$name', '$description', '$price', '$icon', '$gameplay', '$engine', '$platform')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
