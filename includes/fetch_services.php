<?php
session_start();
include '../class/a_cat_class.php'; 
include '../class/a_cat_contro.php'; 

$categories = new CatControl();
$board = $categories->getboard();

$serviceNames = [];

foreach ($board as $category) {
    $serviceNames[] = $category['service_name'];
}

header('Content-Type: application/json');
echo json_encode($serviceNames);
?>
