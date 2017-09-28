
<?php include_once 'includes/comments.inc.php' ?>
  
<div>
  <h2 style="text-align:center;">Galerie</h2>

  <hr style="height: 6px; background: url(http://ibrahimjabbari.com/english/images/hr-12.png); repeat-x 0 0;
    border: 0;">
    
    



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
</div>