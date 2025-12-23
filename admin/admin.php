

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Home Page</title>
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
    
    .footer {
      text-align: center;
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    h1{
      margin-top: 80px;
        text-align: center;
        font-size: 60PX;
    }
    h2{
      text-align: center;
      font-size:25px;
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
            padding: 10px 20px;
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
<nav>
    <?php
    if(isset($_SESSION['admin_id'])){
        echo '<a href="admin.php">Home</a>';
        echo '<a href="customer_acc.php">Customer Account</a>';
        echo '<a href="admin_dashboard.php">Appointment</a>';
        echo '<a href="feedback.php">Feedback</a>';
        echo '<div class="dropdown">';
        echo '<a  class="dropbtn">Service</a>';
        echo '<div class="dropdown-content">';
        echo '<a href="a_service.php">Add Service</a>';
        echo '<a href="m_service.php">Manage Service</a>';
        echo '</div>';
        echo '</div>';
        echo '<a href="adminlogout.php">Logout</a>';
    } else {
        echo '<h2>Please <a href="adminlogin.php">login</a> to access your account.</h2>';
    }
    ?>
</nav>




   
  

  <div class="container">
  <h1>WELCOME TO ADMIN PANEL<h1>



 
  </div>

  <footer class="footer">
    <p>Admin Panel</p>
  </footer>
</body>
</html>
