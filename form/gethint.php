<?php
    // Array with names
    $baseNames = [
        "Anna", "Brittany", "Cinderella", "Diana", "Eva", "Fiona", "Gunda", "Hege",
        "Inga", "Johanna", "Kitty", "Linda", "Nina", "Ophelia", "Petunia", "Amanda",
        "Raquel", "Cindy", "Doris", "Eve", "Evita", "Sunniva", "Tove", "Unni", "Violet",
        "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky"
    ];
    
    $a = $baseNames; 
    
    // Generate additional random names until the array has more than 1000 names
    while (count($a) < 1000) {
        $randomName = $baseNames[array_rand($baseNames)];
        $a[] = $randomName;
    }
    
    // get the q parameter from URL
    $q = $_REQUEST["q"];

    $hint = "";

    // lookup all hints from array if $q is different from ""
    if ($q !== "") {
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                if ($hint === "") {
                    $hint = $name;
                } else {
                    $hint .= ", $name";
                }
            }
        }
    }

    echo $hint === "" ? "no suggestion" : $hint;
?>