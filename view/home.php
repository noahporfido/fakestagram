<div id="galerie">
    <h1 id="galerie_h1">Ihre Bildergalerie</h1>


    <?php
            foreach($bilder as $bild){
                echo "<div id='s$bild->id' class='bilder'></div>";
                echo "<style type='text/css'>";
                echo "#s$bild->id {
                    background-image: url('/uploadimages/$bild->bild'); 
                }</style>";
            }
        ?>
</div>
