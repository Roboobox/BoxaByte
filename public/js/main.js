if ($('body').hasClass('auth')) {
    let randImg = Math.floor(Math.random() * 5) + 1;
    $('#background').css('background-image', 'url("../assets/images/auth/login_' + randImg + '.jpg"');
}

if ($('body').hasClass('files') || $('body').hasClass('admin') ) {
    $('.file .file-opener').on('click', function () {
        let hash = $(this).data('id');
        if ($('.file[data-id="'+hash+'"] .files-container').is(':hidden')) {
            $('.file[data-id="'+hash+'"] .file-opener i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            $('.file[data-id="'+hash+'"] .files-container').removeClass('d-none');
        } else {
            $('.file .file-opener i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            $('.files-container').addClass('d-none');
        }
    })
}
