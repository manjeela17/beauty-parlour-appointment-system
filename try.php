<?php
session_start();
include '../trycontro.php';

$serviceController = new ServiceController();
$services = $serviceController->getServicesWithCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services and Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .service-container {
            margin-bottom: 20px;
        }
        .service-container h2 {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        .category-list {
            padding-left: 20px;
        }
        .category-list li {
            background-color: #fff;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Our Services</h1>
    <?php
    if (!empty($services)) {
        foreach ($services as $service) {
            echo '<div class="service-container">';
            echo '<h2>' . $service['name'] . '</h2>';

            if (!empty($service['categories'])) {
                echo '<ul class="category-list">';
                foreach ($service['categories'] as $category) {
                    echo '<li>' . $category['name'] . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No categories found for this service.</p>';
            }

            echo '</div>';
        }
    } else {
        echo '<p>No services found.</p>';
    }
    ?>
</body>
</html>
