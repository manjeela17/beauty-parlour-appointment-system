<?php
session_start();
require_once 'database.php';

if (isset($_POST['submit'])) {
    $serviceName = htmlspecialchars($_POST['service_name']);
    $category = htmlspecialchars($_POST['category']);
    $price = htmlspecialchars($_POST['price']);

    // Include necessary files
    require_once '../class/add_class.php';
    require_once '../class/add_Contro.php';

    // Create ServiceController instance
    $serviceController = new ServiceController($serviceName, $category, $price);

    // Add service
    $addServiceStatus = $serviceController->addServiceNow();

    // Redirect based on success or failure
    if ($addServiceStatus) {
        header("Location: ../service_added.php?success");
        exit();
    } else {
        header("Location: ../service_exists.php?failed");
        exit();
    }
}
?>
