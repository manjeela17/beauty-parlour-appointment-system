<?php
// Function to extract numeric values from a string
function extractNumeric($priceString) {
    return preg_replace('/[^0-9]/', '', $priceString);
}

// Ensure required GET parameters are set
$cat_id = isset($_GET['id']) ? $_GET['id'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';

// Start of HTML document
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <style>
        /* Your CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://static.vecteezy.com/system/resources/previews/004/487/827/non_2x/seamless-pattern-of-hairdressing-tools-scissors-combs-spray-rose-butterfly-beads-perfume-profile-of-a-girl-with-a-hairstyle-image-free-vector.jpg');
            background-size: cover;
        }

        h1 {
            text-align: center;
            font-size: 40px;
            color: black;
        }

        .container {
            width: 50%;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: right;
        }
    </style>
</head>
<body>

<h1>Edit Service</h1>

<div class="container">
    <form action="../includes/edit_cus.php" method="post">

        <input name="id" value="<?= htmlspecialchars($cat_id); ?>" hidden/>

        <label for="name">Category:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name); ?>" required>
        <span class="error" id="name-error"></span>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?= htmlspecialchars($price); ?>" required>
        <span class="error" id="price-error"></span>

        <input type="submit" name="submit" value="Update">
        <p><a href="m_service.php" class="button">Back --></a></p>
    </form>
</div>

</body>
</html>
