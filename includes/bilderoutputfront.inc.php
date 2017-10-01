<div>
<?php

include 'dbh.inc.php';



    $sql = "SELECT * FROM frontimages";
    $result= mysqli_query($conn, $sql); ?>

   
    <?php
       while($row=mysqli_fetch_assoc($result))
        { ?>

 
    <div class='col-lg-2 col-md-3 col-sm-4 col-xs-12'>
        
    <div id='divBorder' style="cursor: pointer;" onclick="window.location='index.php?page=gallery&bahn=<?=htmlspecialchars($row['bahnnummer']); ?>';">

    <div class="bahn-container">
            <h2 >Bahn <?=htmlspecialchars($row['bahnnummer']); ?></h2>

            <a href="index.php?page=gallery&bahn=<?=htmlspecialchars($row['bahnnummer']); ?>">
               <img class='galerie-Bilder' <?php echo "src='".$row['bildlink']."'"; ?> alt='Bild 404 not found'>
               </a>
 
        
        
        </div>
        </div>
        </div>
        
    <?php } ?>

    <div class="clearfix"></div>
    </div>