
<h2>Galerie</h2>
<p></p>
</header>

<?php

$bildOrdner = '';
$bahnnummer = '0';

    if(isset($_GET['bahn']))
    {
     $bildOrdner = $_GET['bahn'];
    }


    if($bildOrdner == '') 
    {
        include_once 'includes/bilderoutputfront.inc.php';
    } 

    else 
    {
        echo"<h2> Schlagempfehlungen für Bahn ".$bildOrdner. " <h2>";

        include_once 'includes/bilderoutput.inc.php';
        

            if(isset($_SESSION['u_id'])){
                echo "<form action='".setComments($conn)."' method='POST'>
                <input type='hidden' name='uid' value='".$_SESSION['u_id']."'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='message'></textarea><br>
                <button type='submit' name='commentSubmit'>Kommentieren</button>
                </form>";
            } else{
            echo "Du musst eingeloggt sein, um zu kommentieren
            <br><br>";
            }

 
        getComments($conn);

    }
   
    ?>