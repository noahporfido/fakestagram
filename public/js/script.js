// ruhft eine php datei auf, die das Bild löscht
function deleteid(id) {
    $.ajax({
        type: "POST",
        url: "/bild/delete",
        data: {
            elementid: id
        }
    }).success(function () {
        // nach dem Löschen wird die seite Neu geladen
        location.reload();
    }).fail(function (xhr, status, errorThrown) {
        alert(xhr + status + errorThrown);
    });
}

// speichert die ID des momentan angezeigen Bildes, damit bei der Next funktion auch das richtige nächste BIld dargestellt wird.
var angezeigtesBild;

// Zeigt das angecklikte Bild in gross dar
// Titel und Beschreibung wird ober und unter dem Bild auch dargestellt
function bildshow(id, url, titel, beschreibung) {
    angezeigtesBild = id;
    $("#anzeige_background").show();
    $("#suchergebnis").hide();
    document.getElementById("suchenfeld").value = "";
    document.getElementById("anzeige_bild").src = "/uploadimages/" + url;
    document.getElementById("anzeige_titel").innerHTML = titel;
    document.getElementById("anzeige_text").innerHTML = beschreibung;
    bildanpassen();
}

// ändert die grösse des Bildes valls es zu klein oder gross ist und positioniert es in der Mitte
function bildanpassen() {
    if ($("#anzeige_bild").height() > $("#anzeige_bild").width()) {
        if ($("#anzeige_bild").height() < 780) {
            $("#anzeige_bild").css('min-height', '48em');
        }
    } else {
        if ($("#anzeige_bild").height() < 780) {
            $("#anzeige").css('margin-top', ((800 - $("#anzeige_bild").height()) / 2) + "px");
        }
    }
}

// schliesst die Vorschau des Bildes
function schliessen() {
    $("#anzeige_background").hide();
    $("#anzeige_bild").css('min-height', '0');
    $("#anzeige").css('margin-top', '0');
}

$(document).ready(function () {
    var counter;
    //das letzte Bild soll unten ein Abstand haben, damit der Footer nicht über die BIlder kommt.
    $('.bilder:last').css('margin-bottom', '10em');

    //jedes mal wenn etwas im suchfeld geändert wird führt es diese fuktion aus
    $('#suchenfeld').keyup(function () {
        var text = $("#suchenfeld").val();
        if (text != "") {
            // stellt eine Verbindung zu einem PHP dokument her und erhält alle Bilder die den eingegebenen String enthalten.
            $.ajax({
                type: "POST",
                url: "/bild/search",
                data: {
                    text: text
                }
            }).success(function (data) {
                // löscht falls vorhanden die vorherigen suchergebnise
                try {
                    for (var i = 1; i <= counter; i++) {

                        var element = document.getElementById("ergebnis" + i);
                        element.parentNode.removeChild(element);
                        console.log(counter);
                    }
                } catch (err) {}
                counter = 0;
                $("#suchergebnis").show();
                $("#suchergebnis").css('height', '0');
                var myData = JSON.parse(data);
                
                // Für die fuktion so oft aus wie es suchergebnisse hat
                // und generiert die Elemente mit dem Entsprechenden Inhalt und fügt sie in den HTML code ein
                myData.forEach(function (element) {
                    counter++;
                    var object = document.createElement("div");
                    object.setAttribute("id", "ergebnis" + counter);
                    object.setAttribute("onclick", "bildshow('" + element.id + "','" + element.bild + "','" + element.name + "','" + element.beschreibung + "')");
                    object.setAttribute("class", "ergebnis");

                    var bild = document.createElement("div");
                    bild.style.backgroundImage = "url('/uploadimages/" + element.bild + "')";
                    bild.setAttribute("class", "ergebnis_bild");

                    var titel = document.createElement("h4");
                    titel.innerHTML = element.name;
                    titel.setAttribute("class", "ergebnis_titel");

                    var text = document.createElement("p");
                    text.innerHTML = element.beschreibung;
                    text.setAttribute("class", "ergebnis_text");

                    var suche = document.getElementById("suchergebnis");
                    object.appendChild(bild);
                    object.appendChild(titel);
                    object.appendChild(text);
                    suche.appendChild(object);
                    $("#suchergebnis").css('height', (counter * 6 + 1) + 'em');
                });
            }).fail(function (xhr, status, errorThrown) {
                alert(xhr + status + errorThrown);
            });
        } else {
            $("#suchergebnis").hide();
        }
    });

    // Wenn auf das suchfeld geklickt wird wird die animation ausgelöst
    $("#suchenfeld").focus(function () {
        console.log("in");
        $("#placeholder").animate({
            top: "-0.5em",
            fontSize: "0.8em"
        }, {
            duration: 100
        });
        $("#border").animate({
            width: "102%"
        }, {
            duration: 100
        });
    });

    // Wenn das Suchfeld verlassen wird löst es die Animation aus
    $("#suchenfeld").focusout(function () {
        console.log("out");
        $("#placeholder").animate({
            top: "0.5em",
            fontSize: "1em"
        }, {
            duration: 100
        });
        $("#border").animate({
            width: "0%"
        }, {
            duration: 100
        });
    })
});

// Zeigt das nächste Bild an
function next(upordown) {
    $.ajax({
        type: "POST",
        url: "/bild/next",
        data: {
            id: angezeigtesBild
        }
    }).success(function (data) {
        counter = 0;
        nextimage = 0;
        var myData = JSON.parse(data);
        // schaut welches Bild as nächstes an der reihe ist
        // wenn das vorherige Bild angezeigt werden soll rechnet es einfach mit der Variable uüprdown -2, damit auch wirklich das vorherige Bild angezeigt wird
        myData.forEach(function (element) {
            counter++;
            if (element.id == angezeigtesBild) {
                nextimage = counter + upordown;
            }
        });
        // wenn es das erste oder letzt Bild ist muss es wieder zum anfang oder zum schluss springen
        if (counter == nextimage) {
            angezeigtesBild = myData[0].id;
            nextimage = 0;
        } else if (nextimage < 0) {
            nextimage = counter - 1;
        }
        // Bild und text wird geändert
        $("#anzeige_titel").html(myData[nextimage].name);
        $("#anzeige_text").text(myData[nextimage].beschreibung);
        $("#anzeige_bild").attr('src', '/uploadimages/' + myData[nextimage].bild);
        $("#anzeige_bild").css('min-height', '0');
        $("#anzeige").css('margin-top', '0');
        bildanpassen();
        angezeigtesBild = myData[nextimage].id;
    }).fail(function (xhr, status, errorThrown) {
        alert(xhr + status + errorThrown);
    });
}

// Wenn man auf den Text "suchen" klickt vokusiert es das input element
function suchenclick() {
    $("#suchenfeld").focus();
}

// nachdem man beim hochladen ein Bild ausgewählt hat wird es direkt in einer kleine Vorschau angezeigt
function vorschau(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#bildvorschau')
                .attr('src', e.target.result)
        };
        $("#labelBild").hide();
        reader.readAsDataURL(input.files[0]);

        function test() {
            var height = $("#bildvorschau").height();
            $("#bild_aendern").css("margin-top", (height / 2 - 15) + "px");
        }
        setTimeout(test, 50);
    }
}
