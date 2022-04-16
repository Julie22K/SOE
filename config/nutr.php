<?php
require_once 'connect.php';
function calculate_age($birthday)
{

    $birthday_timestamp = strtotime($birthday);
    $age = date('Y') - date('Y', $birthday_timestamp);
    if (date('md', $birthday_timestamp) > date('md')) {
        $age--;
    }
    return $age;
}
function GetKkal($sex, $activity, $weight, $height, $age)
{
    if ($sex == 'woman') return (10 * $weight + 6.25 * $height - 5 * $age - 161) * $activity;
    else return (10 * $weight + 6.25 * $height - 5 * $age + 5) * $activity;
}
function GetProtein($kkal)
{
    return ($kkal * 0.3) / 4;
}
function GetFat($kkal)
{
    return ($kkal * 0.1) / 9;
}
function GetCarb($kkal)
{
    return ($kkal * 0.6) / 4;
}
function GetCellulose($kkal)
{
    return 0.012 * $kkal;
}
function GetWater($weight)
{
    return $weight * 35;
}
function Dish($dM, $T, $D)
{
    $result = array();
    foreach ($dM as $dm) {
        if ($dm[2] == $D && $dm[3] == $T) {
            array_push($result, $dm);
        }
    }
    return $result;
}
function get_name($id, $soe)
{
    $recipes = mysqli_query($soe, "SELECT * FROM `recipes` WHERE `ID` = '$id'");
    $recipe = mysqli_fetch_assoc($recipes);
    return $recipe['Name'];
}
function get_id($name, $soe)
{
    $recipes = mysqli_query($soe, "SELECT * FROM `recipes` WHERE `Name` = '$name'");
    $recipe = mysqli_fetch_assoc($recipes);
    return $recipe['ID'];
}
function calc_data($weight, $num100g)
{
    return $weight * $num100g * 0.01;
}
