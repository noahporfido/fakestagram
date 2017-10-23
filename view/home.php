<div id="StartseiteContainer">
    <h1>Test</h1>
    
    <p>
        <?php
            foreach($bilder as $bild){
                echo "<img src='/uploadimages/";
                echo $bild->bild . "' class='bilder'>";
            }
        ?>
    </p>
</div>
