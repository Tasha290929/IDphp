<?php 

$title = "Your Page Title";
$css1 = "../css/home.css";
$css2 = "../css/app.css";
$img = "../img/";
$js = "../js/";

require "../blocks/header.php";

ob_start();

require_once "../function/content.php";

require "../blocks/footer.php"; ?>

<script src="<?php echo $js; ?>slider4.js"></script>