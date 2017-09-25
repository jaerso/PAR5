<?php
date_default_timezone_set('Europe/Berlin');
include 'includes/comments.inc.php';
include 'includes/dbh.inc.php';
?>
<header class="major">
<h2>Galerie</h2>
<p></p>
</header>

<?php

$bildOrdner = 'Miniaturen';
$Bahnnummer = '0';
$a = '0';

$fotos = [
    [
        'Dateiname' => '1.jpg',
        'Bahnnummer' => '1',
    ],

    [
        'Dateiname' => '2.jpg',
        'Bahnnummer' => '2',
    ],

    [
        'Dateiname' => '3.jpg',
        'Bahnnummer' => '3',
    ],

    [
        'Dateiname' => '4.jpg',
        'Bahnnummer' => '4',
    ]
    ];

    if(isset($_GET['bahn'])){
     $bildOrdner = $_GET['bahn'];

     ($_GET['bahn'] == 'images/gallery/Schlagempfehlungen/Bahn'.$Bahnnummer);

     do {
        $a = $a + 1;
     } while ($a <=$Bahnnummer);
}


    if($bildOrdner == 'Miniaturen') {

        echo"<h2> Sehen sie hier unsere Bahnen <h2>";

    
        foreach ($fotos as $foto) { ?>
        <div>
            <h2>Bahn <?=htmlspecialchars($foto['Bahnnummer']); ?></h2>
            <div class="images/gallery/miniatur" style="...">
                <a href="images/gallery/fotos/<?=htmlspecialchars($foto['Dateiname']); ?>">
                    <img src="images/gallery/miniaturen/<?=htmlspecialchars($foto['Dateiname']); ?>" alt="<?=htmlspecialchars($foto['Dateiname']); ?>">
                </a>
            </div>
            
            <a href="index.php?page=gallery&bahn=images/gallery/Schlagempfehlungen/Bahn<?=htmlspecialchars($foto['Bahnnummer']); ?>">
            Schlagempfehlungen Bahn <?=htmlspecialchars($foto['Bahnnummer']); ?>
            </a>
            <div class="clearfix"></div>
        </div>
    <?php } 
    } 

    else {

         
        echo"<h2> Schlagempfehlungen für Bahn ".$a. " <h2>";
        
        $html ="";
        $elemente = scandir($bildOrdner);
        foreach($elemente as $e){
            if($e == '.' or $e == '..') {continue; }
            //if(is_dir($bildOrdner.$e)){
            //für unterordner   $html .= '<a href="index.php?album='.urlencode($bildOrdner.$e.'/').'">'.$e.'</a>';
            //}
            else {
                
                $size = getimagesize($bildOrdner."/".$e);
                if($size[2] == 3 or $size[2] == 2) {
                    $html .= '<div style="display:inline-block;margin:7px;">
                    <img src="'.$bildOrdner."/".$e.'" '.$size[3].' alt="'.$e.'"></div>';
                    echo $bildOrdner;
               }
           

        }   
    echo $html;
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
    }
    ?>