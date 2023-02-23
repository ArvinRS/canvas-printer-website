<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Canvas TN | File Upload</title>
        <link rel="stylesheet" href="main.css">  
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <script>
            function previewFile() {
                var preview = document.querySelector('#previewImg');

                preview.style.display = "block";
                preview.style.margin = "0 auto 40px";

                var file = document.querySelector('input[type=file]').files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function () {
                    preview.src = reader.result;
                    preview.style.display = "block";
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        </script>
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

			//Get Form Details
			$comments = $_POST['comments'];
			$canvas = $_POST['canvas'];

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
			$sql = "INSERT INTO images (name, content, type, canvas, comments) VALUES ('$imageName', '$imageContent', '$imageType', '$canvas', '$comments')";
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

        <div style="text-align: center; padding: 0 25%; margin-top: 100px;">
    

            <h1>Photo Upload Form</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <label for="image" style="margin-bottom: 20px;">Choose a file to upload:</label>
                <input type="file" name="image" id="image" onchange="previewFile()"><br><br>
                <img src="" alt="File Preview" id="previewImg" style="max-width: 200px; max-height: 200px; display: none;">
                <br>
                <label for="comments">Comments/Special Instructions:</label>
                <br>
                <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
                <br><br>
                <label for="canvas">Canvas Dimensions:</label>
                <br>
                <select id="canvas" name="canvas">
                    <option value="12x18">12x18</option>
                    <option value="16x22" selected>16x22 (Most Popular)</option>
                    <option value="18x25">18x25</option>
                    <option value="20x30">20x30</option>
                    <option value="24x35">24x35</option>
                    <option value="30x40">30x40</option>
                    <option value="34x45">34x45</option>
                </select>
                <br><br>
                <input type="submit" name="submit" value="Upload File">
            </form>
        </div> 

        <footer>
        <div class="footer__content">
			<div class="footer__content-canvas">Canvas Prints</div>
				<nav class="footer__content-nav">
					<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="upload.html">Photo Upload</a></li>
					<li><a href="shop.html">Shop</a></li>
					<li><a href="gallery.html">Gallery</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav>
				<div class="footer__content-contact">Phone: (615)-310-9150</div>
				<div class="footer__content-contact">email: info@tncanvasprints.com</div>
			</div>
        </footer>
    </body>
</html>
