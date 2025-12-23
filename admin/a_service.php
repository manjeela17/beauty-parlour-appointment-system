<?php
include '../class/fetch_services.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services</title>
    <link rel="stylesheet" href="styles.css">
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
            background-color: #333;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: black;
        }
        nav {
            text-align: center;
            background-color: #7f6a8d;
            padding: 25px 20px;
        }
        nav a {
            font-size: 20px;
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }
        h1 {
            font-size: 40px;
            text-align: center;
            margin-top: 20px;
            color: #333;
        }
        .container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        form {
            margin: 20px 0;
        }
        form div {
            margin-bottom: 15px;
        }
        form div label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        form div input, form div textarea, form div select {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        form div textarea {
            resize: vertical;
        }
        form div button {
            padding: 10px 15px;
            border: none;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        form div button:hover {
            background-color: #218838;
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
            session_start();
            if (isset($_SESSION['admin_id'])) {
                echo '<a href="adminlogout.php">Logout</a>';
            }
            ?>
        </section>
    </nav>
</header><h1>Add Services</h1>
<div class="container">
  
    <form id="addingservice" action="../includes/a_serviceinc.php" method="POST">

        <div>
            <label for="name">Service Name</label>
            <select id="name" name="service_id" required>
                <?php
                foreach ($services as $service) {
                    echo "<option value='" . htmlspecialchars($service['service_id'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($service['name'], ENT_QUOTES, 'UTF-8') . "</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="category">Category</label>
            <input type="text" id="category" name="name" required>
        </div>
        <div>
            <label for="price">Price (Rs.)</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>
        <div>
            
            <button type="submit" name="submit">Add Service</button>

        </div>
    </form>

</div>
</body>
</html>
