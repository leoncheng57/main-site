$(document).ready(function() {

    mykey = 'AIzaSyAfIu2iaqycS3gfXYl1aMjBNQ4CyHvSlqo';
    calendarid = 'ncvkteq0hm7cgr5bhi00bgbaik@group.calendar.google.com';

    var officers = [
        {id: 'hlee', name: 'Harlin Lee', position: 'President', image: 'hlee.jpg'},
        {id: 'kng', name: 'Kevin Ng', position: 'Vice President', image: 'kng.jpg'},
        {id: 'igarza', name: 'Isaac Garza', position: 'Treasurer', image: 'igarza.jpg'},
        {id: 'pzhao', name: 'Parker Zhao', position: 'External Relations', image: 'pzhao.jpg'},
        {id: 'clao', name: 'Czarina Lao', position: 'Secretary', image: 'clao.jpg'},
        {id: 'schen', name: 'Shirley Chen', position: 'Social Chair', image: 'schen.jpg'},
        {id: 'makengin', name: 'Efe Akengin', position: 'Social Chair', image: 'makengin.jpg'},
        {id: 'mlao', name: 'Natalie Lao', position: 'Chairwoman', image: 'mlao.jpg'},
        {id: 'hmoncivais', name: 'Hiram Moncivais', position: 'Historian', image: 'hmoncivais.png'},
        {id: 'kikhofua', name: 'Kamoya Ikhofua', position: 'Publicity Chair', image: 'kikhofua.jpg'},
        {id: 'lchen', name: 'Lucy Chen', position: 'Publicity Chair', image: 'lchen.jpg'},
        {id: 'cwomack', name: 'Chris Womack', position: 'Webmaster', image: 'cwomack.jpg'}
    ];

    // SET UP EVENTS SECTION
    var events = $.grabCalendar({
        type: 'detailedEvents',
        maxEvents: 15,
        clean_date: true,
        upcoming: true
    });

    // Format event data for use later
    events.map(function(event) {
        var start = event.start.dateTime.split(' '),
            end = event.end.dateTime.split(' '),
            month, day, startTime, timeSuffix, endTime, time, location, timeAndLocation;

        month = start[1].substring(0, 3);
        day = start[2].substring(0, 2);

        startTime = start[5] + " " + start[6];
        timeSuffix = new RegExp(" " + end[6], 'g');
        startTime = startTime.replace(timeSuffix, ""); // if they have the same suffix, remove the first occurrence
        endTime = end[5] + " " + end[6];
        time = startTime + "-" + endTime;
        location = event.location || 'Location TBA';

        timeAndLocation = time.replace(/:00/g, "") + " | " + location;

        event['month'] = month;
        event['day'] = day;
        event['timeAndLocation'] = timeAndLocation;

        return event;
    });

    // Split into sections of 5 events
    var k, q, pages = [], chunk = 5;
    for (k=0,q=events.length; k<q; k+=chunk) {
        pages.push(events.slice(k,k+chunk));
    }

    // Handlebars
    var carouselTemplate = $('#carousel-template').html();
    var carouselHandlebars = Handlebars.compile(carouselTemplate);
    pages.forEach(function(events) {
        var context;
        if (events.length) {
            context = {events: events};
            $('.carousel-nav', '.events-list').before(carouselHandlebars(context));
        }
    });

    // Initialize carousel
    $('.event-list', '.events').slick({
        slide: '.carousel-group',
        arrows: true, dots: true,
        prevArrow: '<span class="slick-prev"></span>',
        nextArrow: '<span class="slick-next"></span>',
        appendArrows: '.event-list .carousel-nav',
        appendDots: '.event-list .carousel-nav'
    });

    // APPLICATION MODAL
    $('.modal-trigger').leanModal({
        dismissible: true
    });

    var ErrorState = function() {
        var that = Object.create(ErrorState.prototype);
        var incomplete = false;
        var error = false;
        var $errorMessage = $('#error-message', '.error');
        var $errorType = $('#error-type', '#error-message');
        var requiredMessage = "All fields are required.";

        that.triggerRequireInputs = function() {
            incomplete = true;
            if (!error) {
                that.showError(requiredMessage);
            }
        };

        that.dismissInputRequired = function() {
            incomplete = false;
            if (!error) that.hideErrorMessage();
        };

        that.triggerError = function(errorMessage) {
            error = true;
            that.showError(errorMessage);
        };

        that.dismissError = function() {
            error = false;
            if (incomplete) {
                $errorType.text(requiredMessage);
            } else {
                that.hideErrorMessage();
            }

        };

        that.showError = function(message) {
            $errorType.text(message);
            $errorMessage.fadeIn({queue: false}).animate({'margin-left': 0}, 400);
        };

        that.hideErrorMessage = function() {
            $('#error-message').fadeOut({queue: false}).animate({'margin-left': '-500px'}, 400);
        };

        return that;
    };

    var eState = new ErrorState();

    var checkInputs = function() {
        var $inputs = $('#application').find('input');
        var full = $inputs.filter(function () {
            return $.trim($(this).val()).length > 0;
        }).length;
        return full == 3;
    };

    $('input', '#application').blur(function () {
        if (checkInputs()) {
            eState.dismissInputRequired();
        }
    });

    $('input#email').blur(function() {
       var correctEmail = $(this).val().includes('@mit.edu');
        if (correctEmail) eState.dismissError();
    });


    // Application submission handling
    $('#application').submit(function (event) {
        event.preventDefault();

        var data = $(this).serialize();
        var $inputs = $(this).find('input');

        if (!checkInputs()) {
            eState.triggerRequireInputs();
            return;
        }

        $inputs.prop('disabled', true);

        $.post('register.php', data)
            .always(function () {
                $inputs.prop('disabled', false);
            })
            .done(function (response) {
                if (response.includes("success")) {
                    $("#join-modal").closeModal();
                    Materialize.toast(response, 4000);
                } else {
                    eState.triggerError(response);
                }
            })
            .fail(function (responseObject) {
                console.log(responseObject);
            });
    });

    var execTemplate = $('#exec-template').html();
    var execHandlebars = Handlebars.compile(execTemplate);
    var execCards = execHandlebars({officers: officers});
    $('#exec.row').html(execCards);
});