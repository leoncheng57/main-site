$(document).ready(function() {
    $('.cn-current-page-news', '.pagination').wrap("<li class='active'><a></a></li>");
    $('.cn-page-news', '.pagination').wrap("<li class='waves-effect'></li>");
    var nextEnabled = $('.cn-next-news', '.pagination');
    var prevEnabled = $('.cn-previous-news', '.pagination');
    if (!nextEnabled.length) {
        $('.next-page').addClass('disabled');
    } else {
        $('.next-page').removeClass('disabled');
    }
    if (!prevEnabled.length) {
        $('.prev-page').addClass('disabled');
    } else {
        $('.prev-page').removeClass('disabled');
    }
});
