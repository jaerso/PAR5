<?php

include 'dbh.inc.php';

$bahn = $_POST['bahn'];
    $upload_dir = "images/gallery/Schlagempfehlungen/Bahn".$bahn."/";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$save_name = 'images';
$bild_name = mktime() . ".png";
$file = $upload_dir . $bild_name ;
$success = file_put_contents($file, $data);
mysqli_query($conn ,"INSERT INTO ".$save_name." SET name = '".$bild_name."',type = 'image/png' ,bildlink = '".$upload_dir."/".$bild_name."',bahnnummer = '".$bahn."'"); 
print $success ? $file : 'Unable to save the file.';
?>