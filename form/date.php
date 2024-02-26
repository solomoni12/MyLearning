<?php
    // Get today's date
    $today = date("Y-m-d");

    // Calculate the date after seven days
    $nextWeek = date("Y-m-d", strtotime("+7 day"));

    // Output the dates
    echo "Today's date: $today<br><br>";

    echo "Date: $nextWeek <br><br>";


    date_default_timezone_set('Africa/Dar_es_Salaam'); 


    echo "The time is " . date("h:i:sa") ."<br><br>";




    $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
    $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
    $nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);

    echo "Tomorrow: " . date("Y-m-d", $tomorrow) . "<br>";
    echo "Last Month: " . date("Y-m-d", $lastmonth) . "<br>";
    echo "Next Year: " . date("Y-m-d", $nextyear) . "<br>";

    // Set the default timezone to avoid potential issues
    date_default_timezone_set('Africa/Dar_es_Salaam'); 

    // Get the current weekday name
    $weekdayName = date("l");

    echo "Today is: " . $weekdayName;
?>
