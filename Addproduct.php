<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php';
    require_once 'config/connect.php';
    ?>
    <link rel="stylesheet" href="CSS/forms.css" type="text/css" />
    <title>Add products</title>
</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <form action="vendor/Create_product.php" method="post">
                    <legend>Adding an ingridient:</legend>
                    <Label for="nm">Name:</Label>
                    <input type="text" name="name" id="nm">
                    <div class="container-input-4">
                        <select name="type">
                            <option selected disabled>choose a group</option>
                            <?php
                            foreach ($types as $type) {
                            ?>
                                <option value="<?= $type ?>"><?= $type ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="number" min='0' step="0.01" name="price" placeholder="price(100g)">
                        <input type="text" name="image" placeholder="url">
                    </div>

                    <div class="container-input-5">
                        <input type="number" step="0.001" name="kkal" placeholder="kkal">
                        <input type="number" step="0.001" name="carb" placeholder="carb">
                        <input type="number" step="0.001" name="fat" placeholder="fat">
                        <input type="number" step="0.001" name="protein" placeholder="protein">
                        <input type="number" step="0.001" name="water" placeholder="water">
                        <input type="number" step="0.001" name="cellulose" placeholder="cellulose">


                        <input type="number" step="0.001" name="vitA" placeholder="A">
                        <input type="number" step="0.001" name="vitE" placeholder="E">
                        <input type="number" step="0.001" name="vitK" placeholder="K">
                        <input type="number" step="0.001" name="vitD" placeholder="D">
                        <input type="number" step="0.001" name="vitC" placeholder="C">
                        <input type="number" step="0.001" name="om3" placeholder="omega3">
                        <input type="number" step="0.001" name="om6" placeholder="omega6">
                        <input type="number" step="0.001" name="vitB1" placeholder="B1">
                        <input type="number" step="0.001" name="vitB2" placeholder="B2">
                        <input type="number" step="0.001" name="vitB5" placeholder="B5">
                        <input type="number" step="0.001" name="vitB6" placeholder="B6">
                        <input type="number" step="0.001" name="vitB8" placeholder="B8">
                        <input type="number" step="0.001" name="vitB9" placeholder="B9">
                        <input type="number" step="0.001" name="vitB12" placeholder="B12">
                        <input type="number" step="0.001" name="minMg" placeholder="Mg">
                        <input type="number" step="0.001" name="minNa" placeholder="Na">
                        <input type="number" step="0.001" name="minCl" placeholder="Cl">
                        <input type="number" step="0.001" name="minCa" placeholder="Ca">
                        <input type="number" step="0.001" name="minK" placeholder="K">
                        <input type="number" step="0.001" name="minS" placeholder="S">
                        <input type="number" step="0.001" name="minP" placeholder="P">
                        <input type="number" step="0.001" name="minCu" placeholder="Cu">
                        <input type="number" step="0.001" name="minI" placeholder="I">
                        <input type="number" step="0.001" name="minCr" placeholder="Cr">
                    </div>

                    <button type="submit">Add product</button>
                    <button type="reset">Clean</button>
                    <button type="button" onclick="location.href='products.php'">Cancel</button>
                </form>
            </div>
        </div>
    </div>




    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>
</body>

</html>