<div id="hinzufuegenContainer">
	<div id="h1Hinzufuegen">
		<p id="textHinzufuegen">Neues Bild hinzufügen</p>
	</div>
	<div id="countainerHinzufuegen">
		<form action="" method="post">
			<input type=text id="inputName" placeholder="Name"
				onclick="removePlaceholder(this)"> <br> <input type=text
				id="inputBeschreibung" placeholder="Beschreibung"
				onclick="removePlaceholder(this)"> <br> 
				
				
				<input type="file" id="inputBild" name="file" />
				<div id = "labelBild" onclick="file()">
				<div id ="divBackground">
				</div>
				</div>
				
				 <br> <input type=submit id="inputPosten" value ="Posten">
				
		</form>
	</div>
</div>
