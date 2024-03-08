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

        $fname = sanitizeInput($_POST['fname']);
        $lname = sanitizeInput($_POST['lname']);

        // take as one name
        $name = $fname . " " . $lname;
        
        // sanitize email 
        $emil = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $email = sanitizeInput($emil);
        $phone = sanitizeInput($_POST['phone']);

        $message = sanitizeInput($_POST['message']);

        if (empty($fname) || empty($lname)) {
          $errors[] = 'Name is empty';
        } else if (!ctype_alpha($fname) || !ctype_alpha($lname)) {
            $errors[] = 'Name should only contain alphabetic characters';
        }

        if (empty($email)) {
            $errors[] = 'Email is empty';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email is invalid';
        }

        if (empty($phone)) {
          $errors[] = 'Phone number is empty';
        } else if (substr($phone, 0, 1) !== '0' || !ctype_digit($phone)) {
            $errors[] = 'Phone number is invalid';
        }

        if (empty($message)) {
            $errors[] = 'Message is empty';
        }

        if (!empty($errors)) {
            $allErrors = join('<br/>', $errors);
            $errorMessage = "<div class='alert alert-danger'>{$allErrors}</div>";
        } else {
            $toEmail = $email;
            $emailSubject = $fname ." ". $lname ;

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

       <div class="row">
          <div class="form-group col-6">
            <label>First Name:</label>
            <input type="text" name="fname" class="form-control" required>
          </div>
          <div class="form-group col-6">
            <label>Last Name:</label>
            <input type="text" name="lname" class="form-control" required>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-6">
            <label>Email Address:</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group col-6">
            <label for="phone number"> Phone Number</label>
            <input type="text" name="phone" min="10" max="10" class="form-control" required>
          </div>
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
