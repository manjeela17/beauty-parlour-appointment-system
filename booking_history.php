<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    
    <style>
        body {
            background-image: url('https://us.123rf.com/450wm/juliaemelianova/juliaemelianova2101/juliaemelianova210100065/162777587-seamless-pattern-manicure-tools-on-a-pink-background-vector-illustration-hand-drawing-manicure-tools.jpg?ver=6');
            background-size: auto;
            background-repeat: repeat; /* Adjust repeat if needed */
            background-position: center; /* Center the background image */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 80px;
            text-align: center;
            background-image: url('https://i.pinimg.com/564x/63/9f/1f/639f1ff637ccb52764d4a629a5eb8ac9.jpg');
            width: 1600px;
            height: 110px;
            color: #bef4edfa;
        }

        table {
            width: 80%;
            margin: 50px auto;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background: #fff;
        }

        th, td {
            font-size: 15px;
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>

<body>
<section id="header" class="header">
    <a href="#" class="logo">HEY!GIRL'S</a>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="service.php">Services</a>
        <a href="contact.php">Contact Us</a>
      
        <?php
        session_start();
        if(isset($_SESSION['user_id'])){
        
           echo '<a href="booking_history.php">Booking history</a>';
           echo '<a href="logout.php">Logout</a>';
           echo '<a href="book.php" class="button">Book your appointment Now</a>';
        }
        else{
            echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
        }
        ?>
       
    </nav>
</section>

<h1>Booking History</h1>

<table>
    <tr>
        <th>Appointment Date</th>
        <th>Appointment Time</th>
        <th>Category</th>
        <th>Service</th>
        <th>Status</th>
    </tr>
    <?php
include "includes/book_historyinc.php";
if (isset($bookingHistoryList) && !empty($bookingHistoryList)) {
    // Reverse the array to display the newest booking at the top
    $bookingHistoryList = array_reverse($bookingHistoryList);
    foreach ($bookingHistoryList as $historyList) {
        echo "<tr>";
        echo "<td>" . $historyList['b_date'] . "</td>";
        echo "<td>" . $historyList['b_time'] . "</td>";
        echo "<td>" . $historyList['b_category'] . "</td>";
        echo "<td>" . $historyList['b_service'] . "</td>";
        
        // Check if status is empty, if so, display "Pending"
        $status = ($historyList['status'] != '') ? $historyList['status'] : 'Pending';
        echo "<td>" . $status . "</td>";
        
        // Disable the cancel button if the status is 'Accepted', 'Rejected', or 'Cancelled'
        $disabled = ($status == 'Accepted' || $status == 'Rejected' || $status == 'Cancelled') ? 'disabled' : '';
        
        echo "<td>";
        echo "<form id='cancelForm' action='includes/cancel_inc.php' method='post'>"; 
        echo "<input type='hidden' name='appointment_id' value='" . $historyList['b_id'] . "'>";
        echo "<input type='submit' name='cancel' value='Cancel' $disabled onclick='return confirmCancel()'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
}
 else {
    echo '<tr><td colspan="5" class="no-appointments">No booking history found.</td></tr>';

}
?>
</table> 

<script>
    function confirmCancel() {
        return confirm("Are you sure you want to cancel this appointment?");
    }
</script>

</body>
</html>
