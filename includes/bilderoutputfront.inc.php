<?php

include 'dbh.inc.php';

echo"<h2> Sehen sie hier unsere Bahnen <h2>";

    $sql = "SELECT * FROM frontimages";
    $result= mysqli_query($conn, $sql); ?>

   
    <?php
       while($row=mysqli_fetch_assoc($result))
        { ?>
        
        <div class='col-lg-6'>
            <h2>Bahn <?=htmlspecialchars($row['bahnnummer']); ?></h2>

            <div>
               <?php echo "<img style='width:200px; height: 250px;' src='".$row['bildlink']."' alt='Bild'>"; ?>
               
               <a style='font-size: 0.5em;' href="index.php?page=gallery&bahn=<?=htmlspecialchars($row['bahnnummer']); ?>">
   Schlagempfehlungen Bahn  <?=htmlspecialchars($row['bahnnummer']); ?>
            </a>
            </div>
             
            
            
        <div class="clearfix"></div>
        </div>
      
    <?php } ?>
     
     