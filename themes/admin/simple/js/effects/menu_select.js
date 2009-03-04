$(document).ready(function() {
    var path = location.pathname.substring(1);
    $('#top_nav a[@href$="' + path + '"]').addClass('current');
    $('#sub-menu a[@href$="' + path + '"]').addClass('current');
})