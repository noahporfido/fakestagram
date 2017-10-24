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

function bildshow(id) {
    
}
