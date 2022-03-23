var url = $("#notepad_update").val();
var key = $("#notepad_key").val();

$(function() {
    $('#saveNote').on('click', function ()  {
        save();
    });

    $('.color-pickers #bgColor, .color-pickers #txtColor').on('change', function () {
        changeColors();
    });

    $('#open_note').on('click', function (e)
    {
        let url = $('.notepad select#notes :selected').data('url');
        window.location.replace(url);
    });

    $('#save_name').on('click', function ()
    {
        changeNoteName();
    });

    $('#delete_note').on('click', function (e) {
        e.preventDefault();
        if (confirm("Are you sure you want to delete this note?")) {
            $('#delete_note_form').submit();
        }
    });

    $('.notepad .share-btn').on('click', function () {

    });
});


function changeColors()
{
    let bgColor = $('.color-pickers #bgColor').val();
    let txtColor = $('.color-pickers #txtColor').val();
    // Show loading
    $('.notepad #color_label .loading').show();
    $.ajax({
        url : url,
        method: 'POST',
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            bg_color: bgColor,
            txt_color: txtColor,
            key: key
        },
        success : function (result) {
            // Show message and hide loading
            if (result['status'] === 'success') {
                $('#notepad').css('background-color', bgColor).css('color', txtColor);
            }
            $('.notepad #color_label .loading').hide();

        },
        error: function()
        {
            $('.notepad #color_label .loading').hide();
        }
    });

}

function changeNoteName() {
    let newName = $('.notepad #noteName').val();
    let notePadStatus = $('.notepad .notepad-status');
    $.ajax({
        url : url,
        method: 'POST',
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            name: newName,
            key: key
        },
        success : function (result){
            // Show message and hide loading
            if (result['status'] === 'success') {
                $('#note_title_text').text(newName);
                notePadStatus.addClass('text-success')
                    .text('Name updated!')
                    .stop(true,true)
                    .fadeIn(300)
                    .delay(2500)
                    .fadeOut(300)
                    .removeClass('txt-success');
            } else
            {
                notePadStatus.addClass( 'text-danger' )
                    .text( 'Something went wrong, try again later!' )
                    .stop( true, true )
                    .fadeIn(300)
                    .delay( 2500 )
                    .fadeOut( 300 )
                    .removeClass('txt-danger');
            }

        },
        error: function()
        {
            notePadStatus.addClass( 'text-danger' )
                .text( 'Something went wrong, try again later!' )
                .stop( true, true )
                .fadeIn(300)
                .delay( 2500 )
                .fadeOut( 300 )
                .removeClass('txt-danger');
        }
    });
}


function save() {
    let notePadStatus = $('.notepad .notepad-status');

    // Show loading text
    $('#saveNote .normal').hide();
    $('#saveNote .loading').show();

    $.ajax({
        url : url,
        method: 'POST',
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            content: $('textarea.note').val(),
            key: key
        },
        success : function (result){
            // Show message and hide loading
            if (result['status'] === 'success') {
                notePadStatus.addClass('text-success')
                    .text('Saved!')
                    .stop(true,true)
                    .fadeIn(300)
                    .delay(2500)
                    .fadeOut(300)
                    .removeClass('txt-success');
            } else
            {
                notePadStatus.addClass( 'text-danger' )
                    .text( 'Something went wrong, try again later!' )
                    .stop( true, true )
                    .fadeIn(300)
                    .delay( 2500 )
                    .fadeOut( 300 )
                    .removeClass('txt-danger');
            }
            $( '#saveNote .normal' ).show();
            $( '#saveNote .loading' ).hide();
        },
        error: function()
        {
            // Show message and hide loading
            notePadStatus.addClass('text-danger')
                .text('Something went wrong, try again later!')
                .stop(true,true)
                .fadeIn(300)
                .delay(2500)
                .fadeOut(300)
                .removeClass('txt-danger');
            $('#saveNote .normal').show();
            $('#saveNote .loading').hide();
        }
    });
}
