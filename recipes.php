<?php
require_once 'config/connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/dishes.css" type="text/css" />
    <link rel="stylesheet" href="CSS/table.css" type="text/css" />
    <link rel="stylesheet" href="CSS/forms.css" type="text/css" />
    <link rel="stylesheet" href="CSS/modal.css" type="text/css" />
    <link rel="stylesheet" href="CSS/filtersort.css" type="text/css" />
    <title>Recipes</title>

</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <script>
        $(document).ready(function() {
            $("#srch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#dishes div").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <div class="card filter-sort">
                    <div class="filter" id="filter">
                        <button onclick="filterSelection('all')" class="carddishSort active">All</button>
                        <button onclick="filterSelection('sup')" class="carddishSort">sup</button>
                        <button onclick="filterSelection('salad')" class="carddishSort">salad</button>
                        <button onclick="filterSelection('meat')" class="carddishSort">meat</button>
                        <button onclick="filterSelection('snack')" class="carddishSort">snack</button>
                        <button onclick="filterSelection('breakfast')" class="carddishSort">breakfast</button>
                        <button onclick="filterSelection('sandwich')" class="carddishSort">sandwich</button>
                        <button onclick="filterSelection('drink')" class="carddishSort">drink</button>
                        <button onclick="filterSelection('desert')" class="carddishSort">desert</button>
                        <button onclick="filterSelection('poridje')" class="carddishSort">poridje</button>
                        <button onclick="filterSelection('puncakes')" class="carddishSort">puncakes</button>
                        <button onclick="filterSelection('sweets')" class="carddishSort">sweets</button>
                        <button onclick="filterSelection('sauce')" class="carddishSort">sauce</button>
                        <button onclick="filterSelection('paste')" class="carddishSort">paste</button>
                        <button onclick="filterSelection('baking')" class="carddishSort">baking</button>
                        <button onclick="filterSelection('pudding')" class="carddishSort">pudding</button>
                        <button onclick="filterSelection('other')" class="carddishSort">others</button>
                    </div>
                    <div class="sort">
                        <button class="active">A..Z</button>
                        <button>Weight</button>
                        <button>Price</button>
                        <button>KKAL</button>
                    </div>
                    <div class="search">
                        <input type="text" id="srch" placeholder="search...">
                    </div>
                    <!-- <div class="add">
                        <button onclick="location.href='Addrecipe.php'">Add recipe</button>
                    </div> -->
                </div>
                <div class="container">
                    <?php
                    $recipes = mysqli_query($soe, "SELECT * FROM `recipes`");
                    $recipes = mysqli_fetch_all($recipes);
                    foreach ($recipes as $recipe) {
                    ?>
                        <div class="card card-dish <?= $recipe[2] ?>" id="<?= $recipe[1] ?>">
                            <div class="data">
                                <table>
                                    <thead>
                                        <tr>
                                            <th><img class="type-dish" src="image/typeofdishes/<?= $recipe[2] ?>.png" alt="[dish]"></th>
                                            <th><?= $recipe[1] ?></th>
                                            <th><?= $recipe[3] ?>g</th>
                                            <th><?= $recipe[4] ?>$</th>
                                            <th><?= $recipe[8] ?>kkal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ingrs = mysqli_query($soe, "SELECT * FROM `ingridients` WHERE `RecipeName`='$recipe[1]'");
                                        $ingrs = mysqli_fetch_all($ingrs);
                                        foreach ($ingrs as $ingr) {
                                        ?>
                                            <tr>
                                                <td><img class="type-food" src="image/groups/<?= $ingr[2] ?>.png" alt="<?= $ingr[2] ?>.png"></td>
                                                <td><?= $ingr[1] ?></td>
                                                <td><?= $ingr[3] ?>g</td>
                                                <td><?= $ingr[4] ?>$</td>
                                                <td><?= $ingr[7] ?>kkal</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="carddish-info">
                                <!-- <ion-icon name="today-outline"></ion-icon><span class="text"></span>
                                <ion-icon name="time-outline"></ion-icon><span class="text"></span> -->
                                <ion-icon onclick="chooseday(<?= $recipe[0] ?>)" name="apps-outline"></ion-icon>
                                <ion-icon name="podium-outline"></ion-icon>
                                <ion-icon onclick="showrecipe('<?= $recipe[7] ?>')" name="reader-outline"></ion-icon>
                                <ion-icon onclick="showimage('<?= $recipe[5] ?>')" name="images-outline"></ion-icon>
                                <ion-icon onclick="showvideo('<?= $recipe[6] ?>')" name="film-outline"></ion-icon>
                                <a href="update/Update_recipe.php?id=<?= $recipe[0] ?>">
                                    <ion-icon class="edit" name="create-outline"></ion-icon>
                                </a>
                                <a href="vendor/Delete_recipe.php?id=<?= $recipe[0] ?>">
                                    <ion-icon class="delete" name="close-outline"></ion-icon>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div onclick="location.href='Addrecipe.php'" class="card none">
                        <div class="card-add">
                            <h6>Add recipe</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="Modal" class="modal">
        <span class="close">&times;</span>
        <!-- Modal content -->
        <div class="modal-content" id=modal-content>
            <form action="vendor/Create_menucell.php" method="post" id="ch-mn">
                <input style="display: none;" type="number" value="" id="id" name="idc">
                <table class="menu">
                    <caption>choose day and time</caption>
                    <thead>
                        <tr>
                            <th></th>
                            <th>mn</th>
                            <th>ts</th>
                            <th>wd</th>
                            <th>th</th>
                            <th>fr</th>
                            <th>st</th>
                            <th>sn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Br</th>
                            <td class="daymenu"><input type="checkbox" name="monday[]" value="breakfast" class="tgl tgl-flip" id="bm"><label class="tgl-btn" for="bm"></label></td>
                            <td class="daymenu"><input type="checkbox" name="tuesday[]" value="breakfast" class="tgl tgl-flip" id="bt"><label class="tgl-btn" for="bt"></label></td>
                            <td class="daymenu"><input type="checkbox" name="wednesday[]" value="breakfast" class="tgl tgl-flip" id="bw"><label class="tgl-btn" for="bw"></label></td>
                            <td class="daymenu"><input type="checkbox" name="thursday[]" value="breakfast" class="tgl tgl-flip" id="bth"><label class="tgl-btn" for="bth"></label></td>
                            <td class="daymenu"><input type="checkbox" name="friday[]" value="breakfast" class="tgl tgl-flip" id="bf"><label class="tgl-btn" for="bf"></label></td>
                            <td class="daymenu"><input type="checkbox" name="saturday[]" value="breakfast" class="tgl tgl-flip" id="bst"><label class="tgl-btn" for="bst"></label></td>
                            <td class="daymenu"><input type="checkbox" name="sunday[]" value="breakfast" class="tgl tgl-flip" id="bsn"><label class="tgl-btn" for="bsn"></label></td>
                        </tr>
                        <tr>
                            <th>Sn1</th>
                            <td class="daymenu"><input type="checkbox" name="monday[]" value="snack(1)" class="tgl tgl-flip" id="s1m"><label class="tgl-btn" for="s1m"></label></td>
                            <td class="daymenu"><input type="checkbox" name="tuesday[]" value="snack(1)" class="tgl tgl-flip" id="s1t"><label class="tgl-btn" for="s1t"></label></td>
                            <td class="daymenu"><input type="checkbox" name="wednesday[]" value="snack(1)" class="tgl tgl-flip" id="s1w"><label class="tgl-btn" for="s1w"></label></td>
                            <td class="daymenu"><input type="checkbox" name="thursday[]" value="snack(1)" class="tgl tgl-flip" id="s1th"><label class="tgl-btn" for="s1th"></label></td>
                            <td class="daymenu"><input type="checkbox" name="friday[]" value="snack(1)" class="tgl tgl-flip" id="s1f"><label class="tgl-btn" for="s1f"></label></td>
                            <td class="daymenu"><input type="checkbox" name="saturday[]" value="snack(1)" class="tgl tgl-flip" id="s1st"><label class="tgl-btn" for="s1st"></label></td>
                            <td class="daymenu"><input type="checkbox" name="sunday[]" value="snack(1)" class="tgl tgl-flip" id="s1sn"><label class="tgl-btn" for="s1sn"></label></td>
                        </tr>
                        <tr>
                            <th>Ln</th>
                            <td class="daymenu"><input type="checkbox" name="monday[]" value="lunch" class="tgl tgl-flip" id="lm"><label class="tgl-btn" for="lm"></label></td>
                            <td class="daymenu"><input type="checkbox" name="tuesday[]" value="lunch" class="tgl tgl-flip" id="lt"><label class="tgl-btn" for="lt"></label></td>
                            <td class="daymenu"><input type="checkbox" name="wednesday[]" value="lunch" class="tgl tgl-flip" id="lw"><label class="tgl-btn" for="lw"></label></td>
                            <td class="daymenu"><input type="checkbox" name="thursday[]" value="lunch" class="tgl tgl-flip" id="lth"><label class="tgl-btn" for="lth"></label></td>
                            <td class="daymenu"><input type="checkbox" name="friday[]" value="lunch" class="tgl tgl-flip" id="lf"><label class="tgl-btn" for="lf"></label></td>
                            <td class="daymenu"><input type="checkbox" name="saturday[]" value="lunch" class="tgl tgl-flip" id="lst"><label class="tgl-btn" for="lst"></label></td>
                            <td class="daymenu"><input type="checkbox" name="sunday[]" value="lunch" class="tgl tgl-flip" id="lsn"><label class="tgl-btn" for="lsn"></label></td>
                        </tr>
                        <tr>
                            <th>Sn2</th>
                            <td class="daymenu"><input type="checkbox" name="monday[]" value="snack(2)" class="tgl tgl-flip" id="s2m"><label class="tgl-btn" for="s2m"></label></td>
                            <td class="daymenu"><input type="checkbox" name="tuesday[]" value="snack(2)" class="tgl tgl-flip" id="s2t"><label class="tgl-btn" for="s2t"></label></td>
                            <td class="daymenu"><input type="checkbox" name="wednesday[]" value="snack(2)" class="tgl tgl-flip" id="s2w"><label class="tgl-btn" for="s2w"></label></td>
                            <td class="daymenu"><input type="checkbox" name="thursday[]" value="snack(2)" class="tgl tgl-flip" id="s2th"><label class="tgl-btn" for="s2th"></label></td>
                            <td class="daymenu"><input type="checkbox" name="friday[]" value="snack(2)" class="tgl tgl-flip" id="s2f"><label class="tgl-btn" for="s2f"></label></td>
                            <td class="daymenu"><input type="checkbox" name="saturday[]" value="snack(2)" class="tgl tgl-flip" id="s2st"><label class="tgl-btn" for="s2st"></label></td>
                            <td class="daymenu"><input type="checkbox" name="sunday[]" value="snack(2)" class="tgl tgl-flip" id="s2sn"><label class="tgl-btn" for="s2sn"></label></td>
                        </tr>
                        <tr>
                            <th>Dn</th>
                            <td class="daymenu"><input type="checkbox" name="monday[]" value="dinner" class="tgl tgl-flip" id="dm"><label class="tgl-btn" for="dm"></label></td>
                            <td class="daymenu"><input type="checkbox" name="tuesday[]" value="dinner" class="tgl tgl-flip" id="dt"><label class="tgl-btn" for="dt"></label></td>
                            <td class="daymenu"><input type="checkbox" name="wednesday[]" value="dinner" class="tgl tgl-flip" id="dw"><label class="tgl-btn" for="dw"></label></td>
                            <td class="daymenu"><input type="checkbox" name="thursday[]" value="dinner" class="tgl tgl-flip" id="dth"><label class="tgl-btn" for="dth"></label></td>
                            <td class="daymenu"><input type="checkbox" name="friday[]" value="dinner" class="tgl tgl-flip" id="df"><label class="tgl-btn" for="df"></label></td>
                            <td class="daymenu"><input type="checkbox" name="saturday[]" value="dinner" class="tgl tgl-flip" id="dst"><label class="tgl-btn" for="dst"></label></td>
                            <td class="daymenu"><input type="checkbox" name="sunday[]" value="dinner" class="tgl tgl-flip" id="dsn"><label class="tgl-btn" for="dsn"></label></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit">Add dish</button>
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById("Modal");
        var span = document.getElementsByClassName("close")[0];
        var formmenu = document.getElementById("ch-mn");

        function chooseday(id) {
            modal.style.display = "block";

            $('#id').val(id);
        }

        function showimage(url) {
            modal.style.display = "block";
            $('#modal-content').empty();
            let li = '<img src="' + url + '" alt="src">'
            $('#modal-content').html(li);
        }

        function showvideo(url) {
            modal.style.display = "block";
            $('#modal-content').empty();
            let li = '<a href="' + url + '">' + url + '</a>'
            $('#modal-content').html(li);
        }

        function showrecipe(text) {
            modal.style.display = "block";
            $('#modal-content').empty();
            let li = '<p>' + text + '</p>'
            $('#modal-content').html(li);
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
    <script src="js/dishes.js"></script>

</body>

</html>