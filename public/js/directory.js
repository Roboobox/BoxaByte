var popover = undefined;
var tooltip = undefined;

$(function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    var exampleTriggerEl = document.getElementById('copy_btn')
    tooltip = bootstrap.Tooltip.getInstance(exampleTriggerEl);
    tooltip.disable();
});

$('#delete_link').on('click', function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to delete this directory?")) {
        $('#delete_dir_form').submit();
    }
})

function copyToClipboard(selector) {
    tooltip.enable();
    tooltip.show();
    if (!navigator.clipboard) {
        fallbackClipboard(selector);
        return;
    }
    let text = $(selector).val();
    navigator.clipboard.writeText(text);
    tooltip.disable();
}

function fallbackClipboard(selector) {
    let $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(selector).val()).select();
    document.execCommand("copy");
    $temp.remove();
    tooltip.disable();
}

function showToolTip() {

}
