
<?php

require_once('database.php');
if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
 

    include "../class/adminloginclass.php";
    include "../class/adminlogincontro.php";

    $loginuser = new adminlogincontro($email,$password);
    $loginuser->setUser();
    if($loginuser){
        header("location:admin.php?success");
        exit();
    }
    else{
        header("location:admin.php?failed");
    }
}
?>
