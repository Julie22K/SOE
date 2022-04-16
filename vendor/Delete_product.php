<?php

require_once '../config/connect.php';

    $post_id = $_GET['id'];
    echo $post_id;
    
    mysqli_query($soe, "DELETE FROM `products` WHERE `ID` = '$post_id'");

    header( 'Location: ../products.php');
?>