<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Connect to the database
    $host = 'localhost';
    $username = 'admin';
    $password = 'password';
    $database = 'names';

    $conn = new mysqli($host, $username, $password, $database);

    // Check for errors in the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the form data into the database
    $sql = "INSERT INTO names (first_name, last_name) VALUES ('$first_name', '$last_name')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Form Data to MySQL Database</title>
</head>
<body>
    <h1>Submit Form Data to MySQL Database</h1>
    <form method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name">
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
