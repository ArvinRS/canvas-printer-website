<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
        <meta name="description" content="Contact form for CanvasTN">
				<title>Canvas TN | Contact</title>
				<link rel="stylesheet" href="main.css">  
				
				<link rel="preconnect" href="https://fonts.googleapis.com">
				<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
				<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>	
				<div class="header_">
					<h1>Canvas TN</h1>
				</div>	
				</div>
				<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="fileUpload.php">Photo Upload</a></li>
					<li><a href="shop.html">Shop</a></li>
					<li><a href="gallery.html">Gallery</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contactForm.php">Contact</a></li>
				</ul>
				</nav>
			</header>

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

			<div style="text-align: center;">
			<h1>Phone: (615)-310-9150</h1>
            <h1>Email: arvin0133@yahoo.com</h1>
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
			</div>
			<?php
		}
		?>

		<footer>
        <div class="footer__content">
			<div class="footer__content-canvas">Canvas TN</div>
				<nav class="footer__content-nav">
					<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="fileUpload.php">Photo Upload</a></li>
					<li><a href="shop.html">Shop</a></li>
					<li><a href="gallery.html">Gallery</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contactForm.php">Contact</a></li>
					</ul>
				</nav>
				<div class="footer__content-contact">Phone: (615)-310-9150</div>
				<div class="footer__content-contact">email: arvin0133@yahoo.com</div>			
		</div>
        </footer>
	</body>
</html>

