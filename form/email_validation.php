<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
        E-mail: <input type="text" name="email">
        <input type="submit" name="submit" value="Submit"> 
    </form>

    <?php
        if (isset($_GET["email"])) {
            if (!filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL) === false) {
                echo("Email is valid");
                echo "<br>";
            } else {
                echo("Email is not valid");
                echo "<br>";
            }
        }


        // Valiidate integer
        $num = "42";

        if (filter_var($num, FILTER_VALIDATE_INT) !== false) {
            echo "$num is a valid integer.";
            echo "<br>";
        } else {
            echo "$num is not a valid integer.";
            echo "<br>";
        }
    ?>

</body>
</html>