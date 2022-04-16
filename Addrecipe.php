<?php require_once 'config/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/forms.css" type="text/css" />

    <title>Add recipe</title>

</head>

<body>

    <?php require_once 'blocks/preloader.php' ?>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <form action="vendor/Create_recipe.php" method="post">
                    <legend>Adding a recipe</legend>
                    <Label for="nm">Name:</Label>
                    <input type="text" name="name" id="nm">
                    <Label for="tp">Type:</Label>
                    <select class="" name="type" id="tp">
                        <option value="others">others</option>
                        <option value="sup">sup</option>
                        <option value="salad">salad</option>
                        <option value="meat">meat</option>
                        <option value="snack">snack</option>
                        <option value="breakfast">breakfast</option>
                        <option value="sandwich">sandwich</option>
                        <option value="drink">drink</option>
                        <option value="desert">desert</option>
                        <option value="poridje">poridje</option>
                        <option value="puncakes">puncakes</option>
                        <option value="sweets">sweets</option>
                        <option value="sauce">sauce</option>
                        <option value="paste">paste</option>
                        <option value="baking">baking</option>
                        <option value="pudding">pudding</option>
                    </select>
                    <label for="list-ingr">Inridients:</label>
                    <div class="list-ingr" id="list-ingr">

                    </div>
                    <select class="select2" id="nmingr">
                        <option disabled>choose</option>
                        <?php
                        foreach ($types as $type) {
                        ?>
                            <optgroup label="<?= $type ?>">
                                <?php

                                $ingrs = mysqli_query($soe, "SELECT * FROM `products` WHERE `Type`='$type'");
                                $ingrs = mysqli_fetch_all($ingrs);
                                foreach ($ingrs as $ingr) {
                                ?>
                                    <option value="<?= $ingr[1] ?>"><?= $ingr[1] ?></option>
                            <?php }
                            } ?>
                    </select>
                    <input class="ingr-weight" type="number" min="0" step="5" id="wgtingr" placeholder="weight">
                    <span onclick="addingritem()">Add ingridient</span>
                    <!-- counter -->
                    <input style="display: none;" type="number" name="count" id="cnt">
                    <button type="submit">Add recipe</button>
                    <button type="reset">Clean</button>
                    <button type="button" onclick="location.href='dishes.php'">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var counter = 1;

        function addingritem() {
            let nm = $('#nmingr :selected').val();
            let wht = $('#wgtingr').val();
            let li = $('#list-ingr').html();

            console.log(nm)
            li += '<input value="' + nm + '" class="ingr-name" type="text" name="name' + counter + '" id="name' + counter + '" placeholder="name">'
            li += '<input value="' + wht + '" class="ingr-weight" type="number" min="0" step="5" name="weight' + counter + '" id="weight' + counter + '" placeholder="weight">'
            if (counter == 10) alert('You have 10 inridients!');
            else {
                $('#list-ingr').html(li);
                counter++;
                $('#cnt').val(counter);
            }


        }
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({

            });
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>
</body>

</html>