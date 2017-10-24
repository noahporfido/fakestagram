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

function schliessen(){
    $("#anzeige_background").hide();
}
