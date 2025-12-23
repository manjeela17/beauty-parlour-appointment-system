<?php
 session_start();

require_once 'database.php';

if(isset($_POST['submit'])){
    $feedbackid = htmlspecialchars($_SESSION['user_id']);
    $feedbackname = htmlspecialchars($_SESSION['user_username']); 
    $feedbackemail = htmlspecialchars($_SESSION['user_email']); 
    
    $feedbackmessage = $_POST['feedback_message'];

    // Include necessary files
    include '../class/feedbackclass.php';
    include '../class/feedbackcontro.php';
    
    // Create feedbackcontro instance
    $feedback = new feedbackcontro($feedbackid, $feedbackname, $feedbackemail, $feedbackmessage);
    // Submit feedback
    $submissionStatus = $feedback->submitFeedback();

    // Redirect based on success or failure
    if ($submissionStatus) {
        header("Location: ../index.php?success");
        exit();
    } else {
        header("Location: ../contact.php?failed");
        exit();
    }
}
?>
