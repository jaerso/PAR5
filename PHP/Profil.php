<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/picture.inc.php';

//Profilausgabe Ende
echo "<h1>Profil</h1>";
echo "<div class='user-container'>";
echo "<img src=$profilepic>";
echo "<p>".$username."</p>";
echo "<p>".$firstname." ". $lastname."</p>";
echo "</div>";

		if (isset($_SESSION['u_id'])) {
		echo "<form action='includes/upload.inc.php' method='POST' enctype='multipart/form-data'>
			<input type='file' name='file'>
			<button type='submit' name='submit'>UPLOAD</button>
		</form>";
		echo "<form action='includes/deleteprofile.inc.php' method='POST'>
		<button type='submit' name='submit'>Delete profile image</button>
	</form>";
		}

?>
