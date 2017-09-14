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
        'Bahnnummer' => 'Bahn 1',
    ],

    [
        'Dateiname' => '2.jpg',
        'Bahnnummer' => 'Bahn 2',
    ],

    [
        'Dateiname' => '3.jpg',
        'Bahnnummer' => 'Bahn 3',
    ],

    [
        'Dateiname' => '4.jpg',
        'Bahnnummer' => 'Bahn 4',
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
            <h2><?=htmlspecialchars($foto['Bahnnummer']); ?></h2>
            <div class="images/gallery/miniatur" style="...">
                <a href="images/gallery/fotos/<?=htmlspecialchars($foto['Dateiname']); ?>">
                    <img src="images/gallery/miniaturen/<?=htmlspecialchars($foto['Dateiname']); ?>" alt="<?=htmlspecialchars($foto['Dateiname']); ?>">
                </a>
            </div>
            
            <a href="index.php?page=gallery&bahn=images/gallery/Schlagempfehlungen/<?=htmlspecialchars($foto['Bahnnummer']); ?>">
            Schlagempfehlungen <?=htmlspecialchars($foto['Bahnnummer']); ?>
            </a>
            <div class="clearfix"></div>
        </div>
    <?php } 
    } 

    else {

         
        echo"<h2> Schlagempfehlungen für Bahn ".$a. " <h2>";
        

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
                    //echo $e;
                }
            }

        }   
    echo $html;
    }
    ?>