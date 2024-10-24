<?php
session_start();

// Mock OTP for demonstration
$expected_otp = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];

    // Check if the entered OTP matches the expected OTP
    if ($entered_otp === $expected_otp) {
        // OTP verified, redirect to booking page
        echo "OTP Verified!";
        header("Location: book_table.php");
    } else {
        // Invalid OTP, show error message
        echo "Invalid OTP. Please try again.";
    }
}
?>
