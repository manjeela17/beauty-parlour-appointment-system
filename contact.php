<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .contact-info {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .contact-info p {
            margin: 0;
        }
        .social-links {
            margin-top: 20px;
        }
        h2 {
            font-size: 25px;
            color: palevioletred;
        }
        p {
            font-size: 15px;
        }
     h1{
    font-size: 80px;
    text-align: center;
    background-image: url('https://i.pinimg.com/564x/63/9f/1f/639f1ff637ccb52764d4a629a5eb8ac9.jpg');
    width: 1600px;
    height:110px;

    color:#bef4edfa;
    }
        @media screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .contact-info {
                flex-direction: column;
                align-items: center;
            }
            h1 {
                font-size: 30px;
            }
        }
    </style></head>
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
    <h1>Contact Us</h1>
    <div class="container">
        <div class="contact-info">
            <div>
                <h2>Phone</h2>
                <p>123-456-7890</p>
            </div>
            <div>
                <h2>Email</h2>
                <p>parlourbooking@gmail.com</p>
            </div>
            <div>
                <h2>Timing</h2>
                <p>7:00 AM to 8:00 PM</p>
            </div>
        </div>
        <div class="feedback">
    <h2>Leave Your Feedback</h2>
    <form id="feedbackForm" action="includes/feedbackinc.php" method="POST">
    <?php
    if(isset($_SESSION['user_id'])){
    ?>
      
        <label for="feedback_message">Your Message:</label><br>
        <textarea id="feedback_message" name="feedback_message" rows="6" cols="50" placeholder="Enter your feedback message" required></textarea><br>
        <input type="submit" name="submit" value="submit">
        
    </form>
    <?php 
    } else {
        // User is not logged in, display a message to log in first
        echo '<p>Please <a href="login.php">login</a> to leave your feedback.</p>';
    }
    ?>
</div>

        <div class="social-links">
            <h2>Connect With Us</h2>
            <p>Stay connected with us on social media for the latest updates, promotions, and beauty tips:</p>
            <a href="[Facebook Link]">Facebook</a> | <a href="[Twitter Link]">Twitter</a> | <a href="[Instagram Link]">Instagram</a>
        </div>
    </div>

    <script>
        document.getElementById("feedbackForm").addEventListener("submit", function() {
            alert("Your feedback has been successfully submitted. Thank you for sharing your thoughts with us!");

        });
    </script>

</body>
</html>
