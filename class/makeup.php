<?php
// Include the ServiceFetcher class file
include 'ServiceFetcher.php';

// Create an instance of the ServiceFetcher class
$serviceFetcher = new ServiceFetcher();

// Fetch services from the database for Makeup category
$services = $serviceFetcher->fetchServices("Makeup");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Services</title>
    <!-- Add your CSS and other head content here -->
</head>
<body>
    <!-- Add your HTML content here -->
    <h1>Makeup Services</h1>
    <section class="services">
        <div class="container">
            <div class="service-group">
                <?php
                // Display each service for Makeup category
                foreach ($services as $service) {
                    echo '<div class="service-box">';
                    echo '<p>' . $service["category"] . '</p>';
                    echo '<p>' . $service["price"] . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Add your footer or other content here -->
</body>
</html>
