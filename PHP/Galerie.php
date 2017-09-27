<?php include_once 'includes/comments.inc.php' ?>
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

 
        

    }
   
    ?>