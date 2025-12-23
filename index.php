<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty parlour appointment </title>
    <link rel="stylesheet" href="styles.css">
   
</head>
<style>
  body {
   
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;  
}

.hero {
  background-image: URL('https://static.vecteezy.com/system/resources/previews/023/460/527/non_2x/pink-background-with-cosmetic-products-illustration-ai-generative-free-photo.jpg');
  background-size: 1526px;
  background-color: #f9f9f9;
  text-align: left; /* Align text to the left */
  padding: 100px 20px; /* Adjust padding */
}

.hero h1 {
  font-size: 40px;
  color: 000;
/* In your <style> section */

    text-align: right;
}



.hero h2 {
  font-size: 23px;
  color: #666;
  margin-top: 20px;
/* In your <style> section */

    text-align: right;


}


.imagee-container img {
  max-width: 100%;
  width: 400px; /* Set the width of both images */
  height: auto; /* Maintain aspect ratio */
}
.contact {
  background-color: #333;
  color: #fff;
  padding: 50px 0;
  text-align: center;
}

.contact p {
  font-size: 1.2em;
}

footer {
  background-color: #222;
  color: #fff;
  text-align: center;
  padding: 20px 0;
}

footer p {
  margin: 5px 0;
}

footer p:first-child {
  font-weight: bold;
}
footer {
font-size: 15px;
  background-color: #222;
  color: #fff;
  text-align: center;
  padding: 20px 0;
}

footer .container {
  margin-bottom: 20px;
}

footer p {
  margin: 5px 0;
}

footer p span {
  font-weight: bold;
}

footer i {
  margin-left: 10px;
}

footer i:before {
  font-family: "Font Awesome 5 Free";
}

footer p:first-child {
  font-weight: bold;
}


</style>

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

  <section class="hero">
    <div class="container">
    
      <h1>Welcome to our Parlour Appointment System</h1>

      <h2>Book your beauty appointments effortlessly with us!


<h2>
    
  <div class="imagee-container">
    <img src="https://media.istockphoto.com/id/1314528208/photo/wedding-make-up-artist-making-professional-bride-makeup-bridal-eyeshadow-palette-wedding.jpg?s=612x612&w=0&k=20&c=ukuzhe61MX5zUcbRLjwxlnXxjNqthV69PPXeR_XguxA=" alt="Image 4"> 
    <img src="https://media.istockphoto.com/id/1349298950/photo/close-up-of-unrecognizable-hairdresser-cutting-a-female-customer%C3%A2s-hair.jpg?s=612x612&w=0&k=20&c=s-FpOPuIcR5ULS7pKldF2AMNgmD2-sq_wzsTzqPUoxM=" alt="Image 2">
 
   
  </div>
</section>



  <footer>
    <div class="container">
      <p>If you have any questions or inquiries, feel free to <a href="contact.php" class="button">Contact Us</a>        
      <div class="container">
        <p>Parlour Appointment System</p>
      </div>
    </div>
  </footer>
</body>
</html>
