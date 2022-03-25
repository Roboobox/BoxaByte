$(function() {
    $('.verified-check').on('click', function () {
        let elem = $(this);
        changeVerification(elem.data('id'), elem.prop('checked'), elem);
    });
    $('.admin-check').on('click', function () {
        let elem = $(this);
        changeAdmin(elem.data('id'), elem.prop('checked'), elem);
    })
});


function changeVerification(id, verified, elem) {
    let url = $('#admin_verify').val();
    $('.loading-overlay').show();
    $.ajax({
        url : url,
        method: 'POST',
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            user: id,
            verified: verified ? 1 : 0
        },
        success : function (result) {
            if (result['status'] !== 'success') {
                elem.prop('checked', !verified);
            }
            $('.loading-overlay').hide();
        },
        error: function()
        {
            elem.prop('checked', !verified);
            $('.loading-overlay').hide();
        }
    });
}

function changeAdmin(id, admin, elem) {
    let url = $('#admin_set').val();
    $('.loading-overlay').show();
    $.ajax({
        url : url,
        method: 'POST',
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            user: id,
            admin: admin ? 1 : 0
        },
        success : function (result) {
            if (result['status'] !== 'success') {
                elem.prop('checked', !admin);
            }
            $('.loading-overlay').hide();
        },
        error: function()
        {
            elem.prop('checked', !admin);
            $('.loading-overlay').hide();
        }
    });
}
