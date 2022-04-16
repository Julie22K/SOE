<?php
$par1_ip = "127.0.0.1";
$par2_name = 'root';
$par3_p = '';
$par4_dp = 'soe';
$soe = mysqli_connect($par1_ip, $par2_name, $par3_p, $par4_dp);

if ($soe == false) {
    echo "error";
}


$types = array('fruits', 'vegetables', 'legumes', 'milk', 'meat', 'eggs', 'mushrooms', 'cereals', 'fish', 'green', 'berries', 'spices', 'baking', 'tea', 'dried fruits', 'nuts', 'seed', 'oil');
$times = array('breakfast', 'snack(1)', 'lunch', 'snack(2)', 'dinner');
$days = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
