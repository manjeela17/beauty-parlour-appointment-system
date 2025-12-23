<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'parlour'; // Replace with your database name

// Establish database connection
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// SQL query to fetch data from categories table, ordered by cat_id DESC
$sql = "SELECT categories.cat_id, categories.service_id, categories.price, categories.name as cat_name, services.service_id, services.name as service_name 
        FROM categories 
        INNER JOIN services ON categories.service_id = services.service_id 
        ORDER BY categories.cat_id DESC";
$stmt = $pdo->query($sql);

// Fetch all rows as an associative array
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Service</title>
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
            background-color: #7f6a8d;
            padding: 25px 20px;
        }
        nav a {
            font-size: 20px;
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
            padding: 10px 20px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: black;
        }
        .container {
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-size: 40px;
            margin-top: 20px;
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
        .no-services {
            text-align: center;
            font-style: italic;
            color: #888;
        }
        .table-container {
            max-height: 500px;
            overflow-y: auto;
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
</header>

<h1>Manage Service</h1>

<div class="container">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Service Name</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category['cat_id']; ?></td>
                    <td><?php echo $category['service_name']; ?></td>
                    <td><?php echo $category['cat_name']; ?></td>
                    <td><?php echo $category['price']; ?></td>
                    <td>
                        <a href="service_edit.php?id=<?=$category['cat_id']; ?>&name=<?=$category['cat_name']; ?>&price=<?=$category['price']; ?>" class="btn btn-primary">Edit</a>  
                        <form action="../includes/del_cat_inc.php" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');" style="display: inline;">
                            <input type="hidden" name="cat_id" value="<?php echo $category['cat_id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
