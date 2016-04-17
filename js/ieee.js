$(document).ready(function() {

    $('.button-collapse').sideNav();
    $('.modal-trigger').leanModal({
        dismissible: true
    });

    var showError = function() {
        $('.error').show().animate({width: auto}, 200);
    };


    // Application submission handling
    $('#application').submit(function(event) {
        event.preventDefault();

        var data = $(this).serialize();
        var $inputs = $(this).find('input');

        $inputs.prop('disabled', true);

        $.post('register.php', data)
            .always(function() {
                $inputs.prop('disabled', false);
            })
            .done(function(response) {
                if (response.includes("success")) {
                    $("#join-modal").closeModal();
                    Materialize.toast(response, 4000);
                } else {
                    $('#error-type').text(response);
                    $('.error-message').fadeIn({queue: false}).animate({'margin-left': 0}, 400);

                }
            })
            .fail(function(responseObject) {
                console.log(responseObject);
            });
    });

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