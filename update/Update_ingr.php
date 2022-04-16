<?php
require_once '../config/connect.php';
$post_id = $_GET['id'];
$ingrs = mysqli_query($soe, "SELECT * FROM `shoplist` WHERE `ID` = '$post_id'");
$ingr = mysqli_fetch_assoc($ingrs);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../blocks/head_for_update.php' ?>
    <link rel="stylesheet" href="../CSS/forms.css" type="text/css" />

    <title>Edit inridients</title>


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
                <form action="../vendor/Update_ingr.php" method="post">
                    <input style="display: none;" type="number" value="<?= $post_id ?>" name="idc">
                    <legend>Adding a ingridient</legend>
                    <label for="nm">Name:</label>
                    <input type="text" name="name" value="<?= $ingr['Name'] ?>" id="nm">
                    <label for="tp">Type:</label>
                    <input type="text" name="type" value="<?= $ingr['Type'] ?>" id="tp" disabled>
                    <label for="dh">Dish:</label>
                    <input type="text" name="dish" value="<?= $ingr['Dish'] ?>" id="dh" disabled>
                    <label for="wgt">Weight:</label>
                    <input type="number" min="0" step="5" value="<?= $ingr['Weight'] ?>" name="weight" id="wgt">
                    <label for="prc">Price:</label>
                    <input type="number" min="0" step="0.5" value="<?= $ingr['Price'] ?>" name="price" id="prc" disabled>

                    <button type="submit">Edit</button>
                    <button type="button" onclick="location.href='../shoplist.php'">Cancel</button>
                    <button type="reset">Clean</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/setting.js"></script>
    <script src="../js/color.js"></script>
</body>

</html>