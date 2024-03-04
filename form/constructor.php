<!DOCTYPE html>
<html>
    <body>
        <?php
            class Fruit {
                public $name;
                public $color;

                function __construct($name, $color) {
                    $this->name = $name; 
                    $this->color = $color;
                }

                public function getName(){
                    return $this->name;
                }

                public function getColor(){
                    return $this->color;
                }

                function __destruct() {
                    echo "The fruit name is {$this->name} and color is {$this->color}"; 
                    echo "<br>";
                }
            }
            $apple = new Fruit("Apple", "Red");

            echo $apple->getName() . "<br>";
            echo $apple->getColor() . "<br>";

            
        ?>
    
    </body>
</html>
