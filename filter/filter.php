<?php

    $str = "<h1>Hello World!</h1>";
    $newstr = filter_var($str, FILTER_SANITIZE_STRING);
    echo $newstr ."<br>";


    $int = "100";
    if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
         echo("Integer is valid");
    } else {
        echo("Integer is not valid");
    }

?>