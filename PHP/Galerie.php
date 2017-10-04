
<?php include_once 'includes/comments.inc.php' ?>
  
<div class="gallery-container">
  <h2 >Galerie</h2>

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
        echo "<div class='container'>";
        echo "<div class='col-lg-12'>";
        echo"<h2> Schlagempfehlungen für Bahn ".$bildOrdner. " <h2>";

        //echo "<a style='margin:0 868px 0 0; ' href='index.php?page=gallery' class='btn btn-default'>zurück zur Übersicht</a>";

        include_once 'includes/bilderoutput.inc.php';
        echo "</div>";
        echo "</div>";
    }
    ?>

 </div>