<?php

if(isset($_FILES['image'])) {
	$image = $_FILES['image'];
	$filename = $image['name'];
	$filetype = $image['type'];
	$filetemp = $image['tmp_name'];
	
	if($filetype == 'image/heic') {
		// convert HEIC to JPEG
		$imagick = new \Imagick($filetemp);
		$imagick->setImageFormat('jpeg');
		$filetemp = $imagick->getImageBlob();
		$filetype = 'image/jpeg';
		$filename = pathinfo($filename, PATHINFO_FILENAME) . '.jpg';
	}

	// insert into database
	$servername = "localhost";
	$username = "admin";
	$password = "password";
	$dbname = "names";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("INSERT INTO images (name, content, type) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $filename, $filetemp, $filetype);
	$stmt->execute();
	$stmt->close();

	$conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Upload Form</title>
</head>
<body>
	<h1>Upload an Image</h1>
	<form action="imageform2.php" method="POST" enctype="multipart/form-data">
		<label for="image">Choose an image:</label>
		<input type="file" name="image" id="image">
		<br><br>
		<input type="submit" value="Upload Image">
	</form>
</body>
</html>

