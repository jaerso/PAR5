<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/picture.inc.php';


echo "<div class='profil-container'>";


//Profilausgabe Ende
echo "<h1 style='color: grey;'>Profil</h1>";
echo "<div class='user-container'>";
echo "<img class='zoom' src=$profilepic >";
	if (isset($_SESSION['u_id'])) {
		echo "<form action='includes/upload.inc.php' method='POST' enctype='multipart/form-data'>
		<p>Wähle ein neues Profilbild aus <input type='file' name='file'> </p>
		<button type='submit' name='submit'style='border-radius: 8px; padding:0 4px 0 4px; margin: 0 10px 0 10px;'> 📷 hochladen </button>
		</form>";
		echo "<form action='includes/deleteprofile.inc.php' method='POST'>
		<button type='submit' name='submit' style='border-radius: 8px; padding:0 4px 0 4px; margin: 0 10px 0 10px; '>🗑️ löschen </button>
	</form>";
		}
	
echo "</div>";

	
	
	
		echo "<p style='color: grey; font-weight:bold; margin:1em  0 0 1em;'> Dein Benutzername: ".$username."</p>";
		echo "<p style='color: grey; font-weight:bold; margin:1em  0 0 1em;'> Dein Name: ".$firstname." ". $lastname."</p>";

 echo "</div>";

?>
