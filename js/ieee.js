$(document).ready(function() {

    $('.button-collapse').sideNav();

    //Get rid of styling from CuteNews
    $('div b', '.post').contents().unwrap();
    $('div font', '.post').contents().unwrap();
    $('div[style]', '.post').removeAttr('style');
    $('span b', '.post').contents().unwrap();
    $('span font', '.post').contents().unwrap();
    $('span[style]', '.post').removeAttr('style');
    $('a[style]', '.post').removeAttr('style');

    $('div img', '.post').addClass('center-block z-depth-1');
    $('div img', '.post').parent().addClass('blog-image-padding');

    $('.post-title a', '.post').addClass('post-link');
    $('h5.recent-post a').addClass('post-link');
    $('.post-details a', '.post').contents().unwrap();

    $('div:has(span)', '.post').wrapInner('<p />').contents().unwrap();

    //Hide CuteNews accreditation (may be sliiiiiightly illegal)
    $('a[href="http://cutephp.com/"]').parent().hide();

});