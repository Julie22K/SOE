<?php

require_once '../config/connect.php';

$post_id = $_GET['id'];

mysqli_query($soe, "DELETE FROM `shoplist` WHERE `DishID` = '$post_id'");
mysqli_query($soe, "DELETE FROM `dishes` WHERE `ID`='$post_id'");


header('Location: ../menu.php');
