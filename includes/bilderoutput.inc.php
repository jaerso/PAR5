<?php

include 'dbh.inc.php';

$bahnnummer = "";

if(isset($_GET['bahn'])){
    $bahnnummer = $_GET['bahn'];

    $data_SQL="SELECT * FROM images WHERE bahnnummer=$bahnnummer"; //Übergabe der ID: auch das klappt, da die Textfelder korrekt angezeigt werden

    $result = mysqli_query($conn, $data_SQL);
    while($data=mysqli_fetch_assoc($result))
    {
    echo "<img src='".$data['bildlink']."' alt='Bild'>";
    }
}
?>