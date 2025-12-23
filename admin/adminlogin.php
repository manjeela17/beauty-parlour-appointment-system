<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
    <style>
     body {
            background-image: url('https://static.vecteezy.com/system/resources/previews/004/487/827/non_2x/seamless-pattern-of-hairdressing-tools-scissors-combs-spray-rose-butterfly-beads-perfume-profile-of-a-girl-with-a-hairstyle-image-free-vector.jpg');
        
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    nav {
            display: flex;
            justify-content: center;
            background-color: #333; /* Change background color */
        }

        nav a {
            color: white; /* Set text color */
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color:black; /* Change background color on hover */
        }
    nav {
        text-align: center;
        background-color:#7f6a8d;
      padding: 25px 20px;
    }
    nav a {
      font-size:20px;
      color: #fff;
      text-decoration: none;
      margin-right: 20px;
    }
    .container {
        margin-top:150px;
      padding: 20px;
    }
        .login-container {
            width: 300px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container form label {
            display: block;
            margin-bottom: 10px;
        }

        .login-container form input[type="email"],
        .login-container form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container form button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-container form p {
            margin-top: 10px;
           
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #333; /* Change background color */
        }

        nav a {
            color: white; /* Set text color */
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #555; /* Change background color on hover */
        }
    </style>
</head>
<body>

  
<?php
        session_start();
        if(isset($_SESSION['admin_id'])){
        
           echo '<a href="adminlogout.php">Logout</a>';
        }
    
        ?>
<div class="container">
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="../includes/adminlogininc.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address with a domain and top-level domain">



            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" id="submit" name="submit" required>Login</button>
          
            <p><a href="../index.php">Back to user Home</a></p>
        </form>
    </div>
</div>
</body>
</html>
