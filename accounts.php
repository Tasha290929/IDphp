<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['name'] !== 'admin') {
    // Если пользователь не администратор, перенаправляем его на index.php
    header('Location: index.php');
    exit;
}

require_once('./blocks/db.php');

// SQL-запрос для выборки всех зарегистрированных пользователей
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
