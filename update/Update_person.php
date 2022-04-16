<?php
require_once '../config/connect.php';
$post_id = $_GET['id'];
$persons = mysqli_query($soe, "SELECT * FROM `persons` WHERE `ID` = '$post_id'");
$person = mysqli_fetch_assoc($persons);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once '../blocks/head_for_update.php' ?>
    <link rel="stylesheet" href="../CSS/forms.css" type="text/css" />

    <title>Update person</title>


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
                <form action="../vendor/Update_person.php" method="post">
                    <input style="display: none;" type="number" value="<?= $post_id ?>" name="idc">
                    <Label for="nm">Name:</Label>
                    <input type="text" name="name" id="nm" value="<?= $person['Name'] ?>">
                    <Label for="sx">sex:</Label>
                    <input type="text" name="sex" id="sx" value="<?= $person['Sex'] ?>" disabled>
                    <Label for="hg">Height:</Label>
                    <input type="number" min="150" max="210" step="0.5" name="height" id="hg" value="<?= $person['Height'] ?>">
                    <Label for="wg">Weight:</Label>
                    <input type="number" min="40" max="100" step="0.5" name="weight" id="wg" value="<?= $person['Weight'] ?>">
                    <Label for="dt">Date of birth:</Label>
                    <input type="date" name="date" id="dt" value="<?= $person['Date_of_birth'] ?>">
                    <Label for="act">Activity:</Label>
                    <input type="number" min="1.2" max="1.9" step="0.1" name="activity" id="act" value="<?= $person['activity'] ?>">
                    <button type="submit">Edit person</button>
                    <button type="reset">Clean</button>
                    <button type="button" onclick="location.href='../persons.php'">Cancel</button>
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