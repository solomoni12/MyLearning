<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array test</title>
</head>
<body>

    <?php


        $num = [1, 12, 3, 0, 5, 9];

        // remove element form an array
        unset($num["9"]);


        // sort num,ber in the array
        sort($num);


        // display number of an array
        echo "Element of an Array is <br>";
        foreach($num as $item){

            echo $item;
            echo "<br>";
        }



        // car class and their functionality
        class car{
            public $color;
            public $model;

            public function __construct($color,$model){
                $this->color = $color;
                $this->model = $model;
            }
        }

        $newCar = new Car("red","model");

        foreach($newCar as $car){
            echo $car ."<br>";
        }
    ?>
</body>
</html>