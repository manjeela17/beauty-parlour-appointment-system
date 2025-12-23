
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
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
    .footer {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      position: fixed;
      bottom: 0;
      width: 100%;
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
h1{
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
    <h1>Customer feedback</h1>
  <div class="container">
    <div class="table-container">
      <table>
        <thead>
        <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Message</th>
            </tr>

          <tr>


          </tr>
          
        </thead>
     
        <tbody>
        <?php
include "../includes/feedback_inc.php";
if (isset($feedback) && !empty($feedback)) {
    // Reverse the array to iterate from the newest feedback to the oldest
    $feedback = array_reverse($feedback);
    
    foreach ($feedback as $adminfeedback) {
        echo "<tr>";
        echo "<td>" . $adminfeedback['id'] . "</td>";
        echo "<td>" . $adminfeedback['f_name'] . "</td>";
        echo "<td>" . $adminfeedback['f_email'] . "</td>";
        echo "<td>" . $adminfeedback['f_message'] . "</td>";
        echo "</tr>";
    }

} else {
    echo "<tr><td colspan='4' class='no-appointments'>No feedback found.</td></tr>";
}
?>

        </tbody>
</body>
</html>
