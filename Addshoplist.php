<?php
require_once 'config/connect.php';
$post_type = $_GET['type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/forms.css" type="text/css" />

    <title>Add inridients</title>

</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <form action="vendor/Create_shoplist.php" method="post">
                    <legend>Adding a ingridient</legend>
                    <label for="tp">Type:</label>
                    <input type="text" name="type" value="<?= $post_type ?>" id="tp">
                    <label for="nm">Product:</label>
                    <select name="name" id="nm">
                        <?php
                        $ingrs = mysqli_query($soe, "SELECT * FROM `products` WHERE `Type`='$post_type'");
                        $ingrs = mysqli_fetch_all($ingrs);
                        foreach ($ingrs as $ingr) {
                        ?>
                            <option value="<?= $ingr[1] ?>"><?= $ingr[1] ?></option>
                        <?php } ?>
                    </select>
                    <label for="wgt">Weight:</label>
                    <input type="number" min="0" step="5" name="weight" id="wgt">

                    <button type="submit">Add ingridient</button>
                    <button type="reset">Clean</button>
                    <button type="button" onclick="location.href='shoplist.php'">Cancel</button>

                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            //$('.js-example-basic-single').select2();
        });
    </script>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>
</body>

</html>