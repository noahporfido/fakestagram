<div id="hinzufuegenContainer">
	<div id="h1Hinzufuegen">
		<p id="textHinzufuegen">Neues Bild hinzufügen</p>
	</div>
	<div id="countainerHinzufuegen">
		<form action="BilderController.php" method="post">
			<input type=text id="inputName" placeholder="Name"
				onclick="removePlaceholder(this)" name="name"> <br> <input type=text
				id="inputBeschreibung" placeholder="Beschreibung"
				onclick="removePlaceholder(this)" name="beschreibung"> <br> 
				
				
				<input type="file" id="inputBild" name="file" name="picture"/>
				<div id = "labelBild" onclick="file()">
				<div id ="divBackground">
				</div>
				</div>
				
				 <br> <input type=submit id="inputPosten" value ="Posten">
				
		</form>
	</div>
</div>
