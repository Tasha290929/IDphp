<?php
/**
 * This code snippet includes several PHP require_once statements to include necessary files and resources.
 * It includes the db.php file, which likely contains the database connection code.
 * It also includes CSS and JavaScript files for styling and functionality.
 * Additionally, it includes the header.php file, which likely contains the header section of the HTML document.
 * This code snippet is typically used at the beginning of a PHP file to include necessary dependencies and resources.
 */
require_once("./blocks/db.php");


$css1 = "../css/home.css";
$css2 = "../css/app.css";
$js = "../js/slider.js";
$img = "../img/";
require_once("./blocks/header.php");
// SQL запрос для выборки всех продуктов
$sql = "SELECT * FROM Product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="styles.css">
    <style>
              html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Trebuchet MS', Helvetica;
        }
        body {
            background: #030f21;
        }
        .bod{
            margin: 10ch;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start; /* Начинать новую строку с левого края */
            align-items: center;
            margin-top: 20px;
            
        }
        .product-card {
            width: 18%;
            margin: 10px; /* отступ сверху и снизу */
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            background-color: #a18ce2;
        }
        .product-card img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        
    </style>
</head>
<body>
<div class="bod">
    <br>
<h1><B>Shop</B></h1>

<div class="product-container">
    <?php
    /**
 * This code snippet is a part of a PHP script that displays product cards with brief information.
 * It checks if there are any products to display and then loops through the result set to generate the product cards.
 * Each product card includes an image, name, and price.
 * After every 5th product, a empty block is added for alignment purposes.
 * If there are no products to display, it outputs a message indicating so.
 */
    // Проверка наличия продуктов
    if ($result->num_rows > 0) {
        // Вывод иконок продуктов с краткой информацией
        $counter = 0;
        while($row = $result->fetch_assoc()) {
            echo '<div class="product-card">';
            echo '<a href="product_template.php?id=' . $row['ProductID'] . '"><img src="/uploads/' . $row['Icon'] . '" alt="' . $row['Name'] . '"></a>';
            echo '<p><strong>' . $row['Name'] . '</strong></p>';
            echo '<p>$' . number_format($row['Price'], 2) . '</p>';
            echo '</div>';
            // После каждого 5-го элемента добавляем пустой блок для выравнивания
            $counter++;
            if ($counter % 5 == 0) {
                echo '<div style="flex-basis: 100%;"></div>';
            }
        }
    } else {
        echo "No products to display.";
    }
    ?>
</div>
</div>
</body>
</html>
<?php require_once("./blocks/footer.php")?>
