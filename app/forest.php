<?php $css1 ="../css/home.css";
$css2 = "../css/app.css";
 require "../blocks/header.php";
 $img = "../img/";
$js = "../js/";

 ?>


    
<div class="product">
    <div class="block_title"> Forest Island</div>

    <div class="product_wr">
        <div class="pr_img">
            <img class="pr-picture" src="<?php echo $img?>forest1.png" alt="Angry_Pumpkins">
        </div>
        <div class="prod_info">
            <div class="prod-iteam">
                <div class="price">Price $45 000.00</div>
                <div class="btm"><a href="#">Contact Us</a></div>
            </div>
        </div>
    </div>
</div>



    <hr>
    <div class="description">
        <div class="block_title"> Description</div>
        <div class="text">
          
<p>Tired of gray everyday life? Do you dream of taking a break from the hustle and bustle and relaxing?</p>
<p>We present to your attention a calming anti-stress game that will help you escape from daily worries.</p>
<br>
<p>Say no to stress!</p>
<p>Create your own island with white sandy beaches in the heart of the endless ocean.</p>
<p>Light forest breeze, sounds of nature... Sounds great, right?</p>

        </div>



        <br><br><br>
    </div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="<?php echo $img?>forest_1.png" style="width:100%">

        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="<?php echo $img?>forest_2.png" style="width:100%">

        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="<?php echo $img?>forest_3.png" style="width:100%">

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
            <a href="pumpkins.html" class="game g-2" style="--img: url(../<?php echo $img?>game3.png);"
                data-text="Angry Pumpkins"></a>
            <a href="ссылка_для_FlyCat" class="game g-3" style="--img: url(../<?php echo $img?>game10.png);" data-text="Dancing Music Road"></a>
            <a href="ссылка_для_Block_Craft" class="game g-5" style="--img: url(../<?php echo $img?>game5.png);"
                data-text="Block Craft"></a>
            <a href="ссылка_для_CosmoArt" class="game g-6" style="--img: url(../<?php echo $img?>game6.png);"
                data-text="Monster Hunter Now"></a>
        </div>


    </div>



<?php 
require "../blocks/footer.php"
?>
