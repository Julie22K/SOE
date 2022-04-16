<?php

require_once '../config/connect.php';

$post_id = $_GET['id'];

mysqli_query($soe, "DELETE FROM `shoplist` WHERE `ID` = '$post_id'");

header('Location: ../shoplist.php');
