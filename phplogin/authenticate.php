<?php
session_start();

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'appwill';


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

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    displayErrorPage('Failed to connect to MySQL: ' . mysqli_connect_error());
    exit();
}



// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['username'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    displayErrorPage('Please fill both the username and password fields!');
    exit();
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
            displayErrorPage('Incorrect password!');
            exit();
        }
    } else {
        displayErrorPage('Incorrect username!');
        exit();
    }

    $stmt->close();
}
?>
