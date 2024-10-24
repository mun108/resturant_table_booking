<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}


include('db.php');

// Booking form submission logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    $number_of_people = $_POST['number_of_people'];
    $special_requests = $_POST['special_requests'];

    // Insert the booking into the database
    $sql = "INSERT INTO bookings (user_id, booking_date, booking_time, number_of_people, special_requests) 
            VALUES ('$user_id', '$booking_date', '$booking_time', '$number_of_people', '$special_requests')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a booking success page
        header("Location: booking_success.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!-- HTML form for booking a table-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color:  #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .booking-container
        {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            margin: auto;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <h2>Reserve a Table</h2>
        <form method="POST" action="">
            <label for="booking_date">Select Date</label>
            <input type="date" name="booking_date" id="booking_date" required>
            
            <label for="booking_time">Select Time</label>
            <input type="time" name="booking_time" id="booking_time" required>
            
            <label for="number_of_people">Number of People</label>
            <input type="number" name="number_of_people" id="number_of_people" placeholder="Number of People" required>
            
            <label for="special_requests">Special Requests</label>
            <textarea name="special_requests" id="special_requests" placeholder="Any special requests?" rows="4"></textarea>
            
            <button type="submit">Book Table</button>
        </form>
    </div>
</body>
</html>