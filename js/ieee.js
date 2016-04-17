$(document).ready(function() {

    //Get rid of styling from CuteNews
    $('div b', '.post').contents().unwrap();
    $('div font', '.post').contents().unwrap();
    $('div[style]', '.post').removeAttr('style');
    $('span b', '.post').contents().unwrap();
    $('span font', '.post').contents().unwrap();
    $('span[style]', '.post').removeAttr('style');
    $('a[style]', '.post').removeAttr('style');
    $('div', '.post').addClass('flow-text');
    $('p', '.post').addClass('flow-text');

    $('div img', '.post').addClass('center-block z-depth-1');
    $('div img', '.post').parent().addClass('blog-image-padding');

    //Hide CuteNews accreditation (may be sliiiiiightly illegal)
    $('a[href="http://cutephp.com/"]').parent().hide();

});