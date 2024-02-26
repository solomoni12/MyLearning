<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session test</title>
</head>
<body>

    <?php 

        // display

        echo $_SESSION['favcolor'] . "<br>";
        echo $_SESSION['favanimal'] . "<br>";
        echo $_SESSION['favfood'] . "<br>";
    ?>
</body>
</html>