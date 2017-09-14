<?php
include_once 'includes/dbh.inc.php';


echo "<div class='profil-container'>";

echo "<h1>Dein Profil</h1>";
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['user_id'];
			$sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
			$resultImg = mysqli_query($conn, $sqlImg);
			while($rowImg = mysqli_fetch_assoc($resultImg)) {
				echo "<div class='user-container'>";
					if ($rowImg['status'] == 0) {
						$filename = "uploads/profile".$id."*";
						$fileinfo=glob($filename);
						$fileext=explode(".",$fileinfo[0]);
						$fileactualext= $fileext[1];
						//Profilausgabe
						echo "<img src='uploads/profile".$id.".".$fileactualext."?".mt_rand()."'>";
					} else {
						echo "<img src='uploads/profiledefault.jpg'>";
					}
				
					
					if (isset($_SESSION['u_id'])) {
						echo "<form action='includes/upload.inc.php' method='POST' enctype='multipart/form-data'>
							<input type='file' name='file'>
							<button type='submit' name='submit'>Hochladen</button>
						</form>";
						echo "<form action='includes/deleteprofile.inc.php' method='POST'>
						<button type='submit' name='submit'>Profilbild löschen</button>
					</form>";
					} 
					
					function profilIcon(){
						$username= $_SESSION['u_uid'];
					   /* $id=$_SESSION['u_id'];
						echo "<img src='uploads/profile".$id.".".$fileactualext."?".mt_rand()."'>";*/
						echo "Hallo <a href='index.php?page=profile'>$username</a>";
					   
					}	



				echo "</div>";



					echo "<p> Dein Benutzername: ".$row['user_uid']."</p>";
					echo "<p> Dein Vor- und Nachname: ".$row['user_first'] ." ". $row['user_last']."</p>";
					



				echo "</div>";
				//Profilausgabe Ende
			}
		}
	}


?>
