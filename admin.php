<?php
session_start();


require_once('./blocks/db.php');

// Обработка добавления продукта
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_product"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $icon = $_POST["icon"];
    $description = $_POST["description"];
    // Добавляем продукт в базу данных
    $sql = "INSERT INTO products (name, price, icon, description) VALUES ('$name', '$price', '$icon', '$description')";
    if (mysqli_query($conn, $sql)) {
        echo "Продукт успешно добавлен.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Обработка удаления продукта
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_product"])) {
    $id = $_POST["id"];
    // Удаляем продукт из базы данных
    $sql = "DELETE FROM products WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Продукт успешно удален.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Получаем список всех продуктов из базы данных
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Администратор</title>
</head>
<body>
    <h1>Добавить продукт</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Название: <input type="text" name="name"><br>
        Цена: <input type="text" name="price"><br>
        Иконка игры: <input type="text" name="icon"><br>
        Описание: <textarea name="description"></textarea><br>
        <input type="submit" name="add_product" value="Добавить">
    </form>

    <h1>Удалить продукт</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        ID продукта: <input type="text" name="id"><br>
        <input type="submit" name="delete_product" value="Удалить">
    </form>

    <h1>Список продуктов</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Иконка игры</th>
            <th>Описание</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td><?php echo $row["icon"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php mysqli_close($conn); ?>
