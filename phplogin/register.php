<?php
session_start();

require_once("./blocks/db.php");


/**
 * This code snippet validates the registration form data submitted via POST request.
 * It checks if the required fields (username, password, email) are set and not empty.
 * It also validates the email format, username format, and password format.
 * The email format is checked using the FILTER_VALIDATE_EMAIL filter.
 * The username format is checked using a regular expression that allows only alphanumeric characters.
 * The password format is checked using a regular expression that requires at least one uppercase letter, one digit, one special character, and a length between 5 and 20 characters.
 * If any of the validation checks fail, an appropriate error message is displayed and the script exits.
 */

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    exit('Please complete the registration form!');
}

// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
}

if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}

if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~]).{5,20}$/', $_POST['password'])) {
    exit('Password must contain at least one uppercase letter, one digit, and one special character, and be between 5 and 20 characters long!');
}


/**
 * This code snippet checks if a username already exists in the database.
 * If the username exists, it displays an error message.
 * If the username doesn't exist, it inserts a new account into the database with the provided username, password, email, and activation code.
 * The password is hashed using the password_hash function to ensure security.
 * If the account is successfully inserted, the user is redirected to the index.php page and the session variable 'loggedin' is set to true.
 * If there is an error with the SQL statement or the registration fails, an appropriate error message is displayed.
 * The database connection is closed at the end of the code snippet.
 */

$stmt = $con->prepare('SELECT id FROM accounts WHERE username = ?');
if ($stmt) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        echo 'Username exists, please choose another!';
    } else {
        // Username doesn't exists, insert new account
        $stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code) VALUES (?, ?, ?, ?)');
        if ($stmt) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $uniqid = uniqid();
            $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $uniqid);
            if ($stmt->execute()) {
                // Registration successful
                $_SESSION['loggedin'] = true;
                header('Location: ../index.php');
                exit;
            } else {
                // Registration failed
                echo 'Registration failed. Please try again later.';
            }
        } else {
            // Something is wrong with the SQL statement
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the SQL statement
    echo 'Could not prepare statement!';
}

$con->close();
