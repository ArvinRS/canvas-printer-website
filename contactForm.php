<!DOCTYPE html>
<html>
<head>
	<title>Submit Form to MariaDB Database Table</title>
</head>
<body>
	<h1>Submit Form to MariaDB Database Table</h1>
	<h2>Phone: (615)-310-9158</h2>
	<h2>E-mail: info@canvastn.com</h2>

	<?php
	// Check if the form has been submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// Connect to the MariaDB database
		$host = "localhost";
		$username = "admin";
		$password = "password";
		$dbname = "names";
		$conn = mysqli_connect($host, $username, $password, $dbname);

		// Check if the connection was successful
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Get the form data from the $_POST superglobal
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$phone_number = $_POST['phone_number'];
		$comment = $_POST['comment'];

		// Insert the form data into the database table
		$sql = "INSERT INTO contact_data (first_name, last_name, phone_number, comment)
				VALUES ('$first_name', '$last_name', '$phone_number', '$comment')";

		if (mysqli_query($conn, $sql)) {
			echo "Form data inserted successfully.";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		// Close the database connection
		mysqli_close($conn);
	} else {
		// Display the form
		?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<label for="first_name">First Name:</label>
			<input type="text" id="first_name" name="first_name"><br><br>
			<label for="last_name">Last Name:</label>
			<input type="text" id="last_name" name="last_name"><br><br>
			<label for="phone_number">Phone Number:</label>
			<input type="tel" id="phone_number" name="phone_number"><br><br>
			<label for="comment">Comment:</label>
			<textarea id="comment" name="comment"></textarea><br><br>
			<input type="submit" value="Submit">
		</form>
		<?php
	}
	?>
</body>
</html>

