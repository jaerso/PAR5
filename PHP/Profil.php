<?php
include_once 'includes/dbh.inc.php';
include_once 'includes/picture.inc.php';
?>
<div class='profilansicht'>

<div class='hintergrund-bild'>

<h1 style='font-family: Raleway; font-weight:bold; color:black; padding: 50px 0 0 400px; margin:0em;'> Dein Profil </h1>

<div class='user-container'>

<?php
$pic=$_SESSION['pic'];
$username=$_SESSION['u_uid'];
$firstname=$_SESSION['u_first'];
$lastname=$_SESSION['u_last'];
echo"<div class='img-responsive'> <img class='zoom'  src= $pic></div>";
echo"<p style='color: black; font-weight:bold; margin:3em  0 0 11em; padding: 0 2.5em 0 2.5em;'> Dein Benutzername: ".$username."</p>";
echo"<p style='color: black; font-weight:bold; margin:1em  0 0 11em; padding: 0 2.5em 0 2.5em;'> Dein Name: ".$firstname." ". $lastname."</p>";
?>

<?php
	if (isset($_SESSION['u_id'])) {
		echo "<form action='includes/upload.inc.php' method='POST' enctype='multipart/form-data' style='margin: 120px 0 0 0;'>
		
		<p style='font-family:Raleway; margin:0px;'>Wähle ein neues Profilbild aus <input type='file' name='file'> </p>
		<button type='submit' name='submit'style='border-radius: 8px; padding:0 4px 0 4px; margin: 17px 0 0 0;'> 📷 hochladen </button>
		</form>";

		echo "<form action='includes/deleteprofile.inc.php' method='POST'>
		<button type='submit' name='submit' style='border-radius: 8px; padding:0 4px 0 4px; margin: 3px 0 0 0; '>🗑️ löschen </button>
	</form>";

	
		}

		?>
	
</div>
	
 </div>


