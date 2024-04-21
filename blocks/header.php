<!DOCTYPE html>
<h lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo $css1?> ">
    <link rel="stylesheet" href="<?php echo $css2?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>APPwill</title>
    <?php
    $currentPage = basename($_SERVER['SCRIPT_FILENAME']);

    if ($currentPage === '../app/blog.php') {
        echo '<style>
        /*фон*/
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;

        }

        body {
            margin: 0;
            padding: 0;
            background: #fff; /* Белый фон */
            font-family: Arial, sans-serif;
            color: #000; /* Цвет текста */
        }
    </style>';
    } else {
        echo '<style>
        /*фон*/
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #000000, #030f21, #263356);
            background-repeat: no-repeat;
            overflow-x: hidden;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            color: #fff;
            /* Цвет текста на фоне градиента */
            min-height: 100vh;
        }
        .search-container {
            text-align: center;
            margin-top: 50px;

        }
        .search-container input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 2px solid #a18ce2;
            border-radius: 5px;
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.5);
            font-size: 16px;
            outline: none;

        }
        .search-container input[type="submit"] {
            background-color: #a18ce2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.5);
        }
        .search-container input[type="submit"]:hover {
            background-color: #7e5da4;
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.5);
        }
    </style>';
    }
    ?>
</head>

<body>

    <header>
        <div id="logo" onclick="slowScroll('#top')">
            <img src="<?php echo $img ?>logo1.png" alt="Logo"> <!-- Замените "your-logo.png" на путь к вашему логотипу -->
        </div>
        <?php
        // Проверяем, является ли текущая страница index.php
        $isIndexPage = basename($_SERVER['PHP_SELF']) === 'index.php';
        ?>

        <div id="about">
            <?php if ($isIndexPage): ?>
                <a href="#" onclick="slowScroll('#main')">Home</a>
                <a href="#" onclick="slowScroll('#apps')">Apps</a>
                <a href="../app/blog.php" onclick="slowScroll('#blog')">Blog</a>
                <a href="#" onclick="slowScroll('#aboutt')">About</a>
                <a href="#" onclick="slowScroll('#contact')">Contact</a>
                <?php
                session_start();
                // Проверяем, есть ли начатая сессия
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    // Если сессия начата (пользователь авторизован или зарегистрирован), выводим кнопку выхода
                    echo '<a href="./phplogin/logout.php" onclick="slowScroll(\'#top\')">Logout</a>';
                } else {
                    // Если сессия не начата, выводим ссылки на страницы авторизации и регистрации
                    echo '<a href="../phplogin/athorization.html" onclick="slowScroll(\'#aboutt\')">LogIn</a>';
                    echo '<a href="../phplogin/register.html" onclick="slowScroll(\'#contact\')">SingIn</a>';
                }
                ?>
            <?php else: ?>
                <a href="../index.php" onclick="slowScroll('#main')">Home</a>
                <a href="../index.php" onclick="slowScroll('#apps')">Apps</a>
                <a href="../app/blog.php" onclick="slowScroll('#blog')">Blog</a>
                <a href="../index.php" onclick="slowScroll('#aboutt')">About</a>
                <a href="#" onclick="slowScroll('#contact')">Contact</a>
                <?php
                session_start();
                // Проверяем, есть ли начатая сессия
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    // Если сессия начата (пользователь авторизован или зарегистрирован), выводим кнопку выхода
                    echo '<a href="./phplogin/logout.php" onclick="slowScroll(\'#top\')">Logout</a>';
                } else {
                    // Если сессия не начата, выводим ссылки на страницы авторизации и регистрации
                    echo '<a href="../phplogin/athorization.html" onclick="slowScroll(\'#aboutt\')">LogIn</a>';
                    echo '<a href="../phplogin/register.html" onclick="slowScroll(\'#contact\')">SingIn</a>';
                }
                ?>
            <?php endif; ?>
        </div>

    </header>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function slowScroll(id) {
            $('html, body').animate({
                scrollTop: $(id).offset().top
            }, 500);
        }

        $(document).on("scroll", function () {
            if ($(window).scrollTop() === 0)
                $("header").removeClass("fixed");
            else
                $("header").attr("class", "fixed");
        });
    </script>
    