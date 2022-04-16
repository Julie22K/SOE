<?php
require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/table.css" type="text/css" />
    <link rel="stylesheet" href="CSS/forms.css" type="text/css" />
    <link rel="stylesheet" href="CSS/modal.css" type="text/css" />
    <link rel="stylesheet" href="CSS/filtersort.css" type="text/css" />
    <link rel="stylesheet" href="CSS/products.css" type="text/css" />
    <title>Products</title>

</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
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
                        <button onclick="filterSelection('all')" class="productSort active">All</button>
                        <?php
                        foreach ($types as $type) {
                        ?>
                            <button onclick="filterSelection('<?= $type ?>')" class="productSort"><?= $type ?></button>
                        <?php
                        }
                        ?>
                    </div>
                    <input id="myInput" type="text" placeholder="Search..">
                    <button onclick="location.href='Addproduct.php'">Add product</button>
                </div>
                <div class="card products">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>

                                <th>Price(100g)</th>

                                <th>kkal</th>
                                <th>fat</th>
                                <th>protein</th>
                                <th>carb</th>
                                <th>cellulose</th>
                                <th>water</th>
                                <th>A</th>
                                <th>E</th>
                                <th>K</th>
                                <th>D</th>
                                <th>C</th>
                                <th>Om3</th>
                                <th>Om6</th>
                                <th>B1</th>
                                <th>B2</th>
                                <th>B5</th>
                                <th>B6</th>
                                <th>B8</th>
                                <th>B9</th>
                                <th>B12</th>
                                <th>Mg</th>
                                <th>Na</th>
                                <th>Cl</th>
                                <th>Ca</th>
                                <th>K</th>
                                <th>S</th>
                                <th>P</th>
                                <th>Cu</th>
                                <th>I</th>
                                <th>Cr</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php
                            $products = mysqli_query($soe, "SELECT * FROM `products`");
                            $products = mysqli_fetch_all($products);
                            foreach ($products as $product) {
                            ?>
                                <tr class="tr-product <?= $product[2] ?>">
                                    <td class="name" onclick="picture('<?= $product[4] ?>')">
                                        <img src="image/groups/<?= $product[2] ?>.png" alt="<?= $product[2] ?>"><?= $product[1] ?>
                                    </td>
                                    <td><?= $product[3] ?></td>
                                    <td><?= $product[5] ?></td>
                                    <td><?= $product[6] ?></td>
                                    <td><?= $product[7] ?></td>
                                    <td><?= $product[8] ?></td>
                                    <td><?= $product[9] ?></td>
                                    <td><?= $product[10] ?></td>
                                    <td><?= $product[11] ?></td>
                                    <td><?= $product[12] ?></td>
                                    <td><?= $product[13] ?></td>
                                    <td><?= $product[14] ?></td>
                                    <td><?= $product[15] ?></td>
                                    <td><?= $product[16] ?></td>
                                    <td><?= $product[17] ?></td>
                                    <td><?= $product[18] ?></td>
                                    <td><?= $product[19] ?></td>
                                    <td><?= $product[20] ?></td>
                                    <td><?= $product[21] ?></td>
                                    <td><?= $product[22] ?></td>
                                    <td><?= $product[23] ?></td>
                                    <td><?= $product[24] ?></td>
                                    <td><?= $product[25] ?></td>
                                    <td><?= $product[26] ?></td>
                                    <td><?= $product[27] ?></td>
                                    <td><?= $product[28] ?></td>
                                    <td><?= $product[29] ?></td>
                                    <td><?= $product[30] ?></td>
                                    <td><?= $product[31] ?></td>
                                    <td><?= $product[32] ?></td>
                                    <td><?= $product[33] ?></td>
                                    <td><?= $product[34] ?></td>
                                    <td><?= $product[35] ?></td>
                                    <td class='setting'><a href="update/Update_product.php?id=<?= $product[0] ?>">
                                            <ion-icon class="edit" name="create-outline"></ion-icon>
                                        </a></td>
                                    <td class='setting'><a href="vendor/Delete_product.php?id=<?= $product[0] ?>">
                                            <ion-icon class="delete" name="close-outline"></ion-icon>
                                        </a></td>
                                    <!-- onclick="alert('\'Ви впевнені, що хочете видалити елемент з назвою: '<?= $blog[2] ?>'?\'')"-->
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <p onclick="location.href='Addproduct.php'" class="addproduct">+ Add product</p>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <!-- Modal content -->
        <div class="modal-content" id=modal-content>

            <p>Some text in the Modal..</p>
        </div>
    </div>
    <script>
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];

        function picture(url) {
            modal.style.display = "block";
            let li = '<img class="product" src="' + url + '" alt="[add a picture]">'
            $('#modal-content').html(li);
        }
        span.onclick = function() {
            modal.style.display = "none";
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
    <script src="js/products.js"></script>
</body>

</html>