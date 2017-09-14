<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/picture.inc.php';


echo "<div class='profil-container'>";


//Profilausgabe Ende
echo "<h1>Profil</h1>";
echo "<div class='user-container'>";
echo "<img src=$profilepic>";
	if (isset($_SESSION['u_id'])) {
		echo "<form action='includes/upload.inc.php' method='POST' enctype='multipart/form-data'>
			<input type='file' name='file'>
			<button type='submit' name='submit'>hochladen</button>
		</form>";
		echo "<form action='includes/deleteprofile.inc.php' method='POST'>
		<button type='submit' name='submit'>Lösche dein Profilbild</button>
	</form>";
		}
	
echo "</div>";

	
	
	
		echo "<p> Dein Benutzername: ".$username."</p>";
		echo "<p> Dein Vor- und Nachname".$firstname." ". $lastname."</p>";

 echo "</div>";

?>
