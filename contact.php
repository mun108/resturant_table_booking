<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $success_message = "Form submitted successfully!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <link rel="stylesheet" href="styles.css"> 

    <style>
        /* Styles for the success message */
        .success-box {
            position: fixed;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #28a745;
            color: white;
            padding: 20px;
            border-radius: 5px;
            font-size: 18px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 10, 0.2);
            transition: top 0.5s ease;
            z-index: 1000;
            
        }

        /* Show the message */
        .show {
            top: 50px;
        }

        /* Center content */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            margin-top: 0;
            
        }

        .back-link {
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    
    <?php
    if (isset($success_message)) {
        echo "<p style='color: green;'>$success_message</p>";
    }
    ?>

    <a href="contact.html">Go Back to Contact Page</a>
</body>
</html>