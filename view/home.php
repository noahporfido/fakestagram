<div id="galerie">
    <h1 id="galerie_h1">Ihre Bildergalerie</h1>


    <?php
            foreach($bilder as $bild){
                echo "<div id='element$bild->id' class='bilder'>
                        <div id='option$bild->id' class='option'>
                            <div class='edit'></div>
                            <div class='ansehen'></div>
                            <div class='delete'></div>
                        </div>
                    </div>";
                echo "<style type='text/css'>";
                echo "#element$bild->id {
                    background-image: url('/uploadimages/$bild->bild'); 
                }</style>";
            }
        ?>
</div>
