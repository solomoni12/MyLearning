<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator test</title>
    <style>
        .card{
            margin-top: 20px;
            margin-bottom: 10px;
            margin-left: 100px;
            margin-right: 100px;
        }
        .card-form{
            margin-top: 20px;
            margin-bottom: 10px;
            margin-left: 300px;
            margin-right: 300px;
        }
        .select-field{
            margin-top: 20px;
            margin-bottom: 10px;
            margin-left: 300px;
            margin-right: 300px;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>
<body>
    
    <div class="card">
        <form class="card-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

           <div class="form-group">
            <input class="form-control" type="number" name="num01" placeholder="Number one" required>
           </div>

           <div class="form-group select-field">
            <select class="form-control" name="operator" id="operator" required>
                    <option value="add">+</option>
                    <option value="sub">-</option>
                    <option value="mult">*</option>
                    <option value="divide">/</option>
                </select>
           </div>

            <div class="form-group">
                <input class="form-control" type="number" name="num02" placeholder="Number two" required>
            </div>

            <button class="btn btn-primary" >calculate</button>
        </form>

    </div>

    <?php

        if($_SERVER["REQUEST_METHOD"]=="POST"){


            $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
            $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            $error = false;

            if (empty($num01) || (!is_numeric($num02) && $num02 != 0) || empty($operator)) {
                echo "num01, num02, and operator are required";
                $error = true;
            } elseif ($num02 == 0 && $operator == '/') {
                echo "Cannot divide by zero";
                $error = true;
            }
            
            if(!is_numeric($num01) || !is_numeric($num02)){

                echo "all number are required";

                $error = true; 
            }

            if(!$error){

                $value = '';
                
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
                        if ($num02 != 0) {
                            $value =  $num01 / $num02;
                        } else {
                            echo "Cannot divide by zero";
                            $error = true;

                        }
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