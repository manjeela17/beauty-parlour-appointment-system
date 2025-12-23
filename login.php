<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
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
        color:deeppink;
        
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
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
    <h2>Login</h2>
    <form action="includes/logininc.php" method="post">
        
        <label for="email">Email</label>
        <input type="email" id="email"  placeholder="Enter email" name="email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password"  placeholder="Enter password" name="password" required>
 
        <button type="submit" name="submit">Login</button>
        <p>don't have an account? <a href="register.php">Register now!</a></p>
        <p>Login as an admin? <a href="admin/adminlogin.php">log in</a></p>
    </form>
</div>
</body>
</html>
