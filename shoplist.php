<?php
require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/shoplist.css" type="text/css" />
    <title>Shopping list</title>

</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <div class="finanse"></div>
                <div class="container" id="shoplist">
                    <?php
                    foreach ($types as $type) {
                    ?>
                        <div class="card-shop">
                            <div class="innercard card front">
                                <h6><img src="image/groups/<?= $type ?>.png" alt="<?= $type ?>"><?= $type ?></h6>
                                <hr>
                                <ul>
                                    <?php
                                    $ingrs = mysqli_query($soe, "SELECT * FROM `shoplist` WHERE `Type`='$type'");
                                    $ingrs = mysqli_fetch_all($ingrs);
                                    foreach ($ingrs as $ingr) {
                                        if ($ingr[6] == 1) {
                                    ?>
                                            <li id="<?= $ingr[0] ?>" class="done"><?= $ingr[1] ?>
                                                (<?= $ingr[2] ?>)
                                                - <?= $ingr[4] ?> $<?= $ingr[5] ?>
                                                <!-- <a href="update/Update_ingr.php?id=<?= $ingr[0] ?>">
                                                    <ion-icon class="edit" name="create-outline"></ion-icon>
                                                </a> -->
                                                <a href="vendor/Delete_shoplist.php?id=<?= $ingr[0] ?>">
                                                    <ion-icon class="delete" name="close-outline"></ion-icon>
                                                </a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li id="<?= $ingr[0] ?>" class="todo"><?= $ingr[1] ?>
                                                (<?= $ingr[2] ?>)
                                                - <?= $ingr[4] ?> $<?= $ingr[5] ?>
                                                <!-- <a href="update/Update_ingr.php?id=<?= $ingr[0] ?>">
                                                    <ion-icon class="edit" name="create-outline"></ion-icon>
                                                </a> -->
                                                <a href="vendor/Delete_shoplist.php?id=<?= $ingr[0] ?>">
                                                    <ion-icon class="delete" name="close-outline"></ion-icon>
                                                </a>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <p onclick="location.href='Addshoplist.php?type=<?= $type ?>'">+Add</p>
                                </ul>
                            </div>
                            <div class="innercard card back">
                                <h6>info about <?= $type ?></h6>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
    <script>
        let lists = document.querySelectorAll('.card-shop ul li');

        function donetask() {
            this.classList.remove('todo');
            this.classList.add('done');
        }

        function returntask() {
            this.classList.remove('done');
            this.classList.add('todo');
        }
        lists.forEach((item) =>
            item.addEventListener('click', donetask));
        lists.forEach((item) =>
            item.addEventListener('dblclick', returntask));
    </script>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>
    <script src="js/shoplist.js"></script>
</body>

</html>