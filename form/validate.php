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


