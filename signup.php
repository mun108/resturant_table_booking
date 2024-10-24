<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form input values
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number']; // Change this from 'mobile' to 'phone_number'
    $password = $_POST['password'];

    // Check if all fields are filled
    if (empty($username) || empty($email) || empty($phone_number) || empty($password)) {
        echo "All fields are required.";
    } else {
        // Check if the username, email, or phone_number already exists
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone_number='$phone_number'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) { // Correct the num_rows access
            echo "Username, email, or phone number already exists.";
        } else {
            // Hash the password before saving it to the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $sql = "INSERT INTO users (username, email, phone_number, password) VALUES ('$username', '$email', '$phone_number', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration Successful!";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
}
?>

