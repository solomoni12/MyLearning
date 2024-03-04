<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Integration Example</title>
</head>
<body>
    <form action="PayPal_entry.php" method="post">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br>

        <label for="price">Price per Unit:</label>
        <input type="number" id="price" name="price" min="0.01" step="0.01" required><br>

        <input type="submit" value="Proceed to PayPal">
    </form>
</body>
</html>
