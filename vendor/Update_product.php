<?php
require_once '../config/connect.php';
$idcd = $_POST['idc'];
$img = $_POST['img'];
$name = $_POST['name'];
$type = $_POST['group'];
$price = $_POST['price'];

$kkal = $_POST['kkal'];
$carb = $_POST['carb'];
$fat = $_POST['dat'];
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

mysqli_query($soe, "UPDATE `products` SET `Name`='$name',`Type`='$type',`Price100g`='$price',
`image`='$img',`kkal`='$kkal',`fat`='$fat',`protein`='$protein',`carb`='$carb',
`cellulose`='$cellulose',`water`='$water',`vitA`='$vitA',`vitE`='$vitE',
`vitK`='$vitK',`vitD`='$vitD',`vitC`='$vitC',`om3`='$om3',`om6`='$om6',
`vitB1`='$vitB1',`vitB2`='$vitB2',`vitB5`='$vitB5',`vitB6`='$vitB6',`vitB8`='$vitB8',
`vitB9`='$vitB9',`vitB12`='$vitB12',`minMg`='$vitB',`minNa`='$min',
`minCl`='$minCl',`minCa`='$minCa',`minK`='$min',`minS`='$minS',`minP`='$minP',
`minCu`='$minCu',`minI`='$min',`minCr`='$min' WHERE `ID`='$idcd'");

header('Location: ../products.php');
