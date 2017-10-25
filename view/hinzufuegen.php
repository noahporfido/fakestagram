<div id="hinzufuegenContainer">
    <div id="h1Hinzufuegen">
        <p id="textHinzufuegen">Neues Bild hinzufügen</p>
    </div>
    <div id="countainerHinzufuegen">
        <form action="/Bilder/create" method="post" enctype="multipart/form-data">
            <input type=text id="inputName" placeholder="Name" onclick="removePlaceholder(this)" name="name" required> 
            <br> 
            <input type=text id="inputBeschreibung" placeholder="Beschreibung" onclick="removePlaceholder(this)" name="beschreibung"> 
            <br>


            <input type="file" id="inputBild" name="image" required/>
            <div id="labelBild" onclick="file()">
                <div id="divBackground">
                </div>
            </div>

            <br> <input type="submit" id="inputPosten" value="Posten" name="submit">

        </form>
    </div>
</div>
