let html = $('html');
let dropFile = $('#drop-file');
html.on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
});

html.on("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();
});

dropFile.on('click', function () {
    $('#formFile').click();
})

dropFile.on('dragover', function () {
    $(this).addClass('drag');
    return false;
});

dropFile.on('dragleave', function () {
    $(this).removeClass('drag');
    return false;
});

dropFile.on('drop', function (e) {
    e.preventDefault();
    $(this).removeClass('drag');
    let files = e.originalEvent.dataTransfer.files;
    $('#formFile').prop("files", files);
});
