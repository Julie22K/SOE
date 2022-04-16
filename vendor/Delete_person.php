<?php

require_once '../config/connect.php';

$post_id = $_GET['id'];
echo $post_id;

mysqli_query($soe, "DELETE FROM `persons` WHERE `ID` = '$post_id'");

header('Location: ../persons.php');
