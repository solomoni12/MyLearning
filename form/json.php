<?php
    // Sample data: array of objects
    $data = [
        [
            'name' => 'John Doe',
            'age' => 30,
            'city' => 'New York'
        ],
        [
            'name' => 'Jane Smith',
            'age' => 25,
            'city' => 'Los Angeles'
        ],
        [
            'name' => 'Bob Johnson',
            'age' => 35,
            'city' => 'Chicago'
        ]
    ];

    // Convert the array to JSON
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Output the JSON data
    echo "<pre>";
    echo $jsonData . "<br>";

    $expectedSchema = [
        [
            "name" => "string",
            "age" => "integer",
            "city" => "string"
        ]
    ]; 

    // Decode the JSON data
    $decodedData = json_decode($jsonData, true);

    // Check if the decoded data matches the expected schema
    if ($decodedData !== null && validateSchema($decodedData, $expectedSchema)) {
        echo "JSON data is valid against the expected schema.\n";
    } else {
        echo "JSON data does not match the expected schema.\n";
    }

    // Function to validate the schema
    function validateSchema($data, $schema)
    {
        foreach ($data as $item) {
            foreach ($schema as $expected) {
                foreach ($expected as $key => $type) {
                    if (!array_key_exists($key, $item) || gettype($item[$key]) !== $type) {
                        return false;
                    }
                }
            }
        }
        return true;
    }

    print_r (get_html_translation_table(HTML_ENTITIES));

?>
