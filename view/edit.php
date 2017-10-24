<div id="Editbar">
    <a href="/home/index">
    <img id="ButtonBack" src="/images/back_arrow.png">
        </a>
</div>
<div id="EditField">
    <?php
   echo "<div class='BildEdit' id='bild$bild->id'>
    </div>";
       echo "<style type='text/css'>";
                echo "#bild$bild->id {
                    background-image: url('/uploadimages/$bild->bild'); 
                }</style>";
        ?>
        <form action='<?php echo "/bilder/update?id=$bild->id" ?>' method="post">
            <input id="NameInput" type="text" required name="name" maxlength="20" value="<?php echo $bild->name; ?>"><br>
            <textarea id="BeschreibungInput" maxlength="100" name="beschreibung" rows="20" cols="50"><?php echo 
            $bild->beschreibung; ?></textarea>
            <input id="SaveInput" type="submit" name="save" value="Speichern"><br>
            <br>
        </form>
</div>
