<?php

    $str = "<h1> Hello World! </h1>";
    $newstr = filter_var($str, FILTER_SANITIZE_STRING);
    echo $newstr ."<br>";


    $int = 0;

    if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
        echo("Integer is valid" . "<br>");
    } else {
        echo("Integer is not valid". "<br>");
    }

    $email = "john.doe@example.com/";

    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo("$email is a valid email address" . "<br>");
    } else {
        echo("$email is not a valid email address" . "<br>");
    }

?>