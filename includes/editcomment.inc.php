<?php
date_default_timezone_set('Europe/Berlin');
include 'dbh.inc.php';
include 'comments.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bearbeiten</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  

<?php
$cid=$_POST['cid'];
$u_id=$_POST['u_id'];
//$date=$_POST['date'];
$message=$_POST['message'];
$bahn=$_POST['bahn'];

 echo "<form action='".editComments($conn,$bahn)."' method='POST'>
    <input type='hidden' name='cid' value='".$cid."'>
    <input type='hidden' name='u_id' value='".$u_id."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea class='textareaStyle'name='message'>".$message."</textarea><br>
    <input type='hidden' name='bahn' value='".$bahn."'>
    <button class='BearbeitenButton' type='submit' name='commentSubmit'>Bearbeiten</button>
    </form>";
?>
</body>
</html>