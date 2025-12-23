<?php
include 'database.php';
if(isset($_POST['delete'])) {
    
    $cat_id = $_POST['cat_id'];

    include "../class/cat_del_class.php";
    include "../class/cat_del_contro.php";
    

    // Create bookcontro instance
    $deleteObj = new cat_del_contro($cat_id);

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
