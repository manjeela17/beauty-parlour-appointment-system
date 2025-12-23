<?php
session_start();
require_once 'database.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat_id = $_POST['id'];

    // Include necessary files
    include '../class/edit_cus_contro.php';

    // Create edit_cus_contro instance
    $update = new edit_cus_contro($name, $price, $cat_id);

    // Call the correct method for update operation
    $result = $update->updateRecord();

    // Redirect based on success or failure
    if ($result) {
        header("Location: ../admin_edit.php?success");
        exit();
    } else {
        header("Location: ../book.php?failed");
        exit();
    }
}
?>
