<?php
/**
 * This code snippet is a PHP script that handles user login functionality.
 * It starts a session, connects to a database, and checks if the provided username and password match an account in the database.
 * If the login is successful, it creates session variables to indicate that the user is logged in and redirects them to the appropriate page.
 * If the login fails, it displays an error message indicating whether the username or password is incorrect.
 */
session_start();

require_once("./blocks/db.php");

if (!isset($_POST['username'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            if ($_POST['username'] === 'admin' && $id === 3) {
                // If the user is admin, redirect to addproduct.php
                header('Location: ../addproduct.php');
                exit;
            } else {
                // For other users, redirect to index.php
                header('Location: ../index.php');
                exit;
            }
        } else {
            echo 'Incorrect password!';
        }
    } else {
        echo 'Incorrect username!';
    }

    $stmt->close();
}
