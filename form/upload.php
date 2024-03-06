<?php
    session_start();

    // Regenerate CSRF token only if it doesn't exist
    if (!isset($_SESSION['csrf_token'])) {
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
    }

    $target_dir = "uploads/";
    $originalFileName = $_FILES["fileToUpload"]["name"];
    $lowercaseOriginalFileName = strtolower($originalFileName);
    $sanitizedFileName = preg_replace("/[^a-zA-Z0-9.]/", "_", $lowercaseOriginalFileName);
    $lowercaseSanitizedFileName = strtolower($sanitizedFileName);

    $target_file = $target_dir . basename($sanitizedFileName);

    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        header("Location: file.php");
        exit; 
    }

    if ($_FILES["fileToUpload"]["size"] > 100000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFileTypes)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo "CSRF token validation failed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            header("Location: file.php");
            exit; 
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>
