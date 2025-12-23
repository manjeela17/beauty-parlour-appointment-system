<?php

session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Database connection
    require_once 'database.php';

    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare statement to fetch user data
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['username'];
            // Redirect to dashboard or another page
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid email or password";
        }
    } else {
        // User does not exist
        echo "User does not exist";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
