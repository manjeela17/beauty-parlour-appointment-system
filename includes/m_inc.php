<?php
require_once('database.php'); // Ensure this file starts immediately with <?php
include "../class/m_class.php"; // Ensure no output before <?php in this file
include "../class/m_contro.php"; // Ensure no output before <?php in this file

// Example: Fetch cat_id from query parameter or another source
$cat_id = htmlspecialchars($_GET['cat_id'] ?? ''); // Or another source



// Instantiate and use the m_contro class
$manage = new m_contro($cat_id);
$service = $manage->getmanage();
?>
