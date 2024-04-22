<?php 

/**
 * This code snippet establishes a connection to a MySQL database using the mysqli extension in PHP.
 * It sets the database name, server name, username, and password, and then creates a connection using the mysqli constructor.
 * If the connection fails, it exits with an error message.
 * The character set is set to UTF-8 for proper encoding.
 */
$dbname = "appwill"; 
$servername = "localhost";
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль базы данных


// Создание подключения
$conn = @new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) exit('Ошибка подключения BD');
$conn->set_charset('utf8');