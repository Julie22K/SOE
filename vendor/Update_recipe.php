<?php
require_once '../config/connect.php';
$id = $_POST['id'];
$type = $_POST['type'];
$image = $_POST['image'];
$video = $_POST['video'];
$recipe = $_POST['recipe'];


$name = $_POST['name'];
$oldname = $_POST['oldname'];
if ($name != $oldname) {
    mysqli_query($soe, "UPDATE `ingridients` SET `RecipeName`='$name' WHERE `RecipeName` = '$oldname'");
}

mysqli_query($soe, "UPDATE `recipes` SET `Name`='$name',`Type`='$type'
`Image`='$image',`Video`='$video',`Recipe`='$recipe' WHERE `ID`='$id'");

header('Location: ../recipes.php');
/*$kkal = $_POST['kkal'];
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
$minCr  = $_POST['minCr']; */