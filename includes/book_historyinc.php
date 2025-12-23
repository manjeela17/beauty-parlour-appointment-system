<?php
require_once('database.php');
include "class/book_historyclass.php";
include "class/book_historycontro.php";

$userid = htmlspecialchars($_SESSION['user_id'] ?? '');

if (empty($userid)) {
    // Handle missing user ID
    header('Location: ../book.php?error=emptyUserID');
    exit();
}

$booking = new book_HistoryContro($userid);
$bookingHistoryList = $booking->getBookingHistory();
?>