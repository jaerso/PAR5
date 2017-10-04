<?php

function setComments($conn,$bildid){
if(isset($_POST['commentSubmit'])&& $_POST['commentSubmit']==$bildid){//gegen mehrfache ausgabe
$u_id=$_POST['u_id'];
$date=$_POST['date'];
$message=$_POST['message'];
$imgid=$_POST['imgid'];
$bahn=$_GET['bahn'];
//$bahnnummer=$bildid;
/*$checkID=$_POST['checkID'];

if(empty($checkID)){
    $checkID=md5(microtime());
} else{
 if(preg_match('/^[a-f0-9]{32}$/',$checkID))
 {
 
    $sql="SELECT cid FROM comments WHERE checkID = '$checkID'";
     $result = mysqli_query($conn,$sql);

    $resultCheck= mysqli_num_rows($result);
     
     if($resultCheck == 1)
     {
         print_r("Ihr Kommentar wurde bereits gesendet") ;
     }
     else
     {*/
                $sql = "INSERT INTO comments (u_id, date, message, imgid) VALUES('$u_id', '$date', '$message', '$imgid')";
                $result= mysqli_query($conn,$sql);
                echo" <script language='javascript'
                type='text/javascript'>
                document.location='index.php?page=gallery&bahn=$bahn';
                </script>";
                /*print_r($_POST['commentSubmit']);
            unset($_POST['commentSubmit']);
            print_r($_POST['commentSubmit']);*/
             //header("Location: index.php?page=gallery&bahn=$bahn");
             //header_remove();
          //header("Refresh:0");
       // $_POST['commentSubmit']=$bildid*100;
       //echo "<script>window.location.reload();</script>";

             
         
         /*if(mysqli_affected_rows($conn) == 1) {
             $message = 'Kommentar wurde gesendet!';
         }
         else{
             $message = 'Ihr Kommentar konnte nicht gesendet werden!';}
     }

 }


}*/
}

}

function getComments($conn,$bildid){
    $sql = "SELECT * FROM comments WHERE imgid=$bildid ORDER BY date DESC"; //go into the database
    $result = mysqli_query($conn, $sql);        //run the query
    while($row = mysqli_fetch_assoc($result)){  //spit it out
        $u_id = $row['u_id'];
        $sql2 = "SELECT * FROM users WHERE user_id='$u_id'";
        $result2 = mysqli_query($conn, $sql2);
        if($row2 = mysqli_fetch_assoc($result2)){
                echo "<div class='comment-box'>";
                $profilepic=profilepic($u_id,$conn);
                //$pic='uploads/profiledefault.jpg';
                echo "<div style='width:200px; float:left;'> <div style='font-size:23px; color:black; float:left; '><img id='profileicon' src=$profilepic height='60' width='60' style='border-radius:100%;' >  ";
                echo $row2['user_uid']."</div>";
                echo "<div style='width:100px; font-size:medium; margin-top:6px; color: grey; float: left; line-height:1em;'>". $row['date']."</div> </div> ";
                echo "<p id='message-text'>".nl2br($row['message'])."</p>"; //interpretiert Absätze in sql zu php
               // print_r($row2);
            //echo "</p>";
            if(isset($_SESSION['u_id'])){
                if($_SESSION['u_id']== $row2['user_id']){
                    $bahn= $_GET['bahn'];
                    
                    //echo "$bahn";
                        echo "<form class='delete-form' method='POST' action='".deleteComments($conn,$bahn)."'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <button type='submit' name='commentDelete'>Löschen</button>
                        </form>
                        <form class='edit-form' method='POST' action='includes/editcomment.inc.php'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <input type='hidden' name='u_id' value='".$row['u_id']."'>";
                       // <input type='hidden' name='date' value='".$row['date']."'>
                echo  "<input type='hidden' name='bahn' value='".$bahn."'>
                        <input type='hidden' name='message' value='".$row['message']."'>
                        <button>Bearbeiten</button>
                    
                        </form>";
                } /*else{
                    echo "<form class='edit-form' method='POST' action='replycomment.php'>
                    <input type='hidden' name='cid' value='".$row['cid']."'>
                    <input type='hidden' name='uid' value='".$row['uid']."'>
                    <input type='hidden' name='date' value='".$row['date']."'>
                    <input type='hidden' name='message' value='".$row['message']."'>
                    <button>Antworten</button>
                    </form>";
                }*/
            }/*else{
            echo "<p class='commentmessage'>Du musst eingeloggt sein um zu antworten</p>";  
            }*/
            echo "</div>";
        }
       
    }
  
}


function editComments($conn){
    if(isset($_POST['commentSubmit'])){
    $cid=$_POST['cid'];
    $u_id=$_POST['u_id'];
    $date=$_POST['date'];
    $message=$_POST['message'];
    $bahn=$_POST['bahn'];
    
    $sql = "UPDATE comments SET message='$message',date='$date' WHERE cid='$cid'";
    $result = mysqli_query($conn,$sql);
    echo" <script language='javascript'
    type='text/javascript'>
    document.location='../index.php?page=gallery&bahn=$bahn';
    </script>";
    
    }
    }


    /*function replyComments($conn){
        if(isset($_POST['commentReply'])){
        $cid=$_POST['cid'];
        $uid=$_POST['uid'];
        $date=$_POST['date'];
        $message=$_POST['message'];
        
        $sql = "INSERT INTO comments (uid, date, message) VALUES('$uid', '$date', '$message')";
        $result = mysqli_query($conn,$sql);
        header("Location: index.php");
        }
        }*/

    function deleteComments($conn,$bahn){
        if(isset($_POST['commentDelete'])){
            $cid=$_POST['cid'];
            
            $sql = "DELETE FROM comments WHERE cid='$cid'";
            $result = mysqli_query($conn,$sql);
            echo" <script language='javascript'
            type='text/javascript'>
            document.location='index.php?page=gallery&bahn=$bahn';
            </script>";
            }
    }

    /*function getLogin($conn){
        if(isset($_POST['loginSubmit'])){
        $uid = mysqli_real_escape_string($conn, $_POST['uid']); 
        $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);//run this data not as SQL code


        //start prepared statements
            $stmt = $conn->prepare("SELECT * FROM user WHERE uid=? AND pwd=?");
            $stmt->bind_param("ss", $username, $password);

            $username=$uid;
            $password=$pwd;
            $stmt->execute();

            $result = $stmt->get_result();
            $rowNum = $result->num_rows;

         //end prepared statements

            //möglicher Hackerangriff
            $sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='' or '1'= '1'";
           
            if($rowNum > 0){
                if ($row = mysqli_fetch_assoc($result)){
                    $_SESSION['id'] =$row['id'];
                    $_SESSION['username'] = $row['uid'];
                    header("Location: index.php?loginsuccess");
                    exit();
                    }
                } else{
                    header("Location: index.php?loginfailed");
                    exit();
                }
        
            }   
        }
        */