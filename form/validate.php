<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <form action="process_form.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="middleName">Middle Name:</label>
        <input type="text" id="middleName" name="middleName"><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="sex">Sex:</label>
        <select id="sex" name="sex" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php

function validateForm($data) {
    $errors = [];

    // Validate First Name
    if (empty($data['firstName'])) {
        $errors[] = 'First Name is required.';
    }

    // Validate Last Name
    if (empty($data['lastName'])) {
        $errors[] = 'Last Name is required.';
    }

    // Validate Email
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid Email address.';
    }

    // Validate Phone Number
    if (empty($data['phone']) || !preg_match("/^\d{10}$/", $data['phone'])) {
        $errors[] = 'Invalid Phone Number (10 digits without spaces or dashes).';
    }

    // Validate Sex
    $validSexOptions = ['male', 'female', 'other'];
    if (empty($data['sex']) || !in_array($data['sex'], $validSexOptions)) {
        $errors[] = 'Invalid Sex selected.';
    }

    // Validate Age
    if (empty($data['age']) || !is_numeric($data['age']) || $data['age'] < 1) {
        $errors[] = 'Invalid Age.';
    }

    // Validate Address
    if (empty($data['address'])) {
        $errors[] = 'Address is required.';
    }

    return $errors;
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    $validationErrors = validateForm($_POST);

    // Display validation errors or proceed with further processing
    if (!empty($validationErrors)) {
        // Display errors
        foreach ($validationErrors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Proceed with further processing (e.g., storing data in a database)
        // You can access the validated data using $_POST['key']
        echo "Form submitted successfully!";
    }
} else {
    // Handle cases where the form is not submitted via POST method
    echo "Form not submitted.";
}
?>

