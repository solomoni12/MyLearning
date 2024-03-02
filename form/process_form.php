<?php

    function validateForm($data) {
        $errors = [];

        // Validate First Name
        $firstName = trim($data['firstName']);
        if (empty($firstName)) {
            $errors[] = 'First Name is required.';
        }

        // Validate Last Name
        $lastName = trim($data['lastName']);
        if (empty($lastName)) {
            $errors[] = 'Last Name is required.';
        }

        // Validate Email
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (empty($email)) {
            $errors[] = 'Invalid Email address.';
        }

        // Validate Phone Number
        $phone = trim($data['phone']);
        if (empty($phone) || !preg_match("/^\d{10}$/", $phone)) {
            $errors[] = 'Invalid Phone Number (10 digits without spaces or dashes).';
        }

        // Validate Sex
        $validSexOptions = ['male', 'female', 'other'];
        $sex = trim($data['sex']);
        if (empty($sex) || !in_array($sex, $validSexOptions)) {
            $errors[] = 'Invalid Sex selected.';
        }

        // Validate Age
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
        if (empty($age) || $age < 1) {
            $errors[] = 'Invalid Age.';
        }

        // Validate Address
        $address = trim($data['address']);
        if (empty($address)) {
            $errors[] = 'Address is required.';
        }

        return $errors;
    }

    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Sanitize and validate form data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $validationErrors = validateForm($_POST);

        if (!empty($validationErrors)) {
            foreach ($validationErrors as $error) {
                echo htmlspecialchars($error) . "<br>";
            }
        } else {
            // Echo submitted data
            echo "<strong>Submitted Data:</strong><br>";
            echo "First Name: " . htmlspecialchars($_POST['firstName']) . "<br>";
            echo "Last Name: " . htmlspecialchars($_POST['lastName']) . "<br>";
            echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
            echo "Phone: " . htmlspecialchars($_POST['phone']) . "<br>";
            echo "Sex: " . htmlspecialchars($_POST['sex']) . "<br>";
            echo "Age: " . htmlspecialchars($_POST['age']) . "<br>";
            echo "Address: " . htmlspecialchars($_POST['address']) . "<br>";
        }
    } else {
        echo "Form not submitted.";
    }
?>
