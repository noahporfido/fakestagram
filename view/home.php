<div id="galerie">
    <h1 id="galerie_h1">Ihre Bildergalerie</h1>
    <div id="anzeige_background">
        <div id="anzeige">
            <h3 id="anzeige"
        </div>
    </div>

    <?php
            foreach($bilder as $bild){
                echo "<style type='text/css'>";
                echo "#element$bild->id {
                    background-image: url('/uploadimages/$bild->bild'); 
                }</style>";
                echo "<div id='element$bild->id' class='bilder'>
                        <div id='option$bild->id' class='option' '>
                            <a href='/bilder/edit?id=$bild->id'>
                                <div class='edit' ></div>
                            </a>
                            <div class='ansehen'onclick='bildshow($bild->id)'></div>
                            <div class='delete' onclick='delete($bild->id)'></div>
                        </div>
                    </div>";
                
            }
        ?>
</div>
