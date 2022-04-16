<?php
require_once '../config/connect.php';

$id = $_POST['idc'];
$recipes = mysqli_query($soe, "SELECT * FROM `recipes` WHERE `ID`='$id'");
$recipe = mysqli_fetch_assoc($recipes);
$d_name = $recipe['Name'];
$d_type = $recipe['Type'];
$d_weight = $recipe['Weight'];
$d_price = $recipe['Price'];

$d_kkal = $recipe['kkal'];
$d_carb = $recipe['carb'];
$d_fat = $recipe['fat'];
$d_protein = $recipe['protein'];
$d_cellulose = $recipe['cellulose'];
$d_water = $recipe['water'];
$d_vitA = $recipe['vitA'];
$d_vitE = $recipe['vitE'];
$d_vitK = $recipe['vitK'];
$d_vitD = $recipe['vitD'];
$d_vitC = $recipe['vitC'];
$d_om3 = $recipe['om3'];
$d_om6 = $recipe['om6'];
$d_vitB1 = $recipe['vitB1'];
$d_vitB2 = $recipe['vitB2'];
$d_vitB5 = $recipe['vitB5'];
$d_vitB6 = $recipe['vitB6'];
$d_vitB8 = $recipe['vitB8'];
$d_vitB9 = $recipe['vitB9'];
$d_vitB12 = $recipe['vitB12'];
$d_minMg = $recipe['minMg'];
$d_minNa = $recipe['minNa'];
$d_minCl = $recipe['minCl'];
$d_micCa = $recipe['minCa'];
$d_minK = $recipe['minK'];
$d_minS = $recipe['minS'];
$d_minP = $recipe['minP'];
$d_minCu = $recipe['minCu'];
$d_minI = $recipe['minI'];
$d_minCr  = $recipe['minCr'];

$ingrs = mysqli_query($soe, "SELECT * FROM `ingridients` WHERE `RecipeName`='$d_name'");
$ingrs = mysqli_fetch_all($ingrs);

$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
foreach ($days as $day) {
    $arr = $_POST["$day"];
    if (!empty($arr)) {
        foreach ($arr as $time) {
            mysqli_query($soe, "INSERT INTO `dishes`
            (`Name`, `Type`, `Weight`, `Price`,`Day`,`Time`,`RecipeID`,
            `kkal`, `carb`, `fat`, `protein`, `cellulose`, `water`, `vitA`, `vitE`, `vitK`,
                `vitD`, `vitC`, `om3`, `om6`, `vitB1`, `vitB2`, `vitB5`, `vitB6`, `vitB8`, `vitB9`, `vitB12`, 
                `minMg`, `minNa`, `minCl`, `micCa`, `mink`, `minS`, `minP`, `minCu`, `minI`, `minCr`)
             VALUES ('$d_name','$d_type','$d_weight','$d_price','$day','$time','$id',
             '$d_kkal', '$d_carb', '$d_fat', '$d_protein', '$d_cellulose', '$d_water', '$d_vitA', '$d_vitE', '$d_vitK',
                '$_vitD', '$d_vitC', '$d_om3', '$d_om6', '$d_vitB1', '$d_vitB2', '$d_vitB5', '$d_vitB6', '$d_vitB8', '$d_vitB9', '$d_vitB12', 
                '$_minMg', '$d_minNa', '$d_minCl', '$d_micCa', '$d_mink', '$d_minS', '$d_minP', '$d_minCu', '$d_minI', 
				'$d_minCr'
             )");

            $dishes = mysqli_query($soe, "SELECT * FROM `dishes` WHERE `Time`='$time' AND `Day`='$day'AND `Name`='$d_name'");
            $dish = mysqli_fetch_assoc($dishes);
            $dish_id = $dish['ID'];
            foreach ($ingrs as $ingr) {
                mysqli_query($soe, "INSERT INTO `shoplist`(`Name`, `DishID`, `Type`, `Weight`, `Price`,`kkal`, `carb`, `fat`, `protein`, `cellulose`, `water`, `vitA`, `vitE`, `vitK`,
                `vitD`, `vitC`, `om3`, `om6`, `vitB1`, `vitB2`, `vitB5`, `vitB6`, `vitB8`, `vitB9`, `vitB12`, 
                `minMg`, `minNa`, `minCl`, `micCa`, `mink`, `minS`, `minP`, `minCu`, `minI`, `minCr`) VALUES ('$ingr[1]','$dish_id','$ingr[2]','$ingr[3]','$ingr[4]',
                '$ingr[7]','$ingr[8]','$ingr[9]','$ingr[10]','$ingr[11]','$ingr[12]','$ingr[13]',
                '$ingr[14]','$ingr[15]','$ingr[16]','$ingr[17]','$ingr[18]','$ingr[19]','$ingr[20]',
                '$ingr[21]','$ingr[22]','$ingr[23]','$ingr[24]','$ingr[25]','$ingr[26]','$ingr[27]',
                '$ingr[28]','$ingr[29]','$ingr[30]','$ingr[31]','$ingr[32]','$ingr[33]','$ingr[34]',
                '$ingr[35]','$ingr[36]')");
            }
        }
    }
}



header('Location: ../menu.php');
