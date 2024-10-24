<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // If logged in, redirect to book_table.php
    header("Location: book_table.php");
    exit();
} else {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit();
}
?>
