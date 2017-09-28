<?php 
## Einstellungen: 
include 'dbh.inc.php';

$max_size = "300000"; //In Bytes 
$ordner = "uploads"; //In den Ordner wird das Bild geladen 

$save = true; //false wenn der Bildpfad nicht gespeichert werden soll 
$save_typ = "datenbank"; // "datenbank" oder "text" hier eintragen 
$save_name = "images"; /*Name des Textfiles/der MySQL-Tabelle, in 
dem die URL zum Bild gespeichert werden soll. 
Wenn Text gewählt ist, wird die Datei angelegt, wenn sie nicht existiert*/


//$conn = mysqli_connect("localhost","root","","uploadscriptdb"); 
## Zur Datenbank connecten, wenn nötig 
/*if($save_typ == "datenbank") { 
} */

## Bild-Daten werden aus $_FILES "geholt" 
$bild_typ = $_FILES['bild']['type']; 
$bild_groesse = $_FILES['bild']['size']; 
$bild = $_FILES['bild']['tmp_name']; 
$bild_name = $_FILES['bild']['name']; 

//$upper = $_POST['upper']; 
$bahnnummer = $_POST['bahnnummer'];


## Überprüfe, ob alle Kriterien erfüllt 
## Hier kann alles Mögliche ausgetauscht werden 
if(($bild_groesse <= $max_size) && ($bild_typ == "image/gif" || 
$bild_typ == "image/jpg" || $bild_typ == "image/jpeg" || 
$bild_typ == "image/png" || $bild_typ == "image/pjpeg")) { 

/* Hier nichts ändern, wenn man nicht weiss was man tut ^^ */ 

   $dest = "../".$ordner."/".$bild_name; 
   if(move_uploaded_file($bild, $dest)) { 
   chmod($dest, 0755); 

       ## Pfad soll nicht gespeichert werden 
       if(!$save) { 

           echo "Das Bild wurde erfolgreich hochgeladen 
"; 
           echo "Ordner: ".$ordner." 
"; 
           echo "Name: ".$bild_name." 
"; 
           echo "Typ: ".$bild_typ." 
"; 
      } 
      ## Pfad wird gespeichert 
      else { 
          if($save_typ == "datenbank") { 
              mysqli_query($conn ,"INSERT INTO ".$save_name." SET name = '".$bild_name."',type = '".$bild_typ."',bildlink = '".$ordner."/".$bild_name."',bahnnummer = '".$bahnnummer."'"); 
          } 
          else { 
              $sn = $save_name.".txt"; 
              $insert = $dest."|".$upper."\n"; 
              $datei = fopen($sn, "a+"); //zum schreiben und ans ende der Datei 
              $inhalt = fread($datei, filesize($sn)); 
              $inhalt .= $insert; 
              fwrite($datei, $inhalt); 
              fclose($datei); 
          } 
           echo "Das Bild wurde erfolgreich hochgeladen 
"; 
           echo "Ordner: ".$ordner." 
"; 
           echo "Name: ".$bild_name." 
"; 
           echo "Typ: ".$bild_typ." 
"; 
      } 
   } 
} 
else { 
   if($bild_groesse > $max_size) { 
    echo "Das Bild ist zu groß"; 
   } 
   else { 
    echo "Die Datei muss ein Bild sein 
"; 
    echo "Typ: ".$bild_typ; 
   } 
} 