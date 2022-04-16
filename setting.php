<?php
require_once 'config/connect.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/setting.css" type="text/css" />
    <title>Setting</title>

</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>

    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <h4>Themes:</h4>
                <!--theme(--main,main2(border),front-card,back-card)  -->
                <!--theme(--main,main2(border),title-card,data-card,info-card)  -->
                <button class="color" onclick="theme('#003d08','#527445','#C2D4B3','#E5D3C9')" id="green">green</button>
                <button class="color" onclick="theme('#31556d','#222b3b','#9dc4c4','#9dc4c4')" id="blue">blue</button>
                <button class="color" onclick="theme('#494949','#dfdf59','#ebe0a6','#a09fa3')" id="yellow">yellow</button>
                <button class="color" onclick="theme('#744572','#392838','#b17bae','#93b126')" id="violet">violet</button>
                <button class="color" onclick="theme('#744545','#381f1f','#d697aa','#9ba08a')" id="red">red</button>
                <!-- <button class="color" onclick="theme('#F5F5F5','#000000','#ffffff','#ffffff')" id="light">light</button>
                <button class="color" onclick="theme('#F5F5F5','#000000','#ffffff','#ffffff')" id="dark">dark</button> -->
                <!--                 
                <h4>Language:</h4>
                <select id="lang">
                    <option>Choose language</option>
                    <option value="/en/">English</option>
                    <option value="/es/">Español</option>
                    <option value="/de/">Deutsch</option>
                    <option value="/it/">Italiano</option>
                    <option value="/nl/">Nederlandse</option>
                </select> -->

            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>
</body>

</html>