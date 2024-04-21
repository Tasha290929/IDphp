<?php $css1 ="../css/home.css";
$css2 = "../css/app.css";
 require "../blocks/header.php";
 $img = "../img/";
$js = "../js/";

 ?>


<div class="product">
    <div class="block_title">Angry Pumpkins</div>

    <div class="product_wr">
        <div class="pr_img">
            <img class="pr-picture" src="<?php echo $img?>game3.png" alt="Angry_Pumpkins">
        </div>
        <div class="prod_info">
            <div class="prod-iteam">
                <div class="price">Price $2050.00</div>
                <div class="btm"><a href="#">Contact Us</a></div>
            </div>
        </div>
    </div>
</div>



    <hr>
    <div class="description">
        <div class="block_title"> Description</div>
        <div class="text">
            Control your bounce to collect as much candy as you can, toilets give extra candy. Watch out for those
            skulls, makes you super angry!
            <br><br>
            Most of this game was developed during the "Southampton Halloween Game Jam 2023", which was a lot of fun!
            Post game jam, I completed the game loop, added SFX and some slight visuals to assist with playing.
            <br><br> <br><br> <br><br>

        </div>

        <div class="block_title"> Data safety</div>
        <div class="text">
            <br><br>
            Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.
            <br><br>
        </div>


        <br><br>
    </div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="<?php echo $img?>game3_1.png" style="width:100%">

        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="<?php echo $img?>game3_2.png" style="width:100%">

        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="<?php echo $img?>game3_3.png" style="width:100%">

        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <script src="<?php echo $js?>slider.js"></script>


    <div id="apps" style="margin-top: 100px; margin-bottom: -250px;">
        <br><br><br>
        <h1>Other apps and games</h1>
        <div class="image-strip">
            <a href="cosmoart.html" class="game g-4" style="--img: url(../<?php echo $img?>1.png);"
                data-text="CosmoArt"></a>
            <a href="forest.html" class="game g-2" style="--img: url(../<?php echo $img?>forest.png);"
                data-text="Forest_Island"></a>
            <a href="flycat.php" class="game g-3" style="--img: url(../<?php echo $img?>game4.png);" data-text="FlyCat"></a>
            <a href="ссылка_для_Block_Craft" class="game g-5" style="--img: url(../<?php echo $img?>game5.png);"
                data-text="Block Craft"></a>
            <a href="ссылка_для_CosmoArt" class="game g-6" style="--img: url(../<?php echo $img?>game6.png);"
                data-text="Monster Hunter Now"></a>
        </div>


    </div>



    <?php require "../blocks/footer.php" ?>
