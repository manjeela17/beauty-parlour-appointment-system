<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us</title>
<link rel="stylesheet" href="styles.css">
</head>
<style>
body {
    background-image: url('https://us.123rf.com/450wm/juliaemelianova/juliaemelianova2101/juliaemelianova210100065/162777587-seamless-pattern-manicure-tools-on-a-pink-background-vector-illustration-hand-drawing-manicure-tools.jpg?ver=6');
    background-size: auto;
    background-repeat: repeat; /* Adjust repeat if needed */
    background-position: center; /* Center the background image */
}
.container {
     
    display: flex;
    justify-content: space-between;
    align-items: flex-start; /* Align items to the top */
    padding: 20px;
}

.text-box {
    flex: 4; /* Increase the flex value to make the box bigger */
    padding: 20px;
  
    border-radius: 10px;
    margin-right: 20px;
    text-align: center; /* Center align the text */
}

.image-box {
    flex: 1; /* Set flex to 1 to allow for flexible resizing */
    display: flex;
    flex-direction: column;
}

.image-box img {
    width: 250px; /* Adjust the width as needed */
    height: 250px; /* Adjust the height as needed */
    /* Remove border-radius to make the image square */
    margin-bottom: 20px; /* Add margin between images */
}

h2{
  color:dimgrey;
  font-size: 30px;

}
h1{
    font-size: 80px;
    text-align: center;
    background-image: url('https://i.pinimg.com/564x/63/9f/1f/639f1ff637ccb52764d4a629a5eb8ac9.jpg');
width: 1600px;
height:110px;

color:#bef4edfa;
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
  


<h1>About Us</h1>
<div class="container">
    <div class="text-box">
       
        <h2>Our main focus is on quality and hygiene. Our Parlour is well equipped with advanced technology equipments and provides best quality services. Our beautician is well trained and experienced, offering advanced services in Skin, Hair and Body Shaping that will provide you with a luxurious experience that leave you feeling relaxed and stress free. The specialities in the parlour are, apart from regular bleachings and Facials, many types of hairstyles, Bridal and cine make-up and different types of Facials & fashion hair colourings.</h2>
    </div>
    <div class="image-box">
        <img src="https://media.istockphoto.com/id/1497806504/photo/hair-styling-in-beauty-salon-woman-does-her-hair-in-modern-beauty-salon-woman-stylist-dries.jpg?s=612x612&w=0&k=20&c=3dO_HWS8WvSGNbGmxTsqK70vZMGqM2REnbVJG09YnmI=" alt="Image Description">
        <img src="https://media.istockphoto.com/id/1296431297/photo/a-beautiful-young-woman-with-long-hair-doing-makeup-for-a-wedding-or-photo-shoot.jpg?s=612x612&w=0&k=20&c=btIpSQbq1g5g1j4q-xoiN3oRFvKG0Ko5-9isIk_-yI0=" alt="Image Description">
       
    </div>
</div>

</body>
</html>
