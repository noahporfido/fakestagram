function bildshow(id) {
    $.ajax({
        type: "POST",
        url: "/home/delete",
        data: {
            elementid: String(id)
        }
    }).done(function( json ) {
     alert(json);
  }).fail(function( xhr, status, errorThrown ) {
    alert(xhr + status + errorThrown);
  });
}
