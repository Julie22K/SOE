<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/forms.css" type="text/css" />
    <title>Add dish</title>

</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <form action="" method="post">
                    <legend>Adding a dish</legend>
                    <Label for="nm">Name:</Label>
                    <input type="text" name="name" id="nm">
                    <div class="container-input-2">
                        <select name="day" id="day">
                            <option value="monday">monday</option>
                            <option value="tuesday">tuesday</option>
                            <option value="wednesday">wednesday</option>
                            <option value="thursday">thursday</option>
                            <option value="friday">friday</option>
                            <option value="saturday">saturday</option>
                            <option value="sunday">sunday</option>
                        </select>
                        <select name="time" id="time">
                            <option value="breakfast">breakfast</option>
                            <option value="snack(1)">snack(1)</option>
                            <option value="lunch">lunch</option>
                            <option value="snack(2)">snack(2)</option>
                            <option value="dinner">dinner</option>
                        </select>
                    </div>
                    <legend style="margin-top: 15px;">Inridients:</legend>
                    <div class="list-ingr" id="list-ingr">
                        <input type="text" name="name" placeholder="name">
                        <input type="number" min="0" step="5" name="weight" placeholder="weight">


                    </div>
                    <span onclick="addingritem()">Add ingridient</span>

                    <button type="submit">Add dish</button>
                    <button type="reset">Clean</button>
                    <button type="button" onclick="location.href='menu.php'">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var counter = 0;

        function addingritem() {
            let li = $('#list-ingr').php();
            li += '<input type="text" name="name" placeholder="name">'
            li += '<input type="number" min="0" step="5" name="weight" placeholder="weight">'

            if (counter == 10) alert('You have 10 inridients!');
            else {
                $('#list-ingr').php(li);
                counter++;
            }

        }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>
</body>

</html>