<?php
require_once('database.php');
include "../class/feedbackclass.php";
include "../class/adminfeedback_contro.php";

// Assuming $feedbackid is coming from some source like $_GET
$feedbackid = isset($_GET['feedbackid']) ? $_GET['feedbackid'] : null;

$booking = new feedbackcontro($feedbackid);
$feedback = $booking->getfeedback();
?>
