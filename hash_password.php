<?php
// The password you want to hash
$adminPassword = 'admin30';

// Hash the password using PASSWORD_DEFAULT (bcrypt)
$hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);

// Output the hashed password
echo "Hashed password for admin: " . $hashedPassword;
?>
