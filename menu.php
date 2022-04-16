<?php require_once 'config/connect.php';
require_once 'config/nutr.php';
$dishes = mysqli_query($soe, "SELECT * FROM `dishes`");
$dishes = mysqli_fetch_all($dishes);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/menu.css" type="text/css" />
    <link rel="stylesheet" href="CSS/modal.css" type="text/css" />
    <link rel="stylesheet" href="CSS/progress.css" type="text/css" />

    <title>Menu of week</title>

</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <!-- analytics -->
                <div class="card" style="width: 100%;">
                    <?php require_once 'config/calcdata.php'; ?>
                    <label for="kkal">Protein/Fat/Carb</label>
                    <div id="kkal" class="progress-bar progress-multiple" style="width:100%;">
                        <span class="progress progress-protein" style="width: <?= $percentprotein ?>%;"><?= $valueprotein ?>g</span>
                        <span class="progress progress-fat" style="width: <?= $percentfat ?>%;"><?= $valuefat ?>g</span>
                        <span class="progress progress-carb" style="width: <?= $percentcarb ?>%;"><?= $valuecarb ?>g</span>
                    </div>
                    <div class="grid-2">
                        <div>
                            <label for="water">Water:</label>
                            <div id="water" class="progress-bar">
                                <span class="progress progress-water" style="width: <?= $percentwater ?>%;"><?= $valuewater ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="Cellulose">Cellulose:</label>
                            <div id="cell" class="progress-bar">
                                <span class="progress progress-cellulose" style="width: <?= $percentcellulose ?>%;"><?= $valuecellulose ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="Vitamins:">Vitamins:</label>
                            <div id="vit" class="progress-bar">
                                <span class="progress progress-vit" style="width: <?= $percentvit ?>%;"><?= $percentvit ?>%</span>
                            </div>
                        </div>
                        <div>
                            <label for="Minerals:">Minerals:</label>
                            <div id="min" class="progress-bar">
                                <span class="progress progress-min" style="width: <?= $percentmin ?>%;"><?= $percentmin ?>%</span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- menu's cards -->
                <div class="container" id="menu">
                    <div class="card-menu day time">
                        <div class="innercard card static">
                            <h6>Time/Day</h6>
                        </div>
                    </div>
                    <?php
                    foreach ($days as $day) {
                    ?>
                        <div class="card-menu day">
                            <div class="innercard">
                                <h6><?= $day ?></h6>
                            </div>
                        </div>
                    <?php
                    }
                    foreach ($times as $time) {
                    ?>
                        <div class="card-menu time">
                            <div class="innercard">
                                <h6><?= $time ?></h6>
                            </div>
                        </div>
                        <?php
                        foreach ($days as $dayweek) {
                            $data = Dish($dishes, $time, $dayweek);
                            if (empty($data)) {
                                echo '<div class="card-menu"><div class="innercard add"><h6>Add</h6></div></div>';
                            } else {
                                $dishtest = $data[0];
                                $id = 0;
                                $list = "";
                                $text = 'text';
                                $price = 0;
                                $weight = 0;
                                $water = 0;
                                $cellulose = 0;
                                $fat = 0;
                                $carb = 0;
                                $protein = 0;
                                $vit = 0;
                                $min = 0;
                                $b = false;
                                foreach ($data as $dt_dish) {

                                    $dish_nm = $dt_dish[1];
                                    $weight += $dt_dish[6];

                                    $price += $dt_dish[7];
                                    $water += $dt_dish[12];
                                    $cellulose += $dt_dish[13];
                                    $fat += $dt_dish[10];
                                    $carb += $dt_dish[9];
                                    $protein += $dt_dish[11];
                                    $vit += ($dt_dish[14] + $dt_dish[15] + $dt_dish[16] + $dt_dish[17] + $dt_dish[18] + $dt_dish[19] + $dt_dish[20] + $dt_dish[21] + $dt_dish[22] + $dt_dish[23] + $dt_dish[24] + $dt_dish[25] + $dt_dish[26] + $dt_dish[27]) / 14;
                                    $min += ($dt_dish[28] + $dt_dish[29] + $dt_dish[30] + $dt_dish[31] + $dt_dish[32] + $dt_dish[33] + $dt_dish[34] + $dt_dish[35] + $dt_dish[36] + $dt_dish[37]) / 10;
                                    if ($b) $text = $text . ' та ' . $dish_nm;
                                    else {
                                        $b = true;
                                        $text = $dish_nm;
                                    }

                                    $id = $dt_dish[0];
                                    $ingrs = mysqli_query($soe, "SELECT * FROM `shoplist` WHERE `DishID`='$id'");
                                    $ingrs = mysqli_fetch_all($ingrs);
                                    foreach ($ingrs as $ingr) {
                                        $list = $list . ";$ingr[1] - $ingr[4]g($ingr[5]$)";
                                    }
                                }
                                $min = round($valuemin, $num_round);
                                $vit = round($valuevit, $num_round);


                                $percfat = round($fat * 100 / $maxfat, $num_round);
                                $percprotein = round($protein * 100 / $maxprotein, $num_round);
                                $perccarb = round($carb * 100 / $maxcarb, $num_round);
                                $percmin = round($min * 100 / $maxmin, $num_round);
                                $percvit = round($vit * 100 / $maxvit, $num_round);

                        ?>
                                <div class="card-menu dish">
                                    <ion-icon class="menu-ion" id="title" name="text-outline"></ion-icon>
                                    <ion-icon id="info-modal" onclick="openmodal(<?= $weight ?>,<?= $price ?>,<?= $water ?>,<?= $cellulose ?>,<?= $percvit ?>,<?= $percmin ?>,<?= $percfat ?>,<?= $perccarb ?>,<?= $percprotein ?>,<?= $fat ?>,<?= $carb ?>,<?= $protein ?>)" class="menu-ion" name="stats-chart-outline"></ion-icon>
                                    <ion-icon id="data" onclick="openmodalList('<?= $list ?>')" class="menu-ion" name="list-outline"></ion-icon>
                                    <ion-icon class="menu-ion" id="edit" name="create-outline"></ion-icon>
                                    <a href="vendor/Delete_menucell.php?id=<?= $id ?>">
                                        <ion-icon class="menu-ion" id="delete" name="trash-outline"></ion-icon>
                                    </a>
                                    <div class="innercard title">
                                        <?= $text ?>
                                    </div>
                                </div>
                        <?php

                            }
                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <?= require_once 'blocks/modals/modal_menucell.php'; ?>
    <script>
        var modal = document.getElementById("ModalInfo");
        var span = document.getElementsByClassName("close")[0];


        function openmodal(weight, price, water, cell, percvit, percmin, percfat, perccarb, percprotein, fat, carb, protein) {
            modal.style.display = "block";
            $("#wg").text('Weight:' + weight);
            $("#pr").text('Price:' + price);
            $("#wt").text('Water:' + water);
            $("#cl").text('Cellulose:' + cell);
            //kkal
            $("#info .progress-protein").text(protein);
            $("#info .progress-fat").text(fat);
            $("#info .progress-carb").text(carb);
            $("#info .progress-protein").css("width", percprotein + "%")
            $("#info .progress-fat").css("width", percfat + "%")
            $("#info .progress-carb").css("width", perccarb + "%")
            //min
            $("#min .progress").text(percmin);
            $("#min .progress").css("width", percmin + "%")
            //vit
            $("#vit .progress").text(percvit);
            $("#vit .progress").css("width", percvit + "%")
        }

        function openmodalList(list) {
            console.log(list)
            list.replace(';', ';\n')
            modal.style.display = "block";
            $("#modal-content").text(list);

        }
        span.onclick = function() {
            modal.style.display = "block";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>

</body>

</html>