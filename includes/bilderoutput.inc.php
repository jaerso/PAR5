<?php
include 'dbh.inc.php';
$bahnnummer = "";

if(isset($_GET['bahn'])){
    $bahnnummer = $_GET['bahn'];

    $data_SQL="SELECT * FROM images WHERE bahnnummer=$bahnnummer"; //Übergabe der ID: auch das klappt, da die Textfelder korrekt angezeigt werden
    $checkID='';
    $result = mysqli_query($conn, $data_SQL);
    while($data=mysqli_fetch_assoc($result))
    {
    echo "<img id='schlag-border' src='".$data['bildlink']."' alt='Bild'>";
    //Comment
    //$sqlComment= "SELECT * FROM comments WHERE imgid='".$data['bahnnummer']."'";
  //  $resultComment=mysqli_query($conn,$sqlComment);
   // while($row=mysqli_fetch_assoc($resultComment)){
      $bildid= $data['id'];
        getComments($conn,$bildid);
        echo "<br>";
        //print_r('Ausgabe');
   // }
   
    
    if(isset($_SESSION['u_id'])){
        echo "<form style='margin-left:0.7em;
        'action='".setComments($conn)."' method='POST'>
        <input type='hidden' name='uid' value='".$_SESSION['u_id']."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <input type='hidden' name='imgid' value='".$data['id']."'>
        <input type='hidden' name='checkID' value='". $checkID. "'>
        <textarea class='textareaStyle' name='message'></textarea><br>
        <button class='kommiButton' type='submit' name='commentSubmit'>Kommentieren</button>
        </form>
        <br>";
       
    } else{
    echo "Du musst eingeloggt sein, um zu kommentieren
    <br><br>";
    }
  //  header("Location: ../index.php?page=gallery&bahn=$bahnnummer");
  //unset($_POST);
    }  



    
}
echo "<a style='font-family:Raleway; font-weight:bold;' href='#top'>zurück an den Seitenanfang</a>";
?>
