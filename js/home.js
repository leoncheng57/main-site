$(document).ready(function() {

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
});