<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/picture.inc.php';


echo "<div class='profil-container'> <div class='hintergrund-bild'> <h1 style='font-family: Raleway; font-weight:bold; color:black; padding: 60px 0 300px 350px;'> Dein Profil </h1> </div>
<div class='user-container'>";


//Profilausgabe Ende



echo "<div class='img-responsive'> <img class='zoom' src=$profilepic> </div>";
	if (isset($_SESSION['u_id'])) {
		echo "<form action='includes/upload.inc.php' method='POST' enctype='multipart/form-data' style='margin-left:230px;'>
		<p>Wähle ein neues Profilbild aus <input type='file' name='file'> </p>
		<button type='submit' name='submit'style='border-radius: 8px; padding:0 4px 0 4px; margin: 0 230px 0 0;'> 📷 hochladen </button>
		</form>";
		echo "<form action='includes/deleteprofile.inc.php' method='POST'>
		<button type='submit' name='submit' style='border-radius: 8px; padding:0 4px 0 4px; margin: 0 230px 0 230px; '>🗑️ löschen </button>
	</form>";
		}
	
echo "</div>";

	
	
	
		echo "<p style='color: grey; font-weight:bold; margin:1em  0 0 1em; padding: 0 2.5em 0 2.5em;'> Dein Benutzername: ".$username."</p>";
		echo "<p style='color: grey; font-weight:bold; margin:1em  0 0 1em; padding: 0 2.5em 0 2.5em;'> Dein Name: ".$firstname." ". $lastname."</p>";

 echo "</div>";

?>
