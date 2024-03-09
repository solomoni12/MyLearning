<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .card{
                margin-top: 50px;
                margin-bottom: 20px;
                margin-left: 200px;
                margin-right: 300px;
            }
            .card-form{
                margin-top: 50px;
                margin-bottom: 20px;
                margin-left: 300px;
                margin-right: 300px;
            }
        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    </head>
    <body>
       <div class="card">
            <form class="card-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                <div class="form-group">
                    <label for="Email">E-mail:</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
       </div>

        <?php
            if (isset($_POST["email"])) {

                if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) === false) {
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

            <!-- PHP filter_list() Function -->
        <table>
            <tr>
                <td>Filter Name</td>
                <td>Filter ID</td>
            </tr>
            <?php
                foreach (filter_list() as $id =>$filter) {
                    echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
                }
            ?>
        </table>

        <?php 

                $email = "//mwalupani1234@gmail.com///";

                // remove alll illegal characters from email
                $mail = filter_var($email, FILTER_SANITIZE_EMAIL);

                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    echo $mail . "<br>";
                }else{
                    echo "It is not valid email" . "<br>";
                }


                // Number with a comma as a thousands separator
                $numberString = "1,000,000";

                // Applying the FILTER_SANITIZE_NUMBER_INT filter with FLAG_ALLOW_THOUSAND
                $filteredNumber = filter_var($numberString, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_THOUSAND);
                
                if ($filteredNumber !== false) {
                    echo "Valid integer: $filteredNumber". "<br>";
                } else {
                    echo "Invalid integer" . "<br>";
                } 


                // myclass test
                class MyClass {
                    protected $foo = 'Hello, world!';
                }
                
                class MyChildClass extends MyClass {
                    public function printFoo() {
                    echo $this->foo;
                    }
                }
                
                $obj = new MyChildClass();
                $obj->printFoo();




                function first($x, $y) {
                    return $x * ++$y;
                }
                $n = 5;
                echo first($n, 3), DIRECTORY_SEPARATOR, 'testDir';

        ?>
    </body>
</html>