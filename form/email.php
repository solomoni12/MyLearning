<?php
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
        
        // sanitize email 
        $emil = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $email = sanitizeInput($emil);
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
            $errorMessage = "<div class='alert alert-danger'>{$allErrors}</div>";
        } else {
            $toEmail = $email;
            $emailSubject = $name;

            // Create a new PHPMailer instance
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

                $mail->send();

                $successMessage = "<div class='alert alert-success'>Thank you for contacting us! Your message has been successfully received. We appreciate your inquiry and will get back to you as soon as possible. If your matter is urgent, please call us at 0789026656.</div>";

            } catch (Exception $e) {
                $errorMessage = "<div class='alert alert-danger'>Oops, something went wrong. Please try again later</div>";
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
      <style>
        .card{
          margin-top: 50px;
          margin-bottom: 50px;
          margin-left: 150px;
          margin-right: 150px;
        }
        .card-form{
          margin-top: 50px;
          margin-bottom: 50px;
          margin-left: 150px;
          margin-right: 150px;
        }
        .text-title{
          text-align: center;
          color:gray;
        }
      </style>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  </head>
  <body>
    <div class="card">
      <form class="card-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <h2 class="text-title">Contact us</h2>
        <?php echo $errorMessage; ?>
        <?php echo $successMessage; ?>

        <div class="form-group">
          <label>Full Name:</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Email Address:</label>
          <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Message:</label>
          <textarea type="text" name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>
</html>
