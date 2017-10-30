<div id="hinzufuegenContainer">
    <h1 id="textHinzufuegen">Neues Bild hinzufügen</h1>
    <div id="countainerHinzufuegen">
        <form action="/bild/create" method="post" enctype="multipart/form-data">
            <input type=text id="inputName" placeholder="Name" name="name" required>
            <textarea type=text id="inputBeschreibung" placeholder="Beschreibung" name="beschreibung" maxlength="100"></textarea>
            <input type="file" id="inputBild" name="image" required onchange="readURL(this);"/>
            <div id="labelBild" onclick="file()">
                <div id="divBackground">
                </div>
            </div>
            <div id="vorschau">
                <img id="bildvorschau" src="#" />
                <div id="vorschau_hover" onclick="file()">
                    <p id="bild_aendern">Bild ändern</p>
                </div>
            </div>
            <input type="submit" id="inputPosten" value="Hochladen" name="submit">
        </form>
    </div>
</div>
