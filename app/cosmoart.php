<?php $css1 ="../css/home.css";
$css2 = "../css/app.css";
 require "../blocks/header.php";
 $img = "../img/";
$js = "../js/";

 ?>

    
<div class="product">
    <div class="block_title">CosmoArt</div>

    <div class="product_wr">
        <div class="pr_img">
            <img class="pr-picture" src="<?php echo $img?>1.png" alt="CosmoArt">
        </div>
        <div class="prod_info">
            <div class="prod-iteam">
                <div class="price">Price $20250.50</div>
                <div class="btm"><a href="#">Contact Us</a></div>
            </div>
        </div>
    </div>
</div>


<hr>
<div class="description">
<div class="block_title"> Description</div> 
<div class="text">
    Diary & Gratitude Journal app is designed to enhance your daily reflection and mindfulness practices.
    With the Diary feature, you can capture your thoughts, experiences, and emotions effortlessly.
    <br><br>
    Gratitude Journal feature empowers you to cultivate a positive mindset and focus on the blessings in your life. With this app, you can create a daily gratitude practice by jotting down moments of gratitude, appreciation, and joy.
    <br><br>
    You’ll be amazed at how this simple act can transform your outlook and bring more positivity into your life.
    <br><br>
    The Diary & Gratitude Journal app is more than just a digital notepad – it’s a transformative tool that empowers you to reflect, grow, and cultivate gratitude in your life.
    <br><br>
    Start your journey of self-discovery and mindfulness today, and unlock the power of journaling with this innovative app.   
</div>

<br><br>
</div>
<div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="<?php echo $img?>cs1.png" style="width:100%">
     
    </div>
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="<?php echo $img?>cs3.png" style="width:100%">
      
    </div>
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="<?php echo $img?>cs4.png" style="width:100%">
     
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
  <script src="<?php echo $js?>slider4.js"></script>
 

<div id="apps" style="margin-top: 100px; margin-bottom: -250px;">
    <br><br><br>
    <h1>Oter apps and games</h1>
    <div class="image-strip">
        <a href="pumpkins.php" class="game g-4" style="--img: url(../<?php echo $img?>game3.png);" data-text="Angry Pumpkins"></a>
        <a href="forest.php" class="game g-2" style="--img: url(../<?php echo $img?>game2.png);" data-text="Mysterious Forest"></a>
        <a href="flycat.php" class="game g-3" style="--img: url(../<?php echo $img?>game4.png);" data-text="FlyCat"></a>
        <a href="block.php" class="game g-5" style="--img: url(../<?php echo $img?>game5.png);" data-text="Block Craft"></a>
        <a href="monster.php" class="game g-6" style="--img: url(../<?php echo $img?>game6.png);" data-text="Monster Hunter Now"></a>
    </div>
    

</div>



 
 
 <?php require "../blocks/footer.php" ?>




