<?php
session_start();
include('db.php');

// Check isession values before redirect
if (isset($_SESSION['user_id'])) {
    //echo "User ID: " . $_SESSION['user_id'] . "<br>";
    //echo "Role: " . $_SESSION['role'] . "<br>";  // This should be 'admin' if logged in as admin
}

// Check if the user is logged in and has the role of 'admin'
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.html");
    exit();
}

// Fetch data you want to display to the admin (e.g., all bookings)
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - The Bengal Kitchen</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        /* Add some styling for a more professional look */
        body {
            font-family: Arial, sans-serif;
            
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #333;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        a {
            display: inline-block;
            margin-top: 2px;
            text-align: center;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Admin Dashboard</h1>
        
        <table>
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>People</th>
                <th>Special Requests</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['booking_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['booking_time']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['number_of_people']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['special_requests']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No bookings found.</td></tr>";
            }
            ?>
        </table>
        <a href="logout.php">Logout</a>
    </div>
    

</body>
</html>
