<?php
require_once '../config/connect.php';
require_once '../config/nutr.php';
$idcd = $_POST['idc'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$date = $_POST['date'];
$age = calculate_age($date);
$height = $_POST['height'];
$weight = $_POST['weight'];
$activity = $_POST['activity'];

$kkal = GetKkal($sex, $activity, $weight, $height, $age);

$carb = GetCarb($kkal);
$fat = GetFat($kkal);
$protein = GetProtein($kkal);
$cellulose = GetCellulose($kkal);
$water = GetWater($weight);

mysqli_query($soe, "UPDATE `persons` SET `Name`='$name',`Sex`='$sex',
`age`='$age',`Date_of_birth`='$date',
`activity`='$activity',`Weight`='$weight',`Height`='$height',
`kkal`='$kkal',`carb`='$carb',`fat`='$fat',`protein`='$protein',
`cellulose`='$cellulose',`water`='$water'
WHERE `ID`='$idcd'");

header('Location: ../persons.php');
