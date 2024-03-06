<?php
  session_start();
  $token = bin2hex(random_bytes(32));
  $_SESSION['csrf_token'] = $token;
?>

<!DOCTYPE html>
<html>
  <body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png">
      <input type="submit" value="Upload Image" name="submit">
      <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
    </form>

  </body>
</html>