# Индивидуальной работа

### Содержание 

[Инструкция по запуску проекта](#i)

[Задание](#task1)  
[Выполнение](#do)  
[Задание 3](#h3)  
[Задание 4](#h4)  
[Домашнее задание](#h5)  

### <a name="i"> Инструкция по запуску проекта</a>

1. **Клонируйте репозиторий**

   Сначала склонируйте репозиторий на свой компьютер с помощью команды:

    ```bash
    git clone https://github.com/CalinNicolai/Web-Programming-Lab-2.git
    ```
2. **Установите PHP**

   Убедитесь, что на вашем компьютере установлен PHP и Composer. Если их нет, вы можете скачать их с официальных веб-сайтов:

   - [Скачать PHP](https://www.php.net/downloads)

3. **Запустите веб-сервер**

   Запустите веб-сервер PHP в директории проекта:

    ```bash
    php -S localhost:8080
    ```

4. **Откройте проект в браузере**

   Откройте ваш любимый веб-браузер и перейдите по адресу 
   
   - [Индивидуальная работа](https://localhost:8080)

   Теперь вы должны увидеть ваш проект в браузере.

*ИЛИ можно запустить через OpenServer*

2. **Установите OpenServer**

Установите OpenServer с официального сайта

3. **Запустите OpenServer**

Нажмите на скаченное приложение, появится красный флажок в области уведомлений Windows. Нажмите на флажок далее выберите зеленый флажок что бы запустить приложение.

4. **Откройте проект в браузере**

Нажмите на флажок -> мои проеты и выберите нужный проект. 

**!ВАЖНО!**

Что бы запустить проект через OpenServer его нужно сохранить в папке  `OpenServer` -> `domains` 


## <a name="task1"> Задание </a>

В качестве «исследовательского проекта» в рамках дисциплины «Вебпрограммирование» предлагается разработать веб-приложение (веб-сайт, rest
api, мессенджер-бота) средней сложности, содержащее функционал,
реализованный на стороне сервера.

 Для реализации индивидуального проекта могут быть использованы любые
fronend и backend веб-технологии.

## <a name="do"> Выполнение </a>
**Мой проект состоит из нескольких страниц**

__Начнем с главной страницы__

* `index.php`

1. Обьявляем переменные для стилей и картинок, поключаемся к базе данных и заголовочной части сайта.

```php
$css1 =  "./css/home.css";
$css2 =  "./css/app.css";
$img = "./img/";

$app = "./app/";

require_once("./blocks/header.php");
require_once("./blocks/db.php");
```

Получаем данные о всех продуктах из базы данных
```php
$sql = "SELECT * FROM Product";
$result = $conn->query($sql);
```

Далее реализована главная страница, она состоит из нескольких частей:

1.1 Титульная страница проекта (первое что видит пользователь заходя на сайт)

[Титульная страница проекта](./readmeimg/home_page.png)

1.2 Лента с ссылками-картинками на продукты 

Картинки и названия выводятся из базы данных и формируется код html для красивого вывода картинок.

```php
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
```

[продукты](./readmeimg/pps.png)

1.3 Сылка на страницу, где можно посмотреть все продукты в продаже и поиск по странице реализованная при помощи метода GET скрипт для поиска находится в файле `search_results`.

```php
    <div class="search-container">
        <form action="search_results.php" method="GET">
            <input type="text" placeholder="Search.." name="query">
            <input type="submit" value="Search">
        </form>
    </div>
</div>
```

[](./readmeimg/shop.png)

1.4 Раздел о компании и что стоит знать покупателю

[](./readmeimg/about.png)

1.5 Подключение файла,который содержит нижнюю часть страницы 

```php
<?php require_once("./blocks/footer.php");
```
В footer использован JS для отображения даты и времени.

```js
function updateDateTime() {
                            var currentDate = new Date();
                            var options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                hour: 'numeric',
                                minute: 'numeric',
                                timeZoneName: 'short'
                            };
                            var formattedDateTime = currentDate.toLocaleDateString('en-US', options);
                            document.getElementById("currentDateTime").innerHTML = formattedDateTime;
                        }
                        updateDateTime();

                        setInterval(updateDateTime, 1000);
```
[footer](./readmeimg/footer.png)

