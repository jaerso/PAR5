<?php

function setComments($conn){
if(isset($_POST['commentSubmit'])){
$uid=$_POST['uid'];
$date=$_POST['date'];
$message=$_POST['message'];
$imgid=$_POST['imgid'];
$checkID=$_POST['checkID'];

if(empty($_POST['checkID'])){
    $_POST['checkID']=md5(microtime());
} else{
 if(preg_match('/^[a-f0-9]{32}$/',$_POST['checkID']))
 {
 
    $sql="SELECT cid FROM comments WHERE checkID = '$checkID'";
     $result = mysqli_query($conn,$sql);

    $resultCheck= mysqli_num_rows($result);
     
     if($resultCheck == 1)
     {
         print_r("Ihr Kommentar wurde bereits gesendet") ;
     }
     else
     {

                $sql = "INSERT INTO comments (uid, date, message, imgid, checkID) VALUES('$uid', '$date', '$message', '$imgid', '$checkID')";
                /*$result=*/ mysqli_query($conn,$sql);
         
         if(mysqli_affected_rows() == 1) {
             $message = 'Kommentar wurde gesendet!';}
         else{
             $message = 'Ihr Kommentar konnte nicht gesendet werden!';}
     }

 }


}
}
}

function getComments($conn,$bildid){
    $sql = "SELECT * FROM comments WHERE imgid=$bildid ORDER BY date DESC";            //go into the database
    $result = mysqli_query($conn, $sql);        //run the query
    while($row = mysqli_fetch_assoc($result)){  //spit it out
        $id = $row['uid'];
        $sql2 = "SELECT * FROM users WHERE user_id='$id'";
        $result2 = mysqli_query($conn, $sql2);
        if($row2 = mysqli_fetch_assoc($result2)){
                echo "<div class='comment-box'><p>";
                echo $row2['user_uid']."<br>";
                echo $row['date']."<br>";
                echo nl2br($row['message']); //interpretiert Absätze in sql zu php
               // print_r($row2);
            echo "</p>";
            if(isset($_SESSION['u_id'])){
                if($_SESSION['u_id']== $row2['user_id']){
                    $_SESSION['bahn']= $_GET['bahn'];
                    
                    //echo "$bahn";
                        echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                        <input type='hidden' name='uid' value='".$row['cid']."'>
                        <button type='submit' name='commentDelete'>Löschen</button>
                        </form>
                        <form class='edit-form' method='POST' action='includes/editcomment.inc.php'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <input type='hidden' name='uid' value='".$row['uid']."'>
                        <input type='hidden' name='date' value='".$row['date']."'>
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
            }else{
            echo "<p class='commentmessage'>Du musst eingeloggt sein um zu antworten</p>";  
            }
            echo "</div>";
        }
       
    }
  
}


function editComments($conn){
    if(isset($_POST['commentSubmit'])){
    $cid=$_POST['cid'];
    $uid=$_POST['uid'];
    $date=$_POST['date'];
    $message=$_POST['message'];
    $bahn=$_SESSION['bahn'];
    
    $sql = "UPDATE comments SET message='$bahn' WHERE cid='$cid'";
    $result = mysqli_query($conn,$sql);
    header("Location: index.php?page=gallery&bahn=$bahn");
    
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

    function deleteComments($conn){
        if(isset($_POST['commentDelete'])){
            $cid=$_POST['cid'];
            
            $sql = "DELETE FROM comments WHERE cid='$cid'";
            $result = mysqli_query($conn,$sql);
            header("Location: index.php?page=gallery&bahn=$bildid");
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

            function userLogout(){
                if(isset($_POST['logoutSubmit'])){
                    session_start();
                    session_unset();
                    session_destroy();
                    header("Location: index.php");
                    exit();
                }
        }*/