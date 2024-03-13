<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Date and Time Functions</title>
</head>
<body>
<?php
// 1. checkdate()
$isValid = checkdate(2, 29, 2024); // Check if February 29, 2024 is a valid date
echo "<p>1. checkdate(): Is February 29, 2024 valid? " . ($isValid ? "Yes" : "No") . "</p>";

// 2. date_add()
$date = date_create('2024-01-01');
date_add($date, date_interval_create_from_date_string('1 day'));
echo "<p>2. date_add(): " . date_format($date, 'Y-m-d') . "</p>";

// 3. date_create_from_format()
$date = date_create_from_format('Y-m-d', '2024-12-31');
echo "<p>3. date_create_from_format(): " . date_format($date, 'F j, Y') . "</p>";

// 4. date_create()
$date = date_create();
echo "<p>4. date_create(): " . date_format($date, 'Y-m-d H:i:s') . "</p>";

// 5. date_date_set()
$date = date_create();
date_date_set($date, 2024, 12, 31);
echo "<p>5. date_date_set(): " . date_format($date, 'Y-m-d') . "</p>";

// 6. date_default_timezone_get()
echo "<p>6. date_default_timezone_get(): " . date_default_timezone_get() . "</p>";

// 7. date_default_timezone_set()
date_default_timezone_set('America/New_York');
echo "<p>7. date_default_timezone_set(): " . date_default_timezone_get() . "</p>";

// 8. date_diff()
$date1 = date_create('2024-01-01');
$date2 = date_create('2024-12-31');
$diff = date_diff($date1, $date2);
echo "<p>8. date_diff(): " . $diff->format('%R%a days') . "</p>";

// 9. date_format()
$date = date_create('2024-01-01');
echo "<p>9. date_format(): " . date_format($date, 'F j, Y') . "</p>";

// 10. date_get_last_errors()
// Not providing an example as it returns an array of errors.

// 11. date_interval_create_from_date_string()
$interval = date_interval_create_from_date_string('10 days');
echo "<p>11. date_interval_create_from_date_string(): " . date_interval_format($interval, '%a days') . "</p>";

// 12. date_interval_format()
echo "<p>12. date_interval_format(): " . date_interval_format($interval, '%a days') . "</p>";

// 13. date_isodate_set()
$date = date_create();
date_isodate_set($date, 2024, 1); // Set the date to the first day of the first week of 2024
echo "<p>13. date_isodate_set(): " . date_format($date, 'Y-m-d') . "</p>";

// 14. date_modify()
$date = date_create('2024-01-01');
date_modify($date, '+1 day');
echo "<p>14. date_modify(): " . date_format($date, 'Y-m-d') . "</p>";

// 15. date_offset_get()
$date = date_create('2024-01-01', timezone_open('America/New_York'));
echo "<p>15. date_offset_get(): " . date_offset_get($date) . "</p>";

// And so on for the other functions listed.

?>
</body>
</html>
