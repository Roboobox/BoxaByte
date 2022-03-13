if ($('body').hasClass('auth')) {
    let randImg = Math.floor(Math.random() * 5) + 1;
    $('#background').css('background-image', 'url("../assets/images/auth/login_' + randImg + '.jpg"');
}
