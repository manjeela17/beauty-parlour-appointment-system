<?php
include 'database.php';

if(isset($_POST['delete'])) {
    
    $user_id = $_POST['user_id'];

    include "../class/del_customerclass.php";
    include "../class/del_customercontro.php";
    

    // Create bookcontro instance
    $deleteObj = new del_customercontro($user_id);

    // Book appointment
    $deleteObj = $deleteObj->delete();

    // Redirect based on success or failure
    if ($deleteObj) {
        header("Location: ../del_admin.php?success");
        exit();
    } else {
        header("Location: ../book.php?failed");
        exit();
    }
}
?>
