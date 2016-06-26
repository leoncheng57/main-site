$(document).ready(function() {
    $('.cn-current-page-news', '.pagination').wrap("<li class='active'></li>");
    $('.cn-page-news', '.pagination').wrap("<li class='waves-effect'></li>");
    var nextEnabled = $('.cn-next-news', '.pagination');
    var prevEnabled = $('.cn-previous-news', '.pagination');
    if (!nextEnabled.length) {
        $('.next-page i', '.pagination').wrap("<a class='link-wrapper'></a>");
        $('.next-page').addClass('disabled');
    } else {
        $('.link-wrapper', '.next-page').contents().unwrap();
        $('.next-page').removeClass('disabled');
    }
    if (!prevEnabled.length) {
        $('.prev-page i', '.pagination').wrap("<a class='link-wrapper'></a>");
        $('.prev-page').addClass('disabled');
    } else {
        $('.link-wrapper', '.prev-page').contents().unwrap();
        $('.prev-page').removeClass('disabled');
    }

    var reformHref = function(index, elem) {
        var href = $(elem).attr('href');
        href = href.replace('post.php', 'blog.php');
        $(elem).attr('href', href);
    };

    $('.cn-page-news').each(reformHref);
    $('.cn-next-news').each(reformHref);
    $('.cn-previous-news').each(reformHref);

});
