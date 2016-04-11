$(document).ready(function() {

    $('.button-collapse').sideNav();

    
    // $('#calendar').fullCalendar({
    //     googleCalendarApiKey: 'AIzaSyAfIu2iaqycS3gfXYl1aMjBNQ4CyHvSlqo',
    //     events: {
    //         googleCalendarId: 'ncvkteq0hm7cgr5bhi00bgbaik@group.calendar.google.com'
    //     },
    //     eventBackgroundColor: "#993333"
    // });

    //Get rid of styling from CuteNews
    $('#blog-post div b').contents().unwrap();
    $('#blog-post div font').contents().unwrap();
    $('#blog-post div[style]').removeAttr('style');
    $('#blog-post span b').contents().unwrap();
    $('#blog-post span font').contents().unwrap();
    $('#blog-post span[style]').removeAttr('style');
    $('#blog-post a[style]').removeAttr('style');

    //Hide CuteNews accreditation (may be sliiiiiightly illegal)
    $('a[href="http://cutephp.com/"]').parent().hide();

});