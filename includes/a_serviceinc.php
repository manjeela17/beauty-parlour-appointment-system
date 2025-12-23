<?php
session_start();
require_once 'database.php';

if(isset($_POST['submit'])){

    $price = $_POST['price'];
    $service = $_POST['service_id'];
    $name= $_POST['name'];
    // Include necessary files
    include '../class/a_serviceclass.php';
    include '../class/a_servicecontro.php';

    $add = new a_servicecontro($service, $price, $name);

    $adding_service = $add->add_service();

    if ($adding_service) {
        header("Location: ../added.php?success");
        exit();
    } else {
        header("Location: ../already.php?failed");
        exit();
    }
}
?>
