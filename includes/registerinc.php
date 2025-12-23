

<?php

require_once('database.php');

if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
$phone_number=$_POST['phone_number'];

  include '../class/registerclass.php';
  include '../class/registercontro.php';


  $register = new registercontroller($username,$email,$phone_number,$password);
  $register->registeruser();
  if($register){
    header("location:../login.php?success");
    exit();
  }
  else{
    header("location:../register.php?failed");
  }
}




?>
