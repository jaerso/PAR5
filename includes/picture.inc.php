<?php

/* funktioniert function profilepic($row,$rowImg){
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
	$_SESSION['pic']= $profilepic;
   
		 
}*/
function profilepic($u_id,$conn){
$sql = "SELECT * FROM profileimg WHERE userid='$u_id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
	
	if ($row['status'] == 0) {
		$filename = "uploads/profile".$u_id."*";
		$fileinfo=glob($filename);
		$fileext=explode(".",$fileinfo[0]);
		$fileactualext= $fileext[1];
		//Profilausgabe
		$profilepic='uploads/profile'.$u_id.'.'.$fileactualext.'?'.mt_rand().'';
	} else {
		 $profilepic='uploads/profiledefault.jpg';
	}
	//$username=$row['user_uid'];
	//$firstname=$row['user_first'];
	//$lastname=$row['user_last'];
	$_SESSION['pic']= $profilepic;
	//profilepic($row,$rowImg);
}
return $profilepic;
}


if(isset($_SESSION['u_id'])){
    $uid=$_SESSION['u_id'];
	$sql = "SELECT * FROM users WHERE user_id='$uid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$u_id = $row['user_id'];
			profilepic($u_id,$conn);
		}
    }
}
    ?>