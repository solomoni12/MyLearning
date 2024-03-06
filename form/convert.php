<?php 

    // PHP String Functions
    
    echo strtoupper("hello mwalupani") . "<br>";
    echo strtolower("HELLO MWALUPANI") . "<br>";
    echo lcfirst("HELLO MWALUPANI") . "<br>";
    echo ucfirst("hello mwalupani") . "<br>";
    echo ucwords("hello mwalupani") . "<br>";

    function ucwordsLowerFirst($inputString) {
        $words = explode(' ', $inputString);
        $lowercasedWords = array_map('lcfirst', $words);
        $resultString = implode(' ', $lowercasedWords);
        return $resultString;
    }
    
    echo ucwordsLowerFirst("HELLO MWALUPANI") . "<br>";
    

?>