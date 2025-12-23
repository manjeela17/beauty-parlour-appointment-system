<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'parlour'; // Replace with your database name

// Establish database connection
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get the service ID from the query parameter
$serviceId = isset($_GET['service_id']) ? intval($_GET['service_id']) : 0;

// SQL query to fetch the service name for the heading
$sql = "SELECT name FROM services WHERE service_id = :service_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['service_id' => $serviceId]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

// SQL query to fetch categories related to the service
$sql = "SELECT cat_id, name, price FROM categories WHERE service_id = :service_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['service_id' => $serviceId]);

// Fetch all rows as an associative array
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
    <html lang="en">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($service['name']); ?> Prices</title>
   
    
        <link rel="stylesheet" href="styles.css">
       
        <style>
        body {
    background-image: url('https://us.123rf.com/450wm/juliaemelianova/juliaemelianova2101/juliaemelianova210100065/162777587-seamless-pattern-manicure-tools-on-a-pink-background-vector-illustration-hand-drawing-manicure-tools.jpg?ver=6');
    background-size: auto;
    background-repeat: repeat; /* Adjust repeat if needed */
    background-position: center; /* Center the background image */
}

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color:#f7dcee;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mprice-list {
            
            align-items: center;
            margin-bottom: 20px;
        }

        .mprice-list h2 {
            font-size: 35px;
            color: #333;
            margin-bottom: 10px;
        }

        .mprice-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mprice-list li {
            font-size: 25px;
            margin-bottom: 10px;
            color: #666;
        }

        .mitem {
            font-weight: bold;
        }

        .price {
           
            color: #ff69b4; /* Pink color */
            font-weight: bold;
        }

        .button{
    font-size: 15px;
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
            background-color: #bb659f;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 20px;
        }
        td {
            color: #333;
       font-size: 20px;
            font-weight: 500;
        }
    
      
        .service-name {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .back-link {
            font-size: 15px;
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            background-color: #e58dc5;
            border-radius: 5px;
        }
        .back-link:hover {
            background-color: #ccc;
        }
     h1{
        font-size: 50px;
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
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo htmlspecialchars($service['name']); ?> Prices</h1>
        </div>
        <div class="service-name">
            <p>Here are the categories and prices for <?php echo htmlspecialchars($service['name']); ?>:</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['name']); ?></td>
                    <td>Rs.<?php echo number_format($category['price']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="service.php" class="back-link">Back to Services</a>
    </div>
</body>
</html>
