function deleteid(id) {
    $.ajax({
        type: "POST",
        url: "/bild/delete",
        data: {
            elementid: id
        }
    }).success(function () {
        location.reload();
    }).fail(function (xhr, status, errorThrown) {
        alert(xhr + status + errorThrown);
    });
}

var angezeigtesBild;

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
                url: "/bild/search",
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
                    object.setAttribute("onclick", "bildshow('" + element.id + "','" + element.bild + "','" + element.name + "','" + element.beschreibung + "')");
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

    $("input").focus(function () {
        console.log("in");
    });

    $("input").focusout(function () {
        console.log("out");
    })
});

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
        myData.forEach(function (element) {
            //console.log(myData[counter-1].id);
            counter++;
            //console.log(myData[counter-1].id);
            if (element.id == angezeigtesBild) {
                nextimage = counter + upordown;
            }
        });
        if (counter == nextimage) {
            angezeigtesBild = myData[0].id;
            nextimage = 0;
        } else if (nextimage < 0) {
            nextimage = counter - 1;
        }
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
