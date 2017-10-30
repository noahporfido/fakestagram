<div id="Editbar"> <!--Backbutton-->
    <a href="/">
    <img id="ButtonBack" src="/images/back_arrow.png">
        </a>
</div>
<div id="EditField"> <!--Show Selected image to edit-->
    <?php
   echo "<div class='BildEdit' id='bild$bild->id'>
    </div>";
       echo "<style type='text/css'>";
                echo "#bild$bild->id {
                    background-image: url('/uploadimages/$bild->bild'); 
                }</style>";
<<<<<<< HEAD
        ?> <!--Information get sent to BilderController-->
        <form action='<?php echo "/bild/update?id=$bild->id" ?>' method="post">
            <input id="NameInput" type="text" required name="name" maxlength="20" value="<?php echo $bild->name; ?>"><br>
            <textarea id="BeschreibungInput" maxlength="100" name="beschreibung" rows="20" cols="50"><?php echo 
=======
        ?>
        <div id="eingabeelemente">
            <form action='<?php echo "/bild/update?id=$bild->id" ?>' method="post">
                <p id="name_edit" class="edit_beschreibung">Name</p>
                <input id="NameInput" type="text" required name="name" maxlength="20" value="<?php echo $bild->name; ?>">
                <p id="beschreibung_edit" class="edit_beschreibung">Beschreibung</p>
                <textarea id="BeschreibungInput" maxlength="100" name="beschreibung" rows="20" cols="50"><?php echo 
>>>>>>> 0cb2a7b769f90f52ce33f50e0f12730e8593bf55
            $bild->beschreibung; ?></textarea>
                <input id="SaveInput" type="submit" name="save" value="Speichern">
            </form>
        </div>

</div>
