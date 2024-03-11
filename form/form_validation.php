<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }

        .card {
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 200px;
            margin-right: 200px;
        }

        .card-form {
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 200px;
            margin-right: 200px;
        }

        .card-output {
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 200px;
            margin-right: 200px;
        }

        .title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: large;
            text-align: center;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $email = test_input($email);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="card">
    <form class="card-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <h2 class="title">PHP Form Validation Example</h2>
        <div class="form-group">
            <label for="Name">Name<span class="error">*</span></label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
            <span class="error"> <?php echo $nameErr; ?></span>
        </div>
        <div class="form-group">
            <label for="E-mail">E-mail<span class="error">*</span></label>
            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
            <span class="error"> <?php echo $emailErr; ?></span>
        </div>
        <div class="form-group">
            <label for="Gender">Gender<span class="error">*</span></label>
            <select name="gender" id="gender" class="form-control">
                <option value="male" <?php if ($gender === "male") echo "selected"; ?>>male</option>
                <option value="female" <?php if ($gender === "female") echo "selected"; ?>>female</option>
                <option value="other" <?php if ($gender === "other") echo "selected"; ?>>other</option>
            </select>
            <span class="error"><?php echo $genderErr; ?></span>
        </div>
        <div class="form-group">
            <label for=" Website"> Website: </label>
            <input type="text" name="website" class="form-control" value="<?php echo $website; ?>">
            <span class="error"><?php echo $websiteErr; ?></span>
        </div>
        <div class="form-group">
            <label for="Comment">Comment:</label>
            <textarea name="comment" rows="5" cols="40" class="form-control"><?php echo $comment; ?></textarea>
            <br><br>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">

    </form>

    <div class="card-output">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            echo "<h2 class='title'>Your Input:</h2>";
            echo "<table class='table table-bordered'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>S/N</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Gender</th>";
            echo "<th>Website</th>";
            echo "<th>Comment</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td>1</td>";
            echo "<td>" . htmlspecialchars($name) . "</td>";
            echo "<td>" . htmlspecialchars($email) . "</td>";
            echo "<td>" . htmlspecialchars($gender) . "</td>";
            echo "<td>" . htmlspecialchars($website) . "</td>";
            echo "<td>" . htmlspecialchars($comment) . "</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
        }
        ?>

    </div>
</div>
</body>
</html>
