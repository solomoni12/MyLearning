/*
                        PHP SORTING ARRAY
    1. sort() - Sort array in ascending alphabetic or numeric order
    2. rsort() - Sort array in decending alphabetic or numeric order
    3. asort() - Sort array in ascending in ascenfding order, accoding to value
    4. ksort() - Sort array in ascending order, accoding to key
    5. arsort() - Sort array in decending in ascenfding order, accoding to value
    6. krsort() - Sort array in decending order, accoding to key
*/

<?php 
    // sort()
    $fruits = array("Banana", "Apple", "Orange", "Cherry");
    sort($fruits);
    print_r($fruits);

    // rsort()
    $fruits = array("Banana", "Apple", "Orange", "Cherry");
    rsort($fruits);
    print_r($fruits);

    // asort()
    $age = array("Peter" => 32, "John" => 45, "Doe" => 23);
    asort($age);
    print_r($age);

    // ksort()
    $age = array("Peter" => 32, "John" => 45, "Doe" => 23);
    ksort($age);
    print_r($age);

    // arsort()
    $age = array("Peter" => 32, "John" => 45, "Doe" => 23);
    arsort($age);
    print_r($age);

    // krsort()
    $age = array("Peter" => 32, "John" => 45, "Doe" => 23);
    krsort($age);
    print_r($age);

?>