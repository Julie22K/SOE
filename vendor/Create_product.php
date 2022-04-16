<?php
require_once '../config/connect.php';

$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];
$img = $_POST['image'];

$kkal = $_POST['kkal'];
$carb = $_POST['carb'];
$fat = $_POST['fat'];
$protein = $_POST['protein'];
$cellulose = $_POST['cellulose'];
$water = $_POST['water'];
$vitA = $_POST['vitA'];
$vitE = $_POST['vitE'];
$vitK = $_POST['vitK'];
$vitD = $_POST['vitD'];
$vitC = $_POST['vitC'];
$om3 = $_POST['om3'];
$om6 = $_POST['om6'];
$vitB1 = $_POST['vitB1'];
$vitB2 = $_POST['vitB2'];
$vitB5 = $_POST['vitB5'];
$vitB6 = $_POST['vitB6'];
$vitB8 = $_POST['vitB8'];
$vitB9 = $_POST['vitB9'];
$vitB12 = $_POST['vitB12'];
$minMg = $_POST['minMg'];
$minNa = $_POST['minNa'];
$minCl = $_POST['minCl'];
$micCa = $_POST['minCa'];
$minK = $_POST['minK'];
$minS = $_POST['minS'];
$minP = $_POST['minP'];
$minCu = $_POST['minCu'];
$minI = $_POST['minI'];
$minCr  = $_POST['minCr'];

mysqli_query($soe, "INSERT INTO `products`(`Name`, `Type`, `Price100g`, `image`, 
`kkal`, `fat`, `protein`, `carb`, `cellulose`, `water`, `vitA`, `vitE`, `vitK`, `vitD`, 
`vitC`, `om3`, `om6`, `vitB1`, `vitB2`, `vitB5`, `vitB6`, `vitB8`, `vitB9`, `vitB12`, 
`minMg`, `minNa`, `minCl`, `minCa`, `minK`, `minS`, `minP`, `minCu`, `minI`, `minCr`) 
VALUES ('$name','$type','$price','$img','$kkal','$fat','$protein',
'$carb','$cellulose','$water','$vitA','$vitE','$vitK','$vitD','$vitC',
'$om3','$om6','$vitB1','$vitB2','$vitB5','$vitB6','$vitB8',
'$vitB9','$vitB12','$minMg','$minNa','$minCa','$minCl','$minK',
'$minS','$minP','$minCu','$minI','$minCr')");

header('Location: ../products.php');
