<?php
include 'dbh.inc.php';
$bahnnummer = "";

if(isset($_GET['bahn'])){
    $bahnnummer = $_GET['bahn'];

    $data_SQL="SELECT * FROM images WHERE bahnnummer=$bahnnummer"; //Übergabe der ID: auch das klappt, da die Textfelder korrekt angezeigt werden
   // $checkID=NULL;
    $result = mysqli_query($conn, $data_SQL);
    while($data=mysqli_fetch_assoc($result))
    {
    echo "<img src='".$data['bildlink']."' alt='Bild'>";
    //Comment
      $bildid= $data['id'];
        getComments($conn,$bildid);
        echo "<br>";
        //print_r('Ausgabe');
   // }
   
    //comments($conn,$bildid,$data);
    if(isset($_SESSION['u_id'])){
      echo "<form action='".setComments($conn,$bildid)."' method='POST'>
      <input type='hidden' name='u_id' value='".$_SESSION['u_id']."'>
      <input type='hidden' name='u_uid' value='".$_SESSION['u_uid']."'>
      <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
      <input type='hidden' name='imgid' value='".$data['id']."'>";
     // <input type='hidden' name='checkID' value='". $checkID. "'>
      echo "<textarea name='message'></textarea><br>
      <button type='submit' name='commentSubmit' value='".$data['id']."'>Kommentieren</button>
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



/*function comments($conn,$bildid,$data){
  
}*/
?>