<?php
include('db.php');

//handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    //Insert into users table
    $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username','$password','$email','$role')";

    if($conn->query($sql) === TRUE)
    {
        echo "Registration successful.";
    }
    else
    {
        echo "Error: " . $conn->error;
    }

}
?>
<!-- HTML form for registration  -->
 <form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="email" name="email" placeholder="Email" required>
    <select name="role" required>
        <option value="customer">Customer</option>
        <option value="admin">Admin</option>
    </select>
    <><button type="submit">Register</button>
 </form>