<?php
    $uid=$_SESSION['u_id'];
	$sql = "SELECT * FROM users WHERE user_id='$uid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['user_id'];
			$sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
			$resultImg = mysqli_query($conn, $sqlImg);
			while($rowImg = mysqli_fetch_assoc($resultImg)) {
				
					if ($rowImg['status'] == 0) {
						$filename = "uploads/profile".$id."*";
						$fileinfo=glob($filename);
						$fileext=explode(".",$fileinfo[0]);
						$fileactualext= $fileext[1];
						//Profilausgabe
						$profilepic='uploads/profile'.$id.'.'.$fileactualext.'?'.mt_rand().'';
					} else {
						 $profilepic='uploads/profiledefault.jpg';
					}
                    $username=$row['user_uid'];
                    $firstname=$row['user_first'];
                    $lastname=$row['user_last'];
                    global $username;
                    global $firstname;
                    global $lastname;
                    global $profilepic;
			}
		}
    }

    /*function profile(){

       
        	 
    }
   */
    ?>