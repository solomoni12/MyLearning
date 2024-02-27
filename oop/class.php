<!DOCTYPE html>
<html>
<body>

<?php
    class Fruit {

        // Properties
        public $name;
        public $color;

        // constructor
        function __construct($name, $color){
            $this->name = $name;
            $this->color = $color;
        }
        
        // Methods
        function get_name() {
            return $this->name;
        }

        function get_color() {
            return $this->color;
        }
    }

    $apple = new Fruit('Apple', 'Red');

    echo "Name: " . $apple->get_name();
    echo "<br>";
    echo "Color: " .  $apple->get_color();
    echo "<br>";
    echo "<br>";

    // constant
    class Goodbye {
        const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
      }
      
      echo Goodbye::LEAVING_MESSAGE;
?>
 
</body>
</html>
