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
}

function schliessen() {
    $("#anzeige_background").hide();
}

$(document).ready(function () {
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
                var counter = 1;
                var myData = JSON.parse(data);
                myData.forEach(function (element) {
                    var object = document.createElement("div");
                    object.setAttribute("id", "ergebnis" + counter);
                    object.setAttribute("class", "ergebnis");

                    var bild = document.createElement("img");
                    bild.src = "uploadimages/" + element.bild;
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

                });
                //alert(myData.beschreibung);

                //alert(data);
            }).fail(function (xhr, status, errorThrown) {
                alert(xhr + status + errorThrown);
            });
        }
        else{
            $("#suchergebnis").hide();
        }
        //alert(text);

    });
});
