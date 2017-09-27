<?php

include 'dbh.inc.php';

echo"<h2> Sehen sie hier unsere Bahnen <h2>";

    $sql = "SELECT * FROM frontimages";
    $result= mysqli_query($conn, $sql);

       while($row=mysqli_fetch_assoc($result))
        { ?>
        <div>
            <h2>Bahn <?=htmlspecialchars($row['bahnnummer']); ?></h2>

            <div>
               <?php echo "<img src='".$row['bildlink']."' alt='Bild'>"; ?>
            </div>
            
            <a href="index.php?page=gallery&bahn=<?=htmlspecialchars($row['bahnnummer']); ?>">
            Schlagempfehlungen Bahn <?=htmlspecialchars($row['bahnnummer']); ?>
            </a>
            <div class="clearfix"></div>
        </div>
    <?php } ?>