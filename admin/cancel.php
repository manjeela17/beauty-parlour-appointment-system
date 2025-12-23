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
h1{
  font-size: 40px;
}

    </style>
</head>
<body>
  <header>
  
  </header>
  <nav>
  <section id="header" class="header">
  <a href="admin.php">Home</a>
  <a href="customer_acc.php">Customer Account</a>
 
  <a href="admin_dashboard.php">Appointment</a>
  <a href="feedback.php">Feedback</a>  
  <a href="cancel.php"> Appointment Cancel</a>  
  <?php
        session_start();
        if(isset($_SESSION['admin_id'])){
        
           echo '<a href="adminlogout.php">Logout</a>';
        
        }
        ?>
       
    </nav>
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
            <th> Status</th>
           
          </tr>
        </thead>
        <tbody>
        </tbody></table></div></div></body></html>