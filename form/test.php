<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test form</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-control">
            <label for="name">Name</label>
            <input type="text" name="name">
            <input type="submit" value="send" name="send">
        </div>
    </form>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $name = htmlspecialchars($_REQUEST["name"]);

    if(empty($name)){
        echo "name is required";
    }

    echo $name;
}