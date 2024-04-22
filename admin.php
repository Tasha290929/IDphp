<?php

/**
 * This code snippet handles the addition and deletion of products in a database.
 * 
 * It starts by checking if the request method is POST and if the "add_product" parameter is set.
 * If true, it retrieves the product details from the POST data and inserts them into the "products" table in the database.
 * If the insertion is successful, it echoes a success message. Otherwise, it echoes an error message.
 * 
 * Next, it checks if the request method is POST and if the "delete_product" parameter is set.
 * If true, it retrieves the product ID from the POST data and deletes the corresponding product from the "products" table in the database.
 * If the deletion is successful, it echoes a success message. Otherwise, it echoes an error message.
 * 
 * Finally, it retrieves all the products from the "products" table and displays them in a table on the webpage.
 * 
 * Note: This code assumes the existence of a database connection object ($conn) and a "products" table in the database.
 */
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
        <?php
        /**
         * This code snippet generates an HTML table displaying a list of products.
         * 
         * The table has the following columns: ID, Название, Цена, Иконка игры, Описание.
         * 
         * It uses a while loop to iterate through the result set obtained from the database query.
         * For each row in the result set, it creates a table row (<tr>) and populates it with the corresponding values from the row.
         * 
         * Note: This code assumes the existence of a database connection object ($conn) and a "products" table in the database.
         */
        while ($row = mysqli_fetch_assoc($result)) : ?>
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

<?php mysqli_close($conn); 