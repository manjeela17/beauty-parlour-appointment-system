


<!DOCTYPE html>
    <html lang="en">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beauty parlour appointment </title>
    
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="styles.css">
        <style>
           body {
    background-image: url('https://us.123rf.com/450wm/juliaemelianova/juliaemelianova2101/juliaemelianova210100065/162777587-seamless-pattern-manicure-tools-on-a-pink-background-vector-illustration-hand-drawing-manicure-tools.jpg?ver=6');
    background-size: auto;
    background-repeat: repeat; /* Adjust repeat if needed */
    background-position: center; /* Center the background image */
}

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color:#f7dcee;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mprice-list {
            
            align-items: center;
            margin-bottom: 20px;
        }

        .mprice-list h2 {
            font-size: 35px;
            color: #333;
            margin-bottom: 10px;
        }

        .mprice-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mprice-list li {
            font-size: 25px;
            margin-bottom: 10px;
            color: #666;
        }

        .mitem {
            font-weight: bold;
        }

        .price {
           
            color: #ff69b4; /* Pink color */
            font-weight: bold;
        }
        .button{
    font-size: 15px;
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
       
        <?php
        session_start();
        if(isset($_SESSION['user_id'])){
        
           echo '<a href="booking_history.php">Booking history</a>';
           echo '<a href="logout.php">Logout</a>';
           echo '<a href="book.php" class="button">Book your appointment Now</a>';
        }
        else{
            echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
        }
        ?>
    </nav>
    
    </section>



<div class="container">
    <div class="mprice-list">
    <h2>Mehandi</h1>
         
        <ul>
        <li><span class="mitem">One Line</span> - <span class="price">Rs.100</span></li>
        <li><span class="mitem">Full Palm</span> - <span class="price">Rs.200</span></li>
        <li><span class="mitem">Half Hand</span> - <span class="price">Rs.500</span></li> 
            <li><span class="mitem">Full Hand</span> - <span class="price">Rs.800</span></li> 
         

            <li><span class="mitem">Hand and Leg</span> - <span class="price">Rs.1500</span></li> 
         
        </ul>
     </div>
 
</div>
</p> <a href="service.php" class="button"> Back to Service</a>        
</body>
</html>



