<div id="galerie">
    <h1 id="galerie_h1">Ihre Bildergalerie</h1>


    <?php
            foreach($bilder as $bild){
                echo "<style type='text/css'>";
                echo "#element$bild->id {
                    background-image: url('/uploadimages/$bild->bild'); 
                }</style>";
                echo "<div id='element$bild->id' class='bilder'>
                        <div id='option$bild->id' class='option' '>
                            <a href='/bild/edit?id=$bild->id'>
                                <div class='edit' ></div>
                            </a>
                            <div class='ansehen'onclick='bildshow($bild->id, \"$bild->bild\", \"$bild->name\", \"$bild->beschreibung\")'></div>
                            <div class='delete' onclick='deleteid($bild->id)'></div>
                        </div>
                    </div>";
                
            }
        ?>
        <div id="anzeige_background">
            <div id="close" onclick="schliessen()"></div>
            <div id="left">
                <img id="left_img" src="/images/left-arrow.svg" onclick="next(-2)">
            </div>
            <div id="right">
                <img id="right_img" src="/images/right-arrow.svg" onclick="next(0)">
            </div>
            <div id="anzeige">
                <h3 id="anzeige_titel"></h3>
                <img src="/uploadimages/meer.jpg" id="anzeige_bild">
                <div id="anzeige_text_div">
                    <p id="anzeige_text"></p>
                </div>
            </div>
        </div>
</div>
