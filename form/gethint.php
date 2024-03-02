<?php
    // Array with names
    $baseNames = [
        "Anna", "Brittany", "Cinderella", "Diana", "Eva", "Fiona", "Gunda", "Hege",
        "Inga", "Johanna", "Kitty", "Linda", "Nina", "Ophelia", "Petunia", "Amanda",
        "Raquel", "Cindy", "Doris", "Eve", "Evita", "Sunniva", "Tove", "Unni", "Violet",
        "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky"
    ];
    
    $a = $baseNames; 
    
    while (count($a) < 1000) {
        $randomName = $baseNames[array_rand($baseNames)];
        $a[] = $randomName;
    }
    
    $q = $_REQUEST["q"];

    $hint = "";

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