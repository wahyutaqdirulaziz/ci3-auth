"use strict";
//Remove Alert Message
window.setTimeout(function () {
    $("#alert-msg").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 5000);

//Remove Error Form
window.setTimeout(function () {
    $(".error_form").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 20000);