<?php $css1 ="../css/home.css";
$css2 = "../css/app.css";
 require "../blocks/header.php";
 $img = "../img/";
$js = "../js/";

 ?>

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


    <div class="product">
        <div class="block_title">FlyCat</div>

        <div class="product_wr">
            <div class="pr_img">
                <img class="pr-picture" src="<?php echo $img?>game4.png" alt="FlyCat">
            </div>
            <div class="prod_info">
                <div class="prod-iteam">
                    <div class="price">Price $450.00</div>
                    <div class="btm"><a href="#">Contact Us</a></div>
                </div>
            </div>
        </div>
    </div>



    <hr>
    <div class="description">
        <div class="block_title"> Description</div>
        <div class="text">

            <p> Flying Cat Pet fly Adventure for windows desktop is an arcade fun game. You have to fly the cute cat on,
                collect delicious fish cookies and also be careful from the iceblock towers and spikes!</p>
            <p> Help the tiny cat make his way through the dangerous spikes and obstacles</p>
            <p> How to play: Simply touch anywhere on your device screen to fly the cat. Up arrow or w key(keyboard) or
                left button on mouse.</p>
            <p> This game is for both children and adults.</p>
            <p> Flying Cat Christmas Games Windows pc.</p>
            <p> Fun games, Games for children. Cute Games.</p>
            <p> Cat games for kids.</p>

        </div>



        <br><br><br>
    </div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="<?php echo $img?>flycat_1.png" style="width:100%">

        </div>
        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="<?php echo $img?>flycat_2.png" style="width:100%">

        </div>
        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="<?php echo $img?>flycat_3.png" style="width:100%">

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
            <a href="cosmoart.html" class="game g-4" style="--img: url(../<?php echo $img?>1.png);" data-text="CosmoArt"></a>
            <a href="pumpkins.html" class="game g-2" style="--img: url(../<?php echo $img?>game3.png);" data-text="Angry Pumpkins"></a>
            <a href="dansing.php" class="game g-3" style="--img: url(../<?php echo $img?>game10.png);" data-text="Dancing Music Road"></a>
            <a href="block.php" class="game g-5" style="--img: url(../<?php echo $img?>game5.png);" data-text="Block Craft"></a>
            <a href="monster.php" class="game g-6" style="--img: url(../<?php echo $img?>game6.png);" data-text="Monster Hunter Now"></a>
        </div>


    </div>



    <?php
    require "../blocks/footer.php"
    ?>

