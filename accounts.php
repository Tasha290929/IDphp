<?php

/**
 * This code snippet checks if a username already exists in the database.
 * If the username exists, it displays an error message.
 * If the username doesn't exist, it inserts a new account into the database with the provided username, password, email, and activation code.
 * The password is hashed using the password_hash function to ensure security.
 * If the account is successfully inserted, the user is redirected to the index.php page and the session variable 'loggedin' is set to true.
 * If there is an error with the SQL statement or the registration fails, an appropriate error message is displayed.
 * The database connection is closed at the end of the code snippet.
 */
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['name'] !== 'admin') {
    // Если пользователь не администратор, перенаправляем его на index.php
    header('Location: index.php');
    exit;
}

require_once('./blocks/db.php');


$sql = "SELECT id, username, email FROM accounts";
$result = $conn->query($sql);

// Вывод HTML-разметки для отображения пользователей
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Users</title>
    <!-- Подключение стилей Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Registered Users</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Выводим данные каждого пользователя в таблицу
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            // Если нет зарегистрированных пользователей, выводим сообщение
            echo "<tr><td colspan='3'>No registered users found</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="./phplogin/logout.php" class="btn btn-primary">Logout</a>
</div>

</body>
</html>
