<?php

require_once '../config/connect.php';

$post_id = $_GET['id'];
$recipes = mysqli_query($soe, "SELECT * FROM `dishes` WHERE `ID`='$post_id'");
$recipe = mysqli_fetch_assoc($recipes);

$recipe_name = $dish['Name'];

mysqli_query($soe, "DELETE FROM `recipes` WHERE `ID` = '$post_id'");
mysqli_query($soe, "DELETE FROM `ingridients` WHERE `Dish` = '$recipe_name'");

header('Location: ../recipes.php');
