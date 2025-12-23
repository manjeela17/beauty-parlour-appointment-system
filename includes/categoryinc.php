<?php
require_once 'database.php';
include '../class/catagoryclass.php';
include '../class/catagorycontro.php';

$category = new catagorycontro();

$columnList = ["array", "not"]; 
// $category->getCategoryNow();