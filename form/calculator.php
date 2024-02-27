<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator test</title>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <input type="number" name="num01" placeholder="Number one" required>
        <select name="operator" id="operator" required>
            <option value="add">+</option>
            <option value="sub">-</option>
            <option value="mult">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02" placeholder="Number two" required>

        <button>calculate</button>
    </form>

    <?php

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
            $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            $error = false;

            if(empty($num01) || empty($num02) || empty($operator)){
                echo "all data are required";

                $error = true;
            }

            if(!is_numeric($num01) || !is_numeric($num02)){

                echo "all number are required";

                $error = true; 
            }

            if(!$error){
                
                switch($operator){
                    
                    case "add":
                        $value =  $num01 + $num02;
                        break;
                    case "sub":
                        $value =  $num01 - $num02;
                        break;
                    case "mult":
                        $value =  $num01 * $num02; 
                        break;
                    case "divide":
                        $value =  $num01 / $num02;
                        break;

                    default;
                        echo "some thing wrong please try again";
                }

                echo $value;
            }

        }
    ?>
</body>
</html>