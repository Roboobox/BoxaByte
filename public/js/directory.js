$('#delete_link').on('click', function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this directory?")) {
        $('#delete_dir_form').submit();
    }
})

function copyToClipboard(selector) {
    let text = $(selector).val();
    navigator.clipboard.writeText(text)
}

