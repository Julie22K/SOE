<?php
require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/profiles.css" type="text/css" />
    <title>Persons</title>

</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <div class="container" id="profiles">
                    <?php
                    $persons = mysqli_query($soe, "SELECT * FROM `persons`");
                    $persons = mysqli_fetch_all($persons);
                    foreach ($persons as $person) {
                    ?>
                        <div class="card card-prof">
                            <h4><?= $person[1] ?></h4>
                            <div class="face">
                                <span class="line">
                                    <p>Sex:</p>
                                    <p class="num"><?= $person[2] ?></p>
                                </span>
                                <span class="line">
                                    <p>Weight:</p>
                                    <p class="num"><?= $person[6] ?>kg</p>
                                </span>
                                <span class="line">
                                    <p>Hight:</p>
                                    <p class="num"><?= $person[7] ?>cm</p>
                                </span>
                                <span class="line">
                                    <p>Age:</p>
                                    <p class="num"><?= $person[3] ?>y.o.</p>
                                </span>
                                <span class="line">
                                    <p>Date of birth:</p>
                                    <p class="num"><?= $person[4] ?></p>
                                </span>
                                <span class="line">
                                    <p>Activity:</p>
                                    <p class="num"><?= $person[5] ?></p>
                                </span>
                            </div>
                            <div class="addition">
                                <span class="line">
                                    <p>KKAL:</p>
                                    <p class="num"><?= $person[8] ?> kkal</p>
                                </span>
                                <span class="line">
                                    <p>Protein:</p>
                                    <p class="num"><?= $person[11] ?> g</p>
                                </span>
                                <span class="line">
                                    <p>Carb:</p>
                                    <p class="num"><?= $person[9] ?> g</p>
                                </span>
                                <span class="line">
                                    <p>Fat:</p>
                                    <p class="num"><?= $person[10] ?> g</p>
                                </span>
                                <span class="line">
                                    <p>Water:</p>
                                    <p class="num"><?= $person[13] ?> ml</p>
                                </span>
                                <span class="line">
                                    <p>Cellulose:</p>
                                    <p class="num"><?= $person[12] ?>g</p>
                                </span>
                                <span class="line edit-delete">
                                    <a href="update/Update_person.php?id=<?= $person[0] ?>">
                                        <ion-icon class="edit" name="create-outline"></ion-icon>
                                    </a>
                                    <a href="vendor/Delete_person.php?id=<?= $person[0] ?>">
                                        <ion-icon class="delete" name="close-outline"></ion-icon>
                                    </a>
                                </span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div onclick="location.href='Addperson.php'" class="card none">
                        <div class="card-add">
                            <h6>Add person</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>
</body>
<.php