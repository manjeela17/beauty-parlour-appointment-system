<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'parlour'; // Replace with your database name

try {
    // Establish database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to fetch service names
    $sql = "SELECT name FROM services";
    $stmt = $pdo->query($sql);

    // Fetch all rows as an associative array
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            text-align: center;
        }
        .service-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .service-box {
            width: 150px;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            background-color: #fff;
        }
        .service-box img {
            width: 100px; /* Change this to control the diameter */
            height: 100px; /* Change this to control the diameter */
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto 10px;
        }
        .service-box p {
            font-size: 16px;
            margin: 0;
        }
        .button {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<section class="container">
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
                $name = $service['name'];
                if (isset($serviceImages[$name])) {
                    echo '<div class="service-box">';
                    echo '<img src="' . htmlspecialchars($serviceImages[$name]) . '" alt="' . htmlspecialchars($name) . '">';
                    echo '<p>' . htmlspecialchars($name) . '</p>';
                    echo '<a href="view_price.php?service=' . urlencode($name) . '" class="button">VIEW PRICE</a>';
                    echo '</div>';
                } else {
                    echo '<div class="service-box">';
                    echo '<p>No Image</p>';
                    echo '<p>' . htmlspecialchars($name) . '</p>';
                    echo '<a href="view_price.php?service=' . urlencode($name) . '" class="button">VIEW PRICE</a>';
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
