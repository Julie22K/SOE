<?php

require_once '../config/connect.php';

$post_id = $_GET['id'];

mysqli_query($soe, "DELETE FROM `ingridients` WHERE `ID` = '$post_id'");

header('Location: ../update/Update_ingr.php');
