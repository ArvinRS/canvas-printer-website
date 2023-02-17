<!DOCTYPE html>
<html>
<head>
	<title>Upload Image</title>
</head>
<body>
	<h1>Upload Image</h1>
	<?php
		// Check if the form is submitted
		if(isset($_POST['submit'])) {
			// Database connection variables
			$servername = "localhost";
			$username = "admin";
			$password = "password";
			$dbname = "names";

			// Create a database connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check for errors
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// Get the image details
			$imageName = $_FILES['image']['name'];
			$imageTmpName = $_FILES['image']['tmp_name'];
			$imageSize = $_FILES['image']['size'];
			$imageType = $_FILES['image']['type'];

			// Open the image file
			$image = fopen($imageTmpName, 'r');
			$imageContent = fread($image, $imageSize);
			$imageContent = mysqli_real_escape_string($conn, $imageContent);

			// Insert the image into the database
			$sql = "INSERT INTO images (name, content, type) VALUES ('$imageName', '$imageContent', '$imageType')";
			if ($conn->query($sql) === TRUE) {
				echo "Image uploaded successfully! We will review your photo before printing";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			// Close the image file
			fclose($image);

			// Close the database connection
			$conn->close();
		}
	?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
		<label for="image">Select Image:</label>
		<input type="file" name="image" id="image">
		<br>
		<input type="submit" name="submit" value="Upload">
	</form>
</body>
</html>

