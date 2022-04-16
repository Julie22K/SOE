<?php
require_once '../config/connect.php';

$idcd = $_POST['idc'];
$name = $_POST['name'];
$weight = $_POST['weight'];

$products = mysqli_query($soe, "SELECT * FROM `products` WHERE `Name`='$name'");
$product = mysqli_fetch_assoc($products);
$price100g = $product['Price100g'];

$price = $weight * $price100g * 0.01;


mysqli_query($soe, "UPDATE `shoplist` SET `Name`='$name',`Weight`='$weight',`Price`='$price' WHERE `ID`='$idcd'");

header('Location: ../shoplist.php');
