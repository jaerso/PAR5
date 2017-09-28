<div>
<?php

include 'dbh.inc.php';



    $sql = "SELECT * FROM frontimages";
    $result= mysqli_query($conn, $sql); ?>

   
    <?php
       while($row=mysqli_fetch_assoc($result))
        { ?>

 
        
        <div class='col-lg-4'>

    <div id='divBorder'>

    <div style='text-align:center;'>
            <h2 >Bahn <?=htmlspecialchars($row['bahnnummer']); ?></h2>

            <a href="index.php?page=gallery&bahn=<?=htmlspecialchars($row['bahnnummer']); ?>">
               <img class='galerie-Bilder' <?php echo "src='".$row['bildlink']."'"; ?> alt='Bild'>
               </a>
 
        <div class="clearfix"></div>
        
        </div>
        </div>
        </div>
    <?php } ?>
     
    </div>