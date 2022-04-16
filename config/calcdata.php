<?php
$dishes = mysqli_query($soe, "SELECT * FROM `dishes`");
$dishes = mysqli_fetch_all($dishes);

$persons = mysqli_query($soe, "SELECT * FROM `persons`");
$persons = mysqli_fetch_all($persons);

$num_round = 1;


$maxkkal = 0;
$maxfat = 0;
$maxprotein = 0;
$maxcarb = 0;
$maxcellulose = 0;
$maxwater = 0;
$maxmin = 0;
$maxvit = 0;
foreach ($persons as $person) {
    $maxkkal += $person[8]; // * 7;
    $maxfat += $person[10]; // * 7;
    $maxprotein += $person[11]; // * 7;
    $maxcarb += $person[9]; // * 7;
    $maxcellulose += $person[12]; // * 7;
    $maxwater += $person[13]; // * 7;
    //окремо для витамінів,а також макро- і мікроелементів
    $maxvit += ($person[14] + $person[15] + $person[16] + $person[17] + $person[18] + $person[19] + $person[20] + $person[21] + $person[22] + $person[23] + $person[24] + $person[25] + $person[26] + $person[27]) / 14; // * 7;
    $maxmin += ($person[28] + $person[29] + $person[30] + $person[31] + $person[32] + $person[33] + $person[34] + $person[35] + $person[36] + $person[37]) / 10; // * 7;
}

$valuekkal = 0;
$valuefat = 0;
$valueprotein = 0;
$valuecarb = 0;
$valuecellulose = 0;
$valuewater = 0;
$valuemin = 0;
$valuevit = 0;

foreach ($dishes as $dish) {
    $valuekkal += round($dish[8] / 7, $num_round);
    $valuefat += round($dish[10] / 7, $num_round);
    $valueprotein += round($dish[11] / 7, $num_round);
    $valuecarb += round($dish[9] / 7, $num_round);
    $valuecellulose += round($dish[12] / 7, $num_round);
    $valuewater += round($dish[13] / 7, $num_round);
    //окремо для витамінів,а також макро- і мікроелементів
    $valuevit += ($dish[14] + $dish[15] + $dish[16] + $dish[17] + $dish[18] + $dish[19] + $dish[20] + $dish[21] + $dish[22] + $dish[23] + $dish[24] + $dish[25] + $dish[26] + $dish[27]) / 14;
    $valuemin += ($dish[28] + $dish[29] + $dish[30] + $dish[31] + $dish[32] + $dish[33] + $dish[34] + $dish[35] + $dish[36] + $dish[37]) / 10;
    $valuemin = round($valuemin / 7, $num_round);
    $valuevit = round($valuevit / 7, $num_round);
}

$percentkkal = round($valuekkal * 100 / $maxkkal, $num_round);
$percentfat = round($valuefat * 100 / $maxfat, $num_round);
$percentprotein = round($valueprotein * 100 / $maxprotein, $num_round);
$percentcarb = round($valuecarb * 100 / $maxcarb, $num_round);
$percentcellulose = round($valuecellulose * 100 / $maxcellulose, $num_round);
$percentwater = round($valuewater * 100 / $maxwater, $num_round);
$percentmin = round($valuemin * 100 / $maxmin, $num_round);
$percentvit = round($valuevit * 100 / $maxvit, $num_round);
