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
     echo "<div class='col-lg-12'>"; 
      $sql2 = "SELECT * FROM users WHERE user_id='".$data['u_id']."'";
      $result2 = mysqli_query($conn, $sql2);
      if($row2 = mysqli_fetch_assoc($result2)){
      if(isset($_SESSION['u_id'])){
        if($_SESSION['u_id']== $row2['user_id']){
          echo "<form action='".deletePic($conn,$bahnnummer)."' method='POST'>
          <input type='hidden' name='id' value='".$data['id']."'>
          <button class='deletePicButton' type='submit' name='picDeleteSubmit' >Löschen</button>
          </form><br>";
        }
      }
    }
    echo "<img id='schlag-border' src='".$data['bildlink']."' alt='Bild'>"; //bildausgabe
    //Comment
      $bildid= $data['id'];
        getComments($conn,$bildid);
        echo "<br>";
        //print_r('Ausgabe');
   // }
   
    //comments($conn,$bildid,$data);
    if(isset($_SESSION['u_id'])){
      echo "<form style='margin-left:0.7em; action='".setComments($conn,$bildid)."' method='POST'>
      <input type='hidden' name='u_id' value='".$_SESSION['u_id']."'>
      <input type='hidden' name='u_uid' value='".$_SESSION['u_uid']."'>
      <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
      <input type='hidden' name='imgid' value='".$data['id']."'>";
     // <input type='hidden' name='checkID' value='". $checkID. "'>
      echo "<textarea class='textareaStyle' name='message'></textarea><br>
      <button class='kommiButton' type='submit' name='commentSubmit' value='".$data['id']."'>Kommentieren</button>
      </form>
      <br>";
     
  } else{
  echo "<p style='float: left; margin-left: 28px; font-size:15px;'>Du musst eingeloggt sein, um zu kommentieren</p>
  <br><br>";
  }
  echo "</div>";
  //  header("Location: ../index.php?page=gallery&bahn=$bahnnummer");
  //unset($_POST);
    }  



    
}

function deletePic($conn,$bahn){
  if(isset($_POST['picDeleteSubmit'])){
    $id=$_POST['id'];
  $sql = "DELETE FROM images WHERE id='$id'";
  $result = mysqli_query($conn,$sql);
  $sql2="DELETE FROM comments WHERE imgid='$id'";
  $result2 =mysqli_query($conn,$sql2);
  echo" <script language='javascript'
  type='text/javascript'>
  document.location='index.php?page=gallery&bahn=$bahn';
  </script>";
  }
}

?>