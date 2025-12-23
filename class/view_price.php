
<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'parlour'; // Replace with your database name

try {
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
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($service['name']); ?> Prices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
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
        td {
            color: #333;
       
            font-weight: 500;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        h1 {
            margin-top: 0;
        }
        .service-name {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            background-color: #ddd;
            border-radius: 5px;
        }
        .back-link:hover {
            background-color: #ccc;
        }
    </style>
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
        <a href="index.php" class="back-link">Back to Services</a>
    </div>
</body>
</html>
