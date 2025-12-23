<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Database connection
    $servername = "localhost"; // Change this if your database is hosted elsewhere
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "parlour"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
// Get form data and sanitize inputs
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

// Debugging: Output form data to check if it's received correctly
echo "Received form data:<br>";
echo "Username: " . $username . "<br>";
echo "Email: " . $email . "<br>";
echo "Password: " . $password . "<br>";
echo "Phone_Number: " . $phone_number . "<br>";


    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, phone_number, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $phone_number, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
