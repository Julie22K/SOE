<?php
require_once '../config/connect.php';
require_once '../config/nutr.php';

$Name = $_POST['name'];
$Type = $_POST['type'];
$Weight = 0;
$Price = 0;
$count = $_POST['count'];

$recipe_kkal = 0;
$recipe_carb = 0;
$recipe_fat = 0;
$recipe_protein = 0;
$recipe_cellulose = 0;
$recipe_water = 0;
$recipe_vitA = 0;
$recipe_vitE = 0;
$recipe_vitK = 0;
$recipe_vitD = 0;
$recipe_vitC = 0;
$recipe_om3 = 0;
$recipe_om6 = 0;
$recipe_vitB1 = 0;
$recipe_vitB2 = 0;
$recipe_vitB5 = 0;
$recipe_vitB6 = 0;
$recipe_vitB8 = 0;
$recipe_vitB9 = 0;
$recipe_vitB12 = 0;
$recipe_minMg = 0;
$recipe_minNa = 0;
$recipe_minCl = 0;
$recipe_micCa = 0;
$recipe_minK = 0;
$recipe_minS = 0;
$recipe_minP = 0;
$recipe_minCu = 0;
$recipe_minI = 0;
$recipe_minCr  = 0;

for ($i = 1; $i < $count; $i += 1) {

  $name1 = $_POST["name$i"];
  $weight = $_POST["weight$i"];

  $products = mysqli_query($soe, "SELECT * FROM `products` WHERE `Name`='$name1'");
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

  //calc sum for recipe`s data 
  $Price += $price;
  $Weight += $weight;
  $recipe_kkal += $kkal;
  $recipe_carb += $carb;
  $recipe_fat += $fat;
  $recipe_protein += $protein;
  $recipe_cellulose += $cellulose;
  $recipe_water += $water;
  $recipe_vitA += $vitA;
  $recipe_vitE += $vitE;
  $recipe_vitK += $vitK;
  $recipe_vitD += $vitD;
  $recipe_vitC += $vitC;
  $recipe_om3 += $om3;
  $recipe_om6 += $om6;
  $recipe_vitB1 += $vitB1;
  $recipe_vitB2 += $vitB2;
  $recipe_vitB5 += $vitB5;
  $recipe_vitB6 += $vitB6;
  $recipe_vitB8 += $vitB8;
  $recipe_vitB9 += $vitB9;
  $recipe_vitB12 += $vitB12;
  $recipe_minMg += $minMg;
  $recipe_minNa += $minNa;
  $recipe_minCl += $minCl;
  $recipe_micCa += $minCa;
  $recipe_minK += $minK;
  $recipe_minS += $minS;
  $recipe_minP += $minP;
  $recipe_minCu += $minCu;
  $recipe_minI += $minI;
  $recipe_minCr += $minCr;

  $type = $product['Type'];
  mysqli_query($soe, "INSERT INTO `ingridients`(`Name`, `Type`, `Weight`, `Price`, `RecipeName`, 
    `kkal`, `carb`, `fat`, `protein`, `cellulose`, `water`, `vitA`, `vitE`, `vitK`, `vitD`, `vitC`, 
    `om3`, `om6`, `vitB1`, `vitB2`, `vitB5`, `vitB6`, `vitB87`, `vitB9`, `vitB12`, `minMg`, `minNa`, 
    `minCl`, `micCa`, `mink`, `minS`, `minP`, `minCu`, `minI`, `minCr`) 
    VALUES ('$name1','$type','$weight','$price','$Name','$kkal', '$carb', '$fat', '$protein', '$cellulose', 
    '$water', '$vitA', '$vitE', '$vitK', '$vitD', '$vitC', 
    '$om3', '$om6', '$vitB1', '$vitB2', '$vitB5', '$vitB6', '$vitB87', '$vitB9', '$vitB12','$minMg', '$minNa', 
    '$minCl', '$micCa', '$mink', '$minS', '$minP', '$minCu', '$minI', '$minCr')");
}

mysqli_query($soe, "INSERT INTO `recipes`( `Name`, `Type`, `Weight`, `Price`,
 `kkal`, `carb`, `fat`, `protein`, `cellulose`, `water`, `vitA`, `vitE`, `vitK`, `vitD`, `vitC`, `om3`, `om6`, 
 `vitB1`, `vitB2`, `vitB5`, `vitB6`, `vitB87`, `vitB9`, `vitB12`, `minMg`, `minNa`, `minCl`, `micCa`, `mink`, 
 `minS`, `minP`, `minCu`, `minI`, `minCr`) VALUES ('$Name','$Type','$Weight','$Price','$recipe_kkal', '$recipe_carb', '$recipe_fat', '$recipe_protein', 
  '$recipe_cellulose', '$recipe_water', '$recipe_vitA', '$recipe_vitE', '$recipe_vitK', '$recipe_vitD', 
  '$recipe_vitC', '$recipe_om3', '$recipe_om6', '$recipe_vitB1', '$recipe_vitB2', '$recipe_vitB5', 
  '$recipe_vitB6', '$recipe_vitB87', '$recipe_vitB9', '$recipe_vitB12','$recipe_minMg', '$recipe_minNa', 
  '$recipe_minCl', '$recipe_micCa', '$recipe_mink', '$recipe_minS', '$recipe_minP', '$recipe_minCu', 
  '$recipe_minI', '$recipe_minCr')");


// `Image`, `Video`, `Recipe`,


header('Location: ../recipes.php');
