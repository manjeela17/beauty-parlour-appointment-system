<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Appointments</title>
    <style>
        body {
            background-image: url('https://static.vecteezy.com/system/resources/previews/004/487/827/non_2x/seamless-pattern-of-hairdressing-tools-scissors-combs-spray-rose-butterfly-beads-perfume-profile-of-a-girl-with-a-hairstyle-image-free-vector.jpg');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #333; /* Change background color */
        }
        nav a {
            color: white; /* Set text color */
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color:black; /* Change background color on hover */
        }
        nav {
            text-align: center;
            background-color:#7f6a8d;
            padding: 25px 20px;
        }
        nav a {
            font-size:20px;
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }
        .container {
            padding: 20px;
        }
        .dashboard {
            background-color: #f4f4f4;
            padding: 20px;
            margin-bottom: 20px;
        }
        .quick-actions {
            margin-bottom: 20px;
        }
        .quick-actions button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
        .quick-actions button:hover {
            background-color: #0056b3;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #ddd;
        }
        .no-appointments {
            text-align: center;
            font-style: italic;
            color: #888;
        }
        .table-container {
            max-height: 500px; /* Adjust height as needed */
            overflow-y: auto;
        }
        .action-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 5px;
            color: #fff;
        }
        .accept-btn {
            background-color: #28a745; /* Green */
        }
        .reject-btn {
            background-color: #dc3545; /* Red */
        }
        .delete-btn {
            background-color: #007bff; /* Blue */
        }
        .action-btn:hover {
            background-color: #555; /* Darken on hover */
        }
        h1 {
            font-size: 40px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #7f6a8d;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-top: 5px;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: black;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <section id="header" class="header">
            <a href="admin.php">Home</a>
            <a href="customer_acc.php">Customer Account</a>
            <a href="admin_dashboard.php">Appointment</a>
            <a href="feedback.php">Feedback</a>
            <div class="dropdown">
                <a class="dropbtn">Service</a>
                <div class="dropdown-content">
                    <a href="a_service.php">Add Service</a>
                    <a href="m_service.php">Manage Service</a>
                </div>
            </div>
            <?php
            if(isset($_SESSION['admin_id'])){
                echo '<a href="adminlogout.php">Logout</a>';
            }
            ?>
        </section>
    </nav>
</header>
<h1>Admin Dashboard</h1>
<div class="container">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Category</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../includes/admininc.php";
                if (isset($dashboard) && !empty($dashboard)) {
                    // Reverse the array to iterate from the newest appointment to the oldest
                    $dashboard = array_reverse($dashboard);

                    foreach ($dashboard as $admindash) {
                        echo "<tr>";
                        echo "<td>" . $admindash['id'] . "</td>";
                        echo "<td>" . $admindash['customer_name'] . "</td>";
                        echo "<td>" . $admindash['b_date'] . "</td>";
                        echo "<td>" . $admindash['b_time'] . "</td>";
                        echo "<td>" . $admindash['b_category'] . "</td>";
                        echo "<td>" . $admindash['b_service'] . "</td>";

                        // Check if status is empty or null
                        if (empty($admindash['status'])) {
                            echo "<td>Not Updated Yet</td>";
                        } else {
                            echo "<td>" . $admindash['status'] . "</td>";
                        }

                        echo "<td>";
                        echo "<form action='../includes/accept_inc.php' method='post' onsubmit='return confirmAction(\"accept\");'>"; 
                        echo "<input type='hidden' name='appointment_id' value='" . $admindash['b_id'] . "'>";
                        echo "<button type='submit' name='accept'";

                        if ($admindash['status'] == 'Cancelled' || $admindash['status'] == 'Accepted' || $admindash['status'] == 'Rejected') {
                            echo " disabled>";
                        } else {
                            echo ">";
                        }

                        echo "Accept</button>"; 
                        echo "</form>";

                        echo "<form action='../includes/reject_inc.php' method='post' onsubmit='return confirmAction(\"reject\");'>"; 
                        echo "<input type='hidden' name='appointment_id' value='" . $admindash['b_id'] . "'>";
                        echo "<button type='submit' name='reject'";

                        if ($admindash['status'] == 'Cancelled' || $admindash['status'] == 'Accepted' || $admindash['status'] == 'Rejected') {
                            echo " disabled>";
                        } else {
                            echo ">";
                        }

                        echo "Reject</button>"; 
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='no-appointments'>No appointments found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Function to show confirmation dialog before accepting or rejecting
    function confirmAction(action) {
        if (action === "accept") {
            return confirm("Are you sure you want to accept this appointment?");
        } else if (action === "reject") {
            return confirm("Are you sure you want to reject this appointment?");
        }
        return false;
    }
</script>

</body>
</html>
