<?php

/**
 * This code snippet includes the necessary files and requires the header.php file.
 * It is used to set the CSS, JS, and image paths and include the header in a PHP file.
 */
require_once("./blocks/db.php");

$css1 = "../css/home.css";
$css2 = "../css/app.css";
$js = "../js/slider.js";
$img = "../img/";
require_once("./blocks/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Trebuchet MS', Helvetica;
        }

        body {
            background: #030f21;
        }

        /* Стили для карточки продукта */
        .product-card {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: white;
            text-decoration: none;
            /* Убираем подчеркивание ссылки */
            transition: transform 0.3s ease;
            /* Плавное изменение размера при наведении */
            display: block;
        }

        .product-card:hover {
            transform: scale(1.05);
            /* Увеличиваем размер при наведении */
        }

        .product-card img {
            display: block;
            /* чтобы применить text-align: center */
            margin: 0 auto;
            /* центрирование изображения */
            width: 100%;
            height: 60%;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .product-info {
            text-align: center;
        }

        .product-info p {
            margin: 10px 0;
        }

        .highlight {
            font-weight: bold;
            color: #a18ce2;
        }
    </style>
</head>

<body>
    <br><br><br><br><br><br>

    <?php

    /**
     * This code snippet performs a search query based on the 'query' parameter in the GET request.
     * It executes an SQL query to search for matches in the 'Name' and 'Description' fields of the 'Product' table.
     * If there are matches, it displays the search results by iterating over the result set and highlighting the search query in the 'Name' and 'Description' fields.
     * Each search result is displayed as a product card with an image, name, price, platform, engine, and description.
     * The product card is wrapped in an anchor tag with a link to the product_template.php page.
     * If there are no matches, it displays a message indicating no results found.
     * Finally, it closes the database connection.
     */
    if (isset($_GET['query'])) {
        $search_query = $_GET['query'];
        // SQL запрос для поиска совпадений по полям Name и Description
        $sql = "SELECT * FROM Product WHERE Name LIKE '%$search_query%' OR Description LIKE '%$search_query%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Вывод результатов поиска
            while ($row = $result->fetch_assoc()) {
                // Подсветка совпадений в полях Name и Description
                $name = str_ireplace($search_query, '<span class="highlight">' . $search_query . '</span>', $row['Name']);
                $description = str_ireplace($search_query, '<span class="highlight">' . $search_query . '</span>', $row['Description']);

                // Оборачиваем всю карточку в тег <a> и указываем ссылку на страницу продукта
                echo "<a href='product_template.php?id={$row['ProductID']}' class='product-card'>";
                echo "<img src='/uploads/{$row['Icon']}' alt='{$row['Name']}'>";
                echo "<div class='product-info'>";
                echo "<p><strong>{$name}</strong></p>";
                echo "<p>Price: $" . number_format($row['Price'], 2) . "</p>";
                echo "<p>Platform: {$row['Platform']}</p>";
                echo "<p>Engine: {$row['Engine']}</p>";
                echo "<p>Description: {$description}</p>";
                echo "</div>";
                echo "</a>";
            }
        } else {
            echo "No results found.";
        }
    }
    $conn->close();
    ?>
    <br><br><br>
</body>

</html>