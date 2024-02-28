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
        $favcolor = $_SESSION['favcolor'];
        $favanimal = $_SESSION['favanimal'];

        echo $favcolor . "<br>";
        echo $favanimal . "<br>";

        // There is a big difference between double quotes and single quotes in PHP.
        // Double quotes process special characters, single quotes does not.

        $name = "solomon mwalupani";

        echo "hello, $name!";
        echo "<br>";
        echo 'hello, $name!';
        echo "<br>";

        // strlen return length of the string
        echo strlen("hello Solomon Mwalupani!");
        echo "<br>";

        // change word either to upper or lower case
        echo strtolower("hello Solomon Mwalupani!");
        echo "<br>";
    ?>
</body>
</html>