<?php
require_once("./blocks/db.php");

// Проверяем, есть ли переданный ID продукта в URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Получение данных о продукте из базы данных
    $sql = "SELECT * FROM Product WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Подключение файлов CSS и JS
    $css1 = "../css/home.css";
    $css2 = "../css/app.css";
    $js = "../js/slider.js";
$img = "../img/";
    require_once("./blocks/header.php"); // Подключение шапки страницы
?>

    <div class="product">
        <div class="block_title"><?php echo $row['Name']; ?></div>

        <div class="product_wr">
            <div class="pr_img">
                <?php
                // Проверяем наличие изображения продукта и выводим его
                if (!empty($row['Icon'])) {
                    echo '<img class="pr-picture" src="uploads/' . $row['Icon'] . '" alt="' . $row['Name'] . '">';
                } else {
                    echo '<img class="pr-picture" src="no_image.png" alt="No Image">';
                }
                ?>
            </div>
            <div class="prod_info">
                <div class="prod-iteam">
                    <div class="price">Price $<?php echo number_format($row['Price'], 2); ?></div>
                    <div class="platform">Platform: <?php echo $row['Platform']; ?></div>
                    <div class="engine">Engine: <?php echo $row['Engine']; ?></div>
                    <br>
                    <div class="btm"><a href="#">Contact Us</a></div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="description">
        <div class="block_title"> Description</div>
        <div class="text">
            <p><?php echo $row['Description']; ?></p>
        </div>
    </div>

    <div class="description">
        <div class="block_title">Gameplay</div>
        <div class="text" style="text-align: center;">
            <p><?php echo $row['Gameplay']; ?></p>
        </div>

    </div>

<?php require_once("./blocks/footer.php"); // Подключение подвала страницы 
} else {
    // Если ID продукта не передано, выводим сообщение об ошибке
    echo "Product ID is missing.";
}
?>