<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		header("Location: ../index.php?page=registration&signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../index.php?page=registration&signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //checkt ob valide email
				header("Location: ../index.php?page=registration&signup=email");
				exit();										//beendet Skript
			} else {
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);		//prüft ob vorhanden

				if ($resultCheck > 0) {
					header("Location: ../index.php?page=registration&signup=usertaken");
					exit();
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //bcrypt Algorithmus
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);

					$sql = "SELECT * FROM users WHERE user_uid='$uid' AND user_first='$first'";
					$result = mysqli_query($conn, $sql);
					
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							$userid = $row['user_id'];
							$sql = "INSERT INTO profileimg (userid, status)
							VALUES ('$userid', 1)";
							mysqli_query($conn, $sql);
							header("Location: ../index.php");
						}
					} else {
						echo "You have an error!";
					}
					header("Location: ../index.php?signup=success");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ../index.php?page=registration");
	exit();
}

