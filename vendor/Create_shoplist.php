<?php
require_once '../config/connect.php';

require_once '../config/nutr.php';

$name = $_POST['name'];
$type = $_POST['type'];
$weight = $_POST['weight'];


$products = mysqli_query($soe, "SELECT * FROM `products` WHERE `Name`='$name'");
$product = mysqli_fetch_assoc($products);


$price = calc_data($weight, $product['Price100g']);
$kkal = calc_data($weight, $product['kkal']);
$carb = calc_data($weight, $product['carb']);
$fat = calc_data($weight, $product['fat']);
$protein = calc_data($weight, $product['protein']);
$cellulose = calc_data($weight, $product['cellulose']);
$water = calc_data($weight, $product['water']);
$vitA = calc_data($weight, $product['vitA']);
$vitE = calc_data($weight, $product['vitE']);
$vitK = calc_data($weight, $product['vitK']);
$vitD = calc_data($weight, $product['vitD']);
$vitC = calc_data($weight, $product['vitC']);
$om3 = calc_data($weight, $product['om3']);
$om6 = calc_data($weight, $product['om6']);
$vitB1 = calc_data($weight, $product['vitB1']);
$vitB2 = calc_data($weight, $product['vitB2']);
$vitB5 = calc_data($weight, $product['vitB5']);
$vitB6 = calc_data($weight, $product['vitB6']);
$vitB8 = calc_data($weight, $product['vitB8']);
$vitB9 = calc_data($weight, $product['vitB9']);
$vitB12 = calc_data($weight, $product['vitB12']);
$minMg = calc_data($weight, $product['minMg']);
$minNa = calc_data($weight, $product['minNa']);
$minCl = calc_data($weight, $product['minCl']);
$micCa = calc_data($weight, $product['minCa']);
$minK = calc_data($weight, $product['minK']);
$minS = calc_data($weight, $product['minS']);
$minP = calc_data($weight, $product['minP']);
$minCu = calc_data($weight, $product['minCu']);
$minI = calc_data($weight, $product['minI']);
$minCr  = calc_data($weight, $product['minCr']);


mysqli_query($soe, "INSERT INTO `shoplist`(`Name`,`Type`, `Weight`, `Price`,
`kkal`, `carb`, `fat`, `protein`, `cellulose`, `water`, `vitA`, `vitE`, `vitK`,
  `vitD`, `vitC`, `om3`, `om6`, `vitB1`, `vitB2`, `vitB5`, `vitB6`, `vitB8`, `vitB9`, `vitB12`, 
  `minMg`, `minNa`, `minCl`, `micCa`, `mink`, `minS`, `minP`, `minCu`, `minI`, `minCr`) 
    VALUES ('$name','$type','$weight','$price',
    '$kkal', '$carb', '$fat', '$protein', '$cellulose', 
    '$water', '$vitA', '$vitE', '$vitK', '$vitD', '$vitC', 
    '$om3', '$om6', '$vitB1', '$vitB2', '$vitB5', '$vitB6', '$vitB87', '$vitB9', '$vitB12','$minMg', '$minNa', 
    '$minCl', '$micCa', '$mink', '$minS', '$minP', '$minCu', '$minI', '$minCr')");

header('Location: ../shoplist.php');
