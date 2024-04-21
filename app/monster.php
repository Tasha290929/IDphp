<?php $css1 ="../css/home.css";
$css2 = "../css/app.css";
 require "../blocks/header.php";
 $img = "../img/";
$js = "../js/";

 ?>


    <div class="product">
        <div class="block_title">Monster Hunter Now</div>

        <div class="product_wr">
            <div class="pr_img">
                <img class="pr-picture" src="<?php echo $img?>monster.png" alt="Monster_Hunter_Now">
            </div>
            <div class="prod_info">
                <div class="prod-iteam">
                    <div class="price">Price $20 000.00</div>
                    <div class="btm"><a href="#">Contact Us</a></div>
                </div>
            </div>
        </div>
    </div>



    <hr>
    <div class="description">
        <div class="block_title"> Description</div>
        <div class="text">
            <p>The thrill of the hunt is calling. Begin your hunting adventure now!</p>
            <br>
            <p> Hunt monsters in the real world:</p>
            <p>Embark on a global quest to track down and hunt some of the most formidable monsters from the Monster
                Hunter universe as they appear in our world. Forge powerful weapons and team up with fellow hunters to
                track down larger-than-life monsters and take them head-on.
            </p>
        </div>



        <br><br><br>
    </div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 4</div>
            <img src="<?php echo $img?>monster_1.png" style="width:100%">

        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 4</div>
            <img src="<?php echo $img?>monster_2.png" style="width:100%">

        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 4</div>
            <img src="<?php echo $img?>monster_3.png" style="width:100%">

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
            <a href="cosmoart.php" class="game g-4" style="--img: url(../<?php echo $img?>1.png);" data-text="CosmoArt"></a>
            <a href="pumpkins.php" class="game g-2" style="--img: url(../<?php echo $img?>game3.png);"
                data-text="Angry Pumpkins"></a>
            <a href="flycat.php" class="game g-3" style="--img: url(../<?php echo $img?>game4.png);"
                data-text="FlyCat"></a>
            <a href="forest.php" class="game g-5" style="--img: url(../<?php echo $img?>forest.png);" data-text="Forest Island"></a>
            <a href="block.php" class="game g-6" style="--img: url(../<?php echo $img?>game5.png);"
                data-text="Craft block"></a>
        </div>


    </div>





<?php require "../blocks/footer.php" ?>

