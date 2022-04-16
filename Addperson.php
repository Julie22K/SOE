<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'blocks/head.php' ?>
    <link rel="stylesheet" href="CSS/forms.css" type="text/css" />
    <title>Add persons</title>
</head>

<body>
    <?php require_once 'blocks/preloader.php' ?>
    <div class="container">
        <?php require_once 'blocks/header.php' ?>
        <!-- main -->
        <div class="main">
            <?php require_once 'blocks/topbar.php' ?>
            <div class="page">
                <form action="vendor/Create_person.php" method="post">
                    <Label for="nm">Name:</Label>
                    <input type="text" name="name" id="nm">

                    <div class="radio">
                        <Label>Sex:</Label>
                        <label class="radio">
                            <input type="radio" name="sex" value="woman">Woman
                        </label>
                        <label class="radio">
                            <input type="radio" name="sex" value="man">Man
                        </label>
                    </div>
                    <Label for="hg">Height:</Label>
                    <input type="number" min="150" max="210" step="0.5" name="height" id="hg">
                    <Label for="wg">Weight:</Label>
                    <input type="number" min="40" max="100" step="0.5" name="weight" id="wg">
                    <Label for="dt">Date of birth:</Label>
                    <input type="date" name="date" id="dt">
                    <Label for="act">Activity:</Label>
                    <input type="range" min="1.2" max="1.9" step="0.1" name="activity" id="act">
                    <output class="price-output" for="act"></output>
                    <button type="submit">Add person</button>
                    <button type="reset">Clean</button>
                    <button type="button" onclick="location.href='persons.php'">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const act = document.querySelector('#act');
        const output = document.querySelector('.price-output');

        output.textContent = act.value;

        act.addEventListener('input', function() {
            output.textContent = act.value;
        });
    </script>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/setting.js"></script>
    <script src="js/color.js"></script>
</body>

</html>