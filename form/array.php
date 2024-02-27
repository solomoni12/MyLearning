<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array test</title>
</head>
<body>

    <?php


        $num = [1, 2, 3, 4, 5, 9];

        // remove element form an array
        unset($num["0"]);

        echo "Element of an Array is <br>";
        foreach($num as $item){

            echo $item;
            echo "<br>";
        }
    ?>
</body>
</html>