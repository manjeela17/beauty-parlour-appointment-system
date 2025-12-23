<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'parlour'; // Replace with your database name

// Establish database connection
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// SQL query to fetch service names and IDs
$sql = "SELECT service_id, name FROM services";
$stmt = $pdo->query($sql);

// Fetch all rows as an associative array
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection (optional)
//$pdo = null; // Uncomment if you want to close the connection explicitly

// Handle any potential errors here if needed
// Note: You may consider implementing error handling logic here instead of try-catch.
// This could involve checking $pdo->query() and $stmt for errors.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="styles.css">
    <style>
       body {
    background-image: url('https://us.123rf.com/450wm/juliaemelianova/juliaemelianova2101/juliaemelianova210100065/162777587-seamless-pattern-manicure-tools-on-a-pink-background-vector-illustration-hand-drawing-manicure-tools.jpg?ver=6');
    background-size: auto;
    background-repeat: repeat; /* Adjust repeat if needed */
    background-position: center; /* Center the background image */
}
    .services {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .service-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 100%;
            margin-bottom: 20px;
        }
        .service-box {
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            flex: 0 0 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);
            box-sizing: border-box;
            background-color: #f3d0e8;

        }
        .service-box img {
            width: 100px; /* Set fixed width */
            height: 100px; /* Set fixed height */
            border-radius: 50%; /* Make the image circular */
            object-fit: cover; /* Ensure the image covers the container */
        }
        .service-box p {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: black; /* Change text color to black */
        }
        h1{
    font-size: 80px;
    text-align: center;
    background-image: url('https://i.pinimg.com/564x/63/9f/1f/639f1ff637ccb52764d4a629a5eb8ac9.jpg');
width: 1600px;
height:110px;

  color:#bef4edfa;
}

        .service-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 50px;
        }

        .button:hover {
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
<h1>Our Services</h1>
    <div class="service-grid">
        <?php
        // Define static image URLs associated with service names
        $serviceImages = array(
            "Makeup" => "https://i.pinimg.com/564x/79/c6/a4/79c6a485cade348206966a83762bd1a5.jpg",
            "Hair Care" => "https://i.pinimg.com/564x/50/75/b4/5075b4c3c746a9ac495e9e8107466473.jpg",
            "Manicure/Pedicure" => "https://i.pinimg.com/564x/c6/b8/aa/c6b8aa613398c1bd41c81040478fe586.jpg",
            "Hair Removal" => "https://www.cecilydayspa.co.uk/wp-content/uploads/2023/10/Berkhamsted-Beauty-Salon-How-to-Prepare-for-Your-First-Waxing-Appointment-in-a-While-Blog-Image.jpg",
            "Facial" => "https://i.pinimg.com/564x/28/9a/92/289a920632a879c9a4208652bdffb696.jpg",
            "Nail Art" => "https://i.pinimg.com/564x/1d/5a/2d/1d5a2d34a1e6f759355535b089515f06.jpg",
            "Mehandi" => "https://i.pinimg.com/564x/cd/ab/db/cdabdbcdc6a289f5ae36a06ad2559b13.jpg",
            "Massage" => "https://i.pinimg.com/564x/8f/f7/4a/8ff74ac79dd395be665059a959018be7.jpg",
            "Wedding Package" => "https://i.pinimg.com/564x/1a/32/b2/1a32b2a4ef0f01b3ce7f0cbf91f3d1bc.jpg"
        );

        // Check if there are any services to display
        if ($services) {
            // Display each service with its static image
            foreach ($services as $service) {
                $serviceId = $service['service_id'];
                $name = $service['name'];
                if (isset($serviceImages[$name])) {
                    echo '<div class="service-box">';
                    echo '<img src="' . htmlspecialchars($serviceImages[$name]) . '" alt="' . htmlspecialchars($name) . '">';
                    echo '<p>' . htmlspecialchars($name) . '</p>';
                    echo '<a href="view_price.php?service_id=' . urlencode($serviceId) . '" class="button">VIEW PRICE</a>';
                    echo '</div>';
                } else {
                    echo '<div class="service-box">';
                    echo '<p>No Image</p>';
                    echo '<p>' . htmlspecialchars($name) . '</p>';
                    echo '<a href="view_price.php?service_id=' . urlencode($serviceId) . '" class="button">VIEW PRICE</a>';
                    echo '</div>';
                }
            }
        } else {
            echo '<p>No services available at the moment.</p>';
        }
        ?>
    </div>
</section>
</body>
</html>