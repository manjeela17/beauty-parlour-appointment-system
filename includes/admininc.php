
<?php

if (isset($_SESSION['userid'])) {

    $userid = $_SESSION['userid'];
} else {  
    $userid = null; 
}
require_once('database.php'); 
include "../class/adminclass.php"; 
include "../class/admincontro.php"; 

$booking = new AdminControl($userid); 
$dashboard = $booking->getDashboard(); 

?>
