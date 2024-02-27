<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test form</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-control">
            <label for="name">FName</label>
            <input type="text" name="fname">
            <label for="lname">lName</label>
            <input type="text" name="lname">
            <label for="username">Username</label>
            <input type="text" name="username">

            <input type="submit" value="send" name="send">

        </div>
    </form>
</body>
</html>

<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['username'])) {
        echo "Name is required";
    }
    else {
        $fname = test_input($_POST["fname"]);
        $lname = test_input($_POST["lname"]);
        $username = test_input($_POST["username"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname) || !preg_match("/^[a-zA-Z-' ]*$/", $lname)
             || !preg_match("/^[a-zA-Z-' ]*$/", $username)) {
            echo "Only letters and white space allowed";
        } else {
            // Valid names, you can use $fname, $lname, $username as needed
            echo "First Name: " . $fname . "<br>";
            echo "Middle Name: " . $lname . "<br>";
            echo "UserName: " . $username . "<br>";
        }
    }
}
