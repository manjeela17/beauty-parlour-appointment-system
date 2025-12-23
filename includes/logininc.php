
<?php

require_once('database.php');

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];



    include "../class/loginclass.php";
    include "../class/logincontro.php";

    $loginuser = new logincontro($email,$password);
    $loginuser->setUser();
    if($loginuser){
        header("location: ../index.php?success");
        exit();
    }
    else{
        header("location:../index.php?failed");
    }      
}
?>
