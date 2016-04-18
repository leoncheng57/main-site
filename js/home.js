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

    for (var i = 0; i < 3; i++) {
        var $group = $('<div class="carousel-group"></div>');
        var $event = $('<div class="col s12 event-wrapper">' +
            '<div class="event-item z-depth-1">' +
            '<div class="event-date">' +
            '<h6 class="center-align">Apr</h6>' +
            '<h3 class="center-align">25</h3>' +
            '</div>' +
            '<div class="event-info">' +
            '<h6>How to Get Published with IEEE</h6>' +
            '<p>14N-132 | 12-1pm</p>' +
            '</div>' +
            '</div>' +
            '</div>');
        for (var j = 0; j < 5; j++) {
            $group.append($event.clone());
        }
        $('.event-list', '.events').append($group);
    }

    $('.event-list', '.events').slick({
        dots: true,
        arrows: false
    });

    var execTemplate = $('#exec-template').html();
    var execHandlebars = Handlebars.compile(execTemplate);
    var execCards = execHandlebars({officers: officers});
    $('#exec.row').html(execCards);
});