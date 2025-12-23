<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>

<link rel="stylesheet" href="styles.css">
<style>
   body {
    background-image: url('https://us.123rf.com/450wm/juliaemelianova/juliaemelianova2101/juliaemelianova210100065/162777587-seamless-pattern-manicure-tools-on-a-pink-background-vector-illustration-hand-drawing-manicure-tools.jpg?ver=6');
    background-size: auto;
    background-repeat: repeat; /* Adjust repeat if needed */
    background-position: center; /* Center the background image */
}

    .container {
        max-width: 400px;
        margin: 50px auto;
        background-color:#f7dcee;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        font-size:30px;
        text-align: center;
        margin-bottom: 20px;
        color:deeppink
        
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    input[type="submit"] {
        width: 100%;
        background-color: #be65da;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .error-message {
        color: red;
        margin-top: 5px;
    }
</style>
</head>
<body>

<section id="header" class="header">
    <a href="#" class="logo">HEY!GIRL'S</a>
    <nav class="navbar">
    <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="service.php">Services</a>
        <a href="contact.php">Contact Us</a>
        <a href="login.php">Login</a>  |  <a href="register.php">Register</a>
    </nav>
</section>
<div class="container">
    <h2>Register</h2>
    <form id="registrationForm" action="includes/registerinc.php" method="post" onsubmit="return validateForm()">
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Enter username" name="username" required>
        <div id="usernameError" class="error-message"></div>
        
        <label for="email">Email</label>
        <input type="email" id="email"placeholder="Enter email" name="email" required>
        <div id="emailError" class="error-message"></div>

        <label for="phone_number">Phone Number</label>
        <input type="tel" id="phone_number" placeholder="Enter phone number" name="phone_number">
        <div id="phone_numberError" class="error-message"></div>
        
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter password" name="password" required>
        <div id="passwordError" class="error-message"></div>
        
        <label for="repeat_password">Repeat Password</label>
        <input type="password" id="repeat_password" placeholder="Enter repeat password"name="repeat_password" required>
        <div id="repeatPasswordError" class="error-message"></div>
        
        <!-- <input type="submit" value="Register"> -->
        <button type="submit" name="submit">Register</button>
        <p>Already have an account?<a href="login.php">Login now!</a></p>
    </form>
</div>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var phone_number = document.getElementById("phone_number").value;
        var password = document.getElementById("password").value;
        var repeatPassword = document.getElementById("repeat_password").value;
       
        var usernameError = document.getElementById("usernameError");
        var emailError = document.getElementById("emailError");
        var phone_numberError = document.getElementById("phone_numberError");
        var passwordError = document.getElementById("passwordError");
        var repeatPasswordError = document.getElementById("repeatPasswordError");



        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]{2,3}$/; // Modified to allow 2-3 characters after the dot
        var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; // At least 8 characters, one letter, and one number
        var phone_numberPattern = /^\d{10}$/; // Assuming a 10-digit phone number format, adjust as needed
        

        if (!username.match(/^[a-zA-Z0-9]+$/)) {
            usernameError.innerText = "Username can only contain letters and numbers!";
            return false;
        } else {
            usernameError.innerText = "";
        }

        if (!emailPattern.test(email)) {
            emailError.innerText = "Invalid email format!";
            return false;
        } else {
            emailError.innerText = "";
        }

        if (!phone_number.match(phone_numberPattern)) {
            phone_numberError.innerText = "Invalid phone number format! Please enter a 10-digit number.";
            return false;
        } else {
            phone_numberError.innerText = "";
        }

        if (!password.match(passwordPattern)) {
            passwordError.innerText = "Password must be at least 8 characters long and contain at least one letter and one number!";
            return false;
        } else {
            passwordError.innerText = "";
        }

        if (password !== repeatPassword) {
            repeatPasswordError.innerText = "Passwords do not match!";
            return false;
        } else {
            repeatPasswordError.innerText = "";
        }

        return true;
    }
</script>

</body>
</html>
