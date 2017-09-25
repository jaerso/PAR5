<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/picture.inc.php';

echo "<div class='profilansicht'>";

echo " <div class='hintergrund-bild'>

<h1 style='font-family: Raleway; font-weight:bold; color:black; padding: 60px 0 0 400px;'> Dein Profil </h1>


<div class='user-container'>";


echo "<div class='img-responsive'> <img class='zoom' src=$profilepic> </div>";
echo "<p style='color: black; font-weight:bold; margin:3em  0 0 11em; padding: 0 2.5em 0 2.5em;'> Dein Benutzername: ".$username."</p>";
echo "<p style='color: black; font-weight:bold; margin:1em  0 0 11em; padding: 0 2.5em 0 2.5em;'> Dein Name: ".$firstname." ". $lastname."</p>";



	if (isset($_SESSION['u_id'])) {
		echo "<form action='includes/upload.inc.php' method='POST' enctype='multipart/form-data' style='margin: 120px 0 0 0;'>
		
		<p style='font-family:Raleway; margin:0px;'>Wähle ein neues Profilbild aus <input type='file' name='file'> </p>
		<button type='submit' name='submit'style='border-radius: 8px; padding:0 4px 0 4px; margin: 17px 0 0 0;'> 📷 hochladen </button>
		</form>";

		echo "<form action='includes/deleteprofile.inc.php' method='POST'>
		<button type='submit' name='submit' style='border-radius: 8px; padding:0 4px 0 4px; margin: 3px 0 0 0; '>🗑️ löschen </button>
	</form>";

	
		}






	
echo "</div>";










//Profilausgabe Ende





	
 echo "</div>";

?>
