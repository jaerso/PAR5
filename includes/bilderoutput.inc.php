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
    //Comment
    //$sqlComment= "SELECT * FROM comments WHERE imgid='".$data['bahnnummer']."'";
  //  $resultComment=mysqli_query($conn,$sqlComment);
   // while($row=mysqli_fetch_assoc($resultComment)){
      $bildid= $data['id'];
        getComments($conn,$bildid);
        echo "<br>";
        //print_r('Ausgabe');
        echo "<br>";
   // }
    
    if(isset($_SESSION['u_id'])){
        echo "<form action='".setComments($conn)."' method='POST'>
        <input type='hidden' name='uid' value='".$_SESSION['u_id']."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <input type='hidden' name='imgid' value='".$data['id']."'>
        <textarea name='message'></textarea><br>
        <button type='submit' name='commentSubmit'>Kommentieren</button>
        </form>";
    } else{
    echo "Du musst eingeloggt sein, um zu kommentieren
    <br><br>";
    }
    }
}
?>