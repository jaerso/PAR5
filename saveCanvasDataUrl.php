<?php

include_once 'includes/dbh.inc.php';
include_once 'PHP/Head.php';

$u_id=$_SESSION['u_id'];
$bahn = $_POST['bahn'];
$upload_dir = "images/gallery/Schlagempfehlungen/Bahn".$bahn."/";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$save_name = "images";
$bild_name = mktime() . ".png";
$file = $upload_dir . $bild_name ;
$success = file_put_contents($file, $data);
$database = "true";
if ($database == "true")
{
mysqli_query($conn ,"INSERT INTO ".$save_name." SET u_id ='".$u_id."',name = '".$bild_name."',type = 'image/png' ,bildlink = '".$file."',bahnnummer = '".$bahn."'"); 
}
print $success ? $file : 'Unable to save the file.';
?>