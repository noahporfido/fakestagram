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
        ?> <!--Information get sent to BilderController-->
<<<<<<< HEAD
=======
        <form action='<?php echo "/bild/update?id=$bild->id" ?>' method="post">
            <input id="NameInput" type="text" required name="name" maxlength="20" value="<?php echo $bild->name; ?>"><br>
            <textarea id="BeschreibungInput" maxlength="100" name="beschreibung" rows="20" cols="50"><?php echo 
        ?>
>>>>>>> 3ca86b9334a9df6165a4b7b7a3eb51f4df8f82b4
        <div id="eingabeelemente">
            <form action='<?php echo "/bild/update?id=$bild->id" ?>' method="post">
                <p id="name_edit" class="edit_beschreibung">Name</p>
                <input id="NameInput" type="text" required name="name" maxlength="20" value="<?php echo $bild->name; ?>">
                <p id="beschreibung_edit" class="edit_beschreibung">Beschreibung</p>
                <textarea id="BeschreibungInput" maxlength="100" name="beschreibung" rows="20" cols="50"><?php echo $bild->beschreibung; ?></textarea>
<<<<<<< HEAD
=======
=======
                <textarea id="BeschreibungInput" maxlength="100" name="beschreibung" rows="20" cols="50"><?php echo 
            $bild->beschreibung; ?></textarea>
>>>>>>> ebd20a1dbc00a4075113f8e420f6d49b96c359ff
>>>>>>> 3ca86b9334a9df6165a4b7b7a3eb51f4df8f82b4
                <input id="SaveInput" type="submit" name="save" value="Speichern">
            </form>
        </div>

</div>
