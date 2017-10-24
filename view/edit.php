<div id="Editbar">
    <img id="ButtonBack" src="/images/back_arrow.png">
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
        <form>
            <input id="NameInput" type="text" name="name" value="<?php echo $bild->name; ?>"><br>
            <textarea id="BeschreibungInput" name="beschreibung" rows="20" cols="50"><?php echo 
            $bild->beschreibung; ?>" </textarea>
            <input id="SaveInput" type="submit" name="save" value="Speichern"><br>
            <input id="DeleteInput" type="submit" name="delete" value="Löschen"
}
?><br>
        </form>
</div>
