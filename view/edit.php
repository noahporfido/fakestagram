<div id="Editbar">
    <img id="ButtonBack" src="/images/back_arrow.png">
</div>
<div id="EditField">
    <?php
   echo "<div class='BildEdit' id='bild$bild->id'
    </div>";
       echo "<style type='text/css'>";
                echo "#bild$bild->id {
                    background-image: url('/uploadimages/$bild->bild'); 
                }</style>";
        ?>
        <form>
            <input id="NameInput" type="text" name="name" placeholder="Name"><br>
            <textarea id="BeschreibungInput" name="beschreibung" rows="20" cols="50" placeholder="Comment..."></textarea>
            <input id="SaveInput" type="submit" name="save" value="Speichern"><br>
            <input id="DeleteInput" type="submit" name="delete" value="Löschen"><br>
        </form>
</div>
