<?php
session_start();
include('db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to fetch the user
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Debugging: check if we fetched the right user
        echo "User found: " . $user['username'];

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id']; // Assuming the user table has an 'id' column
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect to the appropriate dashboard
            if ($user['role'] === 'admin') {
                echo "Admin login successful!";
                header("Location: admin_dashboard.php");
            } else {
                echo "User login successful!";
                header("Location: book_table.php");
            }
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No account found with that username.";
    }
}
?>
