$(document).ready(function() {
    $('.cn-current-page-news', '.pagination').wrap("<li class='active'></li>");
    $('.cn-page-news', '.pagination').content().unwrap()
        .wrap("<li class='waves-effect'><a></a></li>");
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
