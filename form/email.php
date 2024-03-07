<?php

// require 'C:\xampp\htdocs\MyLearning\PHPMailer\src/Exception.php';
// require 'C:\xampp\htdocs\MyLearning\PHPMailer\src/PHPMailer.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\MyLearning\form\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\MyLearning\form\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\MyLearning\form\PHPMailer\src\SMTP.php';




$errors = [];
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $message = sanitizeInput($_POST['message']);

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }

    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $toEmail = 'mailtrap.club@gmail.com';
        $emailSubject = 'New email from your contact form';

        // Create a new PHPMailer instance
        // $mail = new PHPMailer(true);
        $mail = new PHPMailer(true);

        try {
            // Configure the PHPMailer instance
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'e077253dcde2d0';
            $mail->Password = 'a8f3406b7e305a';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Set the sender, recipient, subject, and body of the message
            $mail->setFrom($email);
            $mail->addAddress($toEmail);
            $mail->Subject = $emailSubject;
            $mail->isHTML(true);
            $mail->Body = "<p>Name: {$name}</p><p>Email: {$email}</p><p>Message: {$message}</p>";

            // echo "<pre>";
            // print_r($mail);
            // exit();
            // Send the message
            $mail->send();
            // echo "<pre>";
            // print_r($mail);
            // exit();

            $successMessage = "<p style='color: green;'>Thank you for contacting us :)</p>";
        } catch (Exception $e) {
            $errorMessage = "<p style='color: red;'>Oops, something went wrong. Please try again later</p>";
        }
    }
}

function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    return $input;
}

?>

<html>

<head>
    <!-- You can include your head content here -->
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <h2>Contact us</h2>
        <?php echo ((!empty($errorMessage)) ? $errorMessage : '') ?>
        <?php echo ((!empty($successMessage)) ? $successMessage : '') ?>

        <div>
            <label>First Name:</label>
            <input name="name" type="text" required />
        </div>

        <div>
            <label>Email Address:</label>
            <input style="cursor: pointer;" name="email" type="email" required />
        </div>
        <p>
            <label>Message:</label>
            <textarea name="message" required></textarea>
        </p>
        <p>
            <button type="submit">Submit</button>
        </p>
    </form>
</body>

</html>
