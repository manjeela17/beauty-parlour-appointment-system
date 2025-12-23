<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'parlour'; // Replace with your database name

// Establish database connection
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get category ID from URL
$cat_id = $_GET['id'];

// SQL query to fetch category details
$sql = "SELECT cat_id, name, price FROM categories WHERE cat_id = :cat_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->execute();
$category = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Category</title>
</head>
<body>
    <h2>Edit Category</h2>
    <form action="update_category.php" method="post">
        <input type="hidden" name="cat_id" value="<?php echo $category['cat_id']; ?>">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $category['name']; ?>" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo $category['price']; ?>" required>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
<button type="submit" name="delete" class="btn btn-danger">Delete</button>