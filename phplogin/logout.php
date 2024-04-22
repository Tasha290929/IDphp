<?php
/**
 * This code snippet is not a class, function, or method. It is a sequence of PHP statements.
 * 
 * The code starts by calling the session_start() function to initialize the session.
 * Then, it calls the session_destroy() function to destroy all data registered to a session.
 * Finally, it uses the header() function to redirect the user to the index.php page.
 */
session_start();
session_destroy();
header('Location: ../index.php');




