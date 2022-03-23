$(function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});

$('#delete_link').on('click', function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this directory?")) {
        $('#delete_dir_form').submit();
    }
})

function copyToClipboard(selector) {
    if (!navigator.clipboard) {
        fallbackClipboard(selector);
        return;
    }
    let text = $(selector).val();
    navigator.clipboard.writeText(text)
}

function fallbackClipboard(selector) {
    let $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(selector).val()).select();
    document.execCommand("copy");
    $temp.remove();
}

