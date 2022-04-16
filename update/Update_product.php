<?php
require_once '../config/connect.php';
$post_id = $_GET['id'];
$products = mysqli_query($soe, "SELECT * FROM `products` WHERE `ID` = '$post_id'");
$product = mysqli_fetch_assoc($products);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../blocks/head_for_update.php' ?>
    <link rel="stylesheet" href="../CSS/forms.css" type="text/css" />

    <title>Edit product</title>

</head>

<body>
    <?php require_once '../blocks/preloader.php' ?>
    <div class="container">
        <?php require_once '../blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>
            <div class="page">
                <form action="../vendor/Update_product.php" method="post">
                    <legend>Update an ingridient:</legend>

                    <Label for="nm">Name:</Label>
                    <input type="text" name="name" id="nm" value="<?= $product['Name'] ?>">
                    <div class="container-input-4">
                        <input type="text" name="group" value="<?= $product['Type'] ?>">
                        <input type="text" name="img" id="img" placeholder="url of image" value="<?= $product['image'] ?>">
                        <input style="display: none;" type="number" value="<?= $post_id ?>" name="idc" placeholder="id">
                        <input type="number" min='0' step="0.1" value="<?= $product['Price100g'] ?>" name="price" placeholder="price(100g)">
                    </div>

                    <div class="container-input-5">
                        <input type="number" step="0.001" name="kkal" placeholder="kkal" value="<?= $product['kkal'] ?>">
                        <input type="number" step="0.001" name="carb" placeholder="carb" value="<?= $product['carb'] ?>">
                        <input type="number" step="0.001" name="fat" placeholder="fat" value="<?= $product['fat'] ?>">
                        <input type="number" step="0.001" name="protein" placeholder="protein" value="<?= $product['protein'] ?>">
                        <input type="number" step="0.001" name="water" placeholder="water" value="<?= $product['water'] ?>">
                        <input type="number" step="0.001" name="cellulose" placeholder="cellulose" value="<?= $product['cellulose'] ?>">

                        <input type="number" step="0.001" name="vitA" placeholder="A" value="<?= $product['vitA'] ?>">
                        <input type="number" step="0.001" name="vitE" placeholder="E" value="<?= $product['vitE'] ?>">
                        <input type="number" step="0.001" name="vitK" placeholder="K" value="<?= $product['vitK'] ?>">
                        <input type="number" step="0.001" name="vitD" placeholder="D" value="<?= $product['vitD'] ?>">
                        <input type="number" step="0.001" name="vitC" placeholder="C" value="<?= $product['vitC'] ?>">
                        <input type="number" step="0.001" name="om3" placeholder="omega3" value="<?= $product['om3'] ?>">
                        <input type="number" step="0.001" name="om6" placeholder="omega6" value="<?= $product['om6'] ?>">
                        <input type="number" step="0.001" name="vitB1" placeholder="B1" value="<?= $product['vitB1'] ?>">
                        <input type="number" step="0.001" name="vitB2" placeholder="B2" value="<?= $product['vitB2'] ?>">
                        <input type="number" step="0.001" name="vitB5" placeholder="B5" value="<?= $product['vitB5'] ?>">
                        <input type="number" step="0.001" name="vitB6" placeholder="B6" value="<?= $product['vitB6'] ?>">
                        <input type="number" step="0.001" name="vitB8" placeholder="B8" value="<?= $product['vitB8'] ?>">
                        <input type="number" step="0.001" name="vitB9" placeholder="B9" value="<?= $product['vitB9'] ?>">
                        <input type="number" step="0.001" name="vitB12" placeholder="B12" value="<?= $product['vitB12'] ?>">
                        <input type="number" step="0.001" name="minMg" placeholder="Mg" value="<?= $product['minMg'] ?>">
                        <input type="number" step="0.001" name="minNa" placeholder="Na" value="<?= $product['minNa'] ?>">
                        <input type="number" step="0.001" name="minCl" placeholder="Cl" value="<?= $product['minCa'] ?>">
                        <input type="number" step="0.001" name="minCa" placeholder="Ca" value="<?= $product['minCl'] ?>">
                        <input type="number" step="0.001" name="minK" placeholder="K" value="<?= $product['minK'] ?>">
                        <input type="number" step="0.001" name="minS" placeholder="S" value="<?= $product['minS'] ?>">
                        <input type="number" step="0.001" name="minP" placeholder="P" value="<?= $product['minP'] ?>">
                        <input type="number" step="0.001" name="minCu" placeholder="Cu" value="<?= $product['minCu'] ?>">
                        <input type="number" step="0.001" name="minI" placeholder="I" value="<?= $product['minI'] ?>">
                        <input type="number" step="0.001" name="minCr" placeholder="Cr" value="<?= $product['minCr'] ?>">
                    </div>

                    <button class="">Edit product</button>
                    <button type="button" onclick="location.href='../products.php'">Cancel</button>
                    <button type="reset">Clean</button>
                </form>
            </div>
        </div>
    </div>




    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/setting.js"></script>
    <script src="../js/color.js"></script>
</body>

</html>