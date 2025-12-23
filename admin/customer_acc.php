<?php
session_start();
require_once '../admin/db.php';
require_once '../admin/function.php';

// Fetch data from the database
$result = display_data();

// Check if the result is valid
if ($result === false) {
    die('Error fetching data from the database.');
}

// Fetch rows from the mysqli_result object and store them in an array
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Reverse the array to display the newest customer accounts at the top
$reversed_result = array_reverse($rows);
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
        .container {
            padding: 20px;
        }
        .table-container {
            max-height: 500px;
            overflow-y: auto;
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
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn:hover {
            background-color: #555;
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
        h1 {
            font-size: 40px;
            text-align: center;
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

<h1>Customer Account</h1>
<div class="container">
    <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>email</th>
                <th>phone number</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($reversed_result)) {
                foreach ($reversed_result as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td>
                            <a href="registeredit.php?id=<?=$row['id'];?>
                            &username=<?=$row['username'];?>
                            &email=<?=$row['email'];?>
                            &phone_number=<?=$row['phone_number'];?>
                            " class="btn btn-primary">Edit</a>

                            <form action="../includes/del_customerinc.php" method="post" onsubmit="return confirmDelete();">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>"> 
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="5" class="no-appointments">No customer accounts found.</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Function to show confirmation dialog before deleting
    function confirmDelete() {
        return confirm("Are you sure you want to delete this customer account?");
    }
</script>

</body>
</html>
