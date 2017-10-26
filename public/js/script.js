function deleteid(id) {
    $.ajax({
        type: "POST",
        url: "/home/delete",
        data: {
            elementid: id
        }
    }).done(function () {
        location.reload();
    }).fail(function (xhr, status, errorThrown) {
        alert(xhr + status + errorThrown);
    });
}

function bildshow(id, url, titel, beschreibung) {
    $("#anzeige_background").show();
    document.getElementById("anzeige_bild").src = "/uploadimages/" + url;
    document.getElementById("anzeige_titel").innerHTML = titel;
    document.getElementById("anzeige_text").innerHTML = beschreibung;

    
    if ($("#anzeige_bild").height() > $("#anzeige_bild").width()) {
        if ($("#anzeige_bild").height() < 780) {
            $("#anzeige_bild").css('min-height', '48em');
        }
    }else{
        if ($("#anzeige_bild").height() < 780) {
            $("#anzeige").css('margin-top', ((800 - $("#anzeige_bild").height()) / 2)+"px");
        }
    }
}

function schliessen() {
    $("#anzeige_background").hide();
    $("#anzeige_bild").css('min-height', '0');
    $("#anzeige").css('margin-top', '0');
}

$(document).ready(function () {
    var counter;
    $('.bilder:last').css('margin-bottom', '10em');

    $('#suchenfeld').keyup(function () {
        var text = $("#suchenfeld").val();
        if (text != "") {
            $("#suchergebnis").show();
            $.ajax({
                type: "POST",
                url: "/home/search",
                data: {
                    text: text
                }
            }).success(function (data) {
                try {
                    for (var i = 1; i <= counter; i++) {

                        var element = document.getElementById("ergebnis" + i);
                        element.parentNode.removeChild(element);
                        console.log(counter);
                    }
                } catch (err) {}
                counter = 0;
                $("#suchergebnis").css('height', '0');
                var myData = JSON.parse(data);
                myData.forEach(function (element) {
                    counter++;
                    var object = document.createElement("div");
                    object.setAttribute("id", "ergebnis" + counter);
                    object.setAttribute("class", "ergebnis");

                    var bild = document.createElement("div");
                    //bild.src = "/uploadimages/" + element.bild;
                    bild.style.backgroundImage = "url('/uploadimages/" + element.bild + "')";
                    bild.setAttribute("class", "ergebnis_bild");
                    //alert(test.name);

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
                //alert(myData.beschreibung);

                //alert(data);
            }).fail(function (xhr, status, errorThrown) {
                alert(xhr + status + errorThrown);
            });
        } else {
            $("#suchergebnis").hide();
        }
        //alert(text);

    });
});
