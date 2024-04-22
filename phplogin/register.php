<?php
session_start();

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'appwill';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    displayErrorPage('Failed to connect to MySQL: ' . mysqli_connect_error());
    exit();
}

function displayErrorPage($errorMessage) {
    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error</title>
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: Arial, sans-serif;
                    background-image: url("../img/error.png");
                    background-size: cover;
                    background-position: center;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }

                .error-message {
                    background-color: rgba(255, 255, 255, 0.8);
                    color: #721c24;
                    border: 1px solid #f5c6cb;
                    padding: 20px;
                    max-width: 80%;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="error-message">
                <strong>Error:</strong> ' . $errorMessage . '
            </div>
        </body>
        </html>
    ';
}

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    // Could not get the data that should have been sent.
    displayErrorPage('Please complete the registration form!');
    exit();
}

// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    // One or more values are empty.
    displayErrorPage('Please complete the registration form!');
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    displayErrorPage('Email is not valid!');
    exit();
}

if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    displayErrorPage('Username is not valid!');
    exit();
}

if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~]).{5,20}$/', $_POST['password'])) {
    displayErrorPage("Password must contain at least one uppercase letter, one digit, and one special character, and be between 5 and 20 characters long!");
    exit();
}

// We need to check if the account with that username exists.
$stmt = $con->prepare('SELECT id FROM accounts WHERE username = ?');
if ($stmt) {
    // Bind parameters (s = string, i = int, b = blob, etc)
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        displayErrorPage('Username exists, please choose another!');
        exit();
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
                exit();
            } else {
                // Registration failed
                displayErrorPage('Registration failed. Please try again later.');
                exit();
            }
        } else {
            // Something is wrong with the SQL statement
            displayErrorPage('Could not prepare statement!');
            exit();
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the SQL statement
    displayErrorPage('Could not prepare statement!');
    exit();
}

$con->close();
