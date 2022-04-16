<?php
require_once '../config/connect.php';
$post_id = $_GET['id'];
//read recipe
$recipes = mysqli_query($soe, "SELECT * FROM `recipes` WHERE `ID` = '$post_id'");
$recipe = mysqli_fetch_assoc($recipes);
//read ingridients
$ingrs = mysqli_query($soe, "SELECT * FROM `ingridients` WHERE `RecipeName` = '$recipe[Name]'");
$ingrs = mysqli_fetch_all($ingrs);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../blocks/head_for_update.php' ?>
    <link rel="stylesheet" href="../CSS/forms.css" type="text/css" />

    <title>Add inridients</title>


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
                <form id="editrecipe" action="../vendor/Update_recipe.php" method="post">
                    <legend>Edit a dish</legend>
                    <img class="recipe" src="<?= $recipe['Image'] ?>" alt="img">
                    <input style="display: none;" type="number" value="<?= $post_id ?>" name="id">
                    <Label for="nm">Name:</Label>
                    <input type="text" name="name" name="name" id="nm" value="<?= $recipe['Name'] ?>">
                    <Label for="tp">Type:</Label>
                    <input type="text" id="tp" name="type" value="<?= $recipe['Type'] ?>" disabled>
                    <Label for="im">Image:</Label>
                    <input type="url" id="im" name="image" value="<?= $recipe['Image'] ?>">
                    <Label for="vd">Video:</Label>
                    <input type="url" id="vd" name="video" value="<?= $recipe['Video'] ?>">
                    <!-- <Label for="tx">Recipe:</Label>
                    <input type="text" id="tx" name="recipe" value="<?= $recipe['Recipe'] ?>"> -->
                    <textarea name="recipe" form="editrecipe"><?= $recipe['Recipe'] ?></textarea>
                    <label for="list-ingr">Inridients:</label>
                    <div class="list-ingr" id="list-ingr">
                        <!-- read ingr -->
                        <ul class="ingr">
                            <?php
                            foreach ($ingrs as $ingr) {
                            ?>
                                <li><?= $ingr[1] ?> - <?= $ingr[3] ?>
                                    <!-- <a href="Update_ingr.php?id=">
                                        <ion-icon class="edit" name="create-outline"></ion-icon>
                                    </a>
                                    <a href="../vendor/Delete_ingr.php?id=">
                                        <ion-icon class="delete" name="close-outline"></ion-icon>
                                    </a> -->
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <!-- update ignr -->
                        <!-- del ingr -->
                        <!-- add ingr -->
                    </div>
                    <button type="submit">Edit</button>
                    <button type="button" onclick="location.href='../recipes.php'">Cancel</button>
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