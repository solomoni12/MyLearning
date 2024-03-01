<!DOCTYPE html>
<html>
    <body>

    <div className="fixed top-0 right-0 p-4 flex justify-end space-x-4">
      <a href="#" className="text-gray-700 hover:text-black">About</a>
      <a href="#" className="text-gray-700 hover:text-black">Home</a>
      <a href="#" className="text-gray-700 hover:text-black">Contact</a>
    </div>
</div>
</div>

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
