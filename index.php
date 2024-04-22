<?php

/**
 * This code snippet retrieves data from a database table named "Product" and stores it in the variable $result.
 * The SQL query selects all rows from the "Product" table.
 * The connection to the database is established using the require_once function to include the "db.php" file.
 * The CSS and image paths are defined in variables $css1, $css2, and $img.
 * The $app variable is set to the path "./app/".
 * The code snippet also includes the "header.php" file using the require_once function.
 */
$css1 =  "./css/home.css";
$css2 =  "./css/app.css";
$img = "./img/";

$app = "./app/";

require_once("./blocks/header.php");
require_once("./blocks/db.php");

// Получение данных о всех продуктах из базы данных
$sql = "SELECT * FROM Product";
$result = $conn->query($sql);
?>

<div id="top">
    <pre>
   <div id="intrr">
Marketplace for 
selling and buying 
your app or game</div>
<div ><h3>
Find the best android and IOS app which generate profit
Search Online Businesses for Sale </h3></div>
        <a href="#" onclick="slowScroll('#apps')"><div id="button">Scroll below</div></a>   
</pre>

    <div class="container1 ">
        <div class="boxx box-1" style="--img: url(../<?php echo $img ?>1.png);" data-text="CosmoArt"></div>
        <div class="boxx box-2" style="--img: url(../<?php echo $img ?>game2.png);" data-text="Mysterious Forest"></div>
        <div class="boxx box-3" style="--img: url(../<?php echo $img ?>game4.png);" data-text="FlyCat"></div>
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function slowScroll(id) {
        $('html, body').animate({
            scrollTop: $(id).offset().top
        }, 500);
    }

    $(document).on("scroll", function() {
        if ($(window).scrollTop() === 0)
            $("header").removeClass("fixed");
        else
            $("header").attr("class", "fixed");
    });
</script>





<div id="apps" style="margin-top: 100px;">
    <h1>Apps and games</h1>
    <div class="image-strip">
        <?php
        /**
         * This code snippet retrieves data from a database table named "Product" and displays the product icons.
         * It checks if there are any products in the database and limits the display to a maximum of 5 products.
         * Each product is displayed as an HTML link with an image and name.
         * The link leads to a product template page with the product ID as a parameter.
         * If there are no products, it displays a message indicating that there are no products to display.
         */


         $sql = "SELECT * FROM Product ORDER BY ProductID DESC LIMIT 5";
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
             // Инициализация переменной для подсчета добавленных продуктов и остановки вывода после 5 продуктов
             $added_products = 0;
             // Создание массива для хранения HTML-кода блоков с продуктами
             $product_blocks = array();
         
             // Вывод иконок продуктов в порядке добавления
             while ($row = $result->fetch_assoc()) {
                 // Формирование HTML-кода для каждого продукта
                 $product_block = '<a href="product_template.php?id=' . $row['ProductID'] . '" class="game g-' . ($added_products % 5 + 1) . '" style="--img: url(\'/uploads/' . $row['Icon'] . '\');" data-text="' . $row['Name'] . '" target="_blank"></a>';
                 // Добавление HTML-кода продукта в массив
                 $product_blocks[] = $product_block;
                 // Увеличение счетчика добавленных продуктов
                 $added_products++;
             }
         
             // Вывод HTML-кода строк с продуктами
             foreach ($product_blocks as $product_block) {
                 echo $product_block;
             }
         } else {
             echo "No products to display.";
         }
         
        ?>
    </div>
    <br><br><br>
    <br><br><br>
    <h1><a href="./shop.php" style="color:black"> --> See the whole Shop </a></h1>

    <br><br><br>

    <div class="search-container">
        <form action="search_results.php" method="GET">
            <input type="text" placeholder="Search.." name="query">
            <input type="submit" value="Search">
        </form>
    </div>
</div>












<div id="aboutt">
    <br>

    <h1>
        Selling a game is a good <br>
        possibility you might not <br>
        even think about before
    </h1>
    <h3>Let us explain why and when this could be beneficial</h3>
</div>


<div class="cards">
    <div class="cont">
        <div class="cards-holder">
            <div class="card">
                <div class="card-image">
                    <img class="card-img" src="<?php echo $img ?>about2-1.png">
                </div>
                <div class="card-title">If the game requires too much attention and does not pay off</div>
                <div class="card-desc">
                    Maintaining and developing a game is a very laborious endeavor. It is especially difficult to do
                    this when the game is not growing anymore, and its income constantly stagnates. It’s easier <b>
                        sell the game and focus on more promising projects.</b>
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img class="card-img" src="<?php echo $img ?>about2-2.png">
                </div>
                <div class="card-title">If for some reasons the game cannot be supported anymore</div>
                <div class="card-desc">
                    Abandoned games tend to fall slowly but steadily in their income. The game should be sold, the
                    sooner the better, while it has not reached the bottom in terms of income, <b>and the money
                        received can be immediately directed to new and profitable projects.</b>
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <img class="card-img" src="<?php echo $img ?>about2-3 .png">
                </div>
                <div class="card-title">If the game audience and cash flow is rising, now is the time to sell it
                </div>
                <div class="card-desc">
                    A good indicator to establish a gaming product’s value is generally based on its gross last
                    3-month sales records which is directly proportional in the maximum price. If the game has
                    reached a record profit, then this is a signal that at the current stage <b>it can be sold for
                        the maximum price.</b>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="titleAAC">
    About — Appwill Сompany
</div>
<div class="mini-title">We develop mobile games and help other studios and
    developers to sell their games</div>
<div class="text-aboutt">
    We cooperate with game publishers all around the world, from The USA to Pakistan.
    We have a wide network of contacts, and we know who is looking to purchase a
    game of a particular genre for a specific budget. This knowledge helps us to be
    perfect in sales:
</div>




<div class="ab-cards">
    <div class="ab-hold">
        <div class="ab-card">
            <div class="ab-image">
                <img class="ab-img" src="<?php echo $img ?>about3-1.png" alt="Description of the image">
            </div>
            <div class="ab-desc">From casual to horror</div>
        </div>

        <div class="ab-card">
            <div class="ab-image">
                <img class="ab-img" src="<?php echo $img ?>about3-2.png" alt="Description of the image">
            </div>
            <div class="ab-desc">Based on DAU, CPI, and in-store position</div>
        </div>

        <div class="ab-card">
            <div class="ab-image">
                <img class="ab-img" src="<?php echo $img ?>about3-3.png" alt="Description of the image">
            </div>
            <div class="ab-desc">From $2,000 up to $3,000,000</div>
        </div>

        <div class="ab-card">
            <div class="ab-image">
                <img class="ab-img" src="<?php echo $img ?>about3-4.png" alt="Description of the image">
            </div>
            <div class="ab-desc">It takes 30 days on average to complete the transaction</div>
        </div>
    </div>
</div>

<div class="grad">
    Publishers are purchasing games to achieve different goals. If you think that your project is not in range, the
    publisher may have enough experience and expertise in a particular sphere to buy your game.
</div>

<br><br><br>


<div class="titleAAC">Selling a game is a great way to free up money and team resource</div>

<div class="ab-cards">
    <div class="ab-hold">
        <div class="ab-card">
            <div class="ab-image2">
                <img class="ab-img2" src="<?php echo $img ?>icon_6_1.png" alt="Description of the image">
            </div>
            <div class="grad"> Sell</div>
            <div class="ab-desc2">the game and focus on
                a promising project</div>
        </div>

        <div class="ab-card">
            <div class="ab-image2">
                <img class="ab-img2" src="<?php echo $img ?>icon_6_2.png" alt="Description of the image">
            </div>
            <div class="grad"> Free up</div>
            <div class="ab-desc2">budgets and direct them
                to new developments</div>
        </div>

        <div class="ab-card">
            <div class="ab-image2">
                <img class="ab-img2" src="<?php echo $img ?>icon_6_3.png" alt="Description of the image">
            </div>
            <div class="grad"> Get</div>
            <div class="ab-desc2">a few years income from
                the game up front</div>
        </div>

    </div>
</div>

</div>
</div>



<?php require_once("./blocks/footer.php");
