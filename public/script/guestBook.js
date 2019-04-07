var isValidateFio = false;
var isValidateEmail = false;
var isValidateReview = false;

var regexFio = /^[\wа-яё]+\s+[\wа-яё]+\s+[\wа-яё]+$/i;
$("#fullName").change(function () {
    isValidateFio = validateField($(this), regexFio, "Ф.И.О. должно состоять из трёх слов");
    activeSubmitButton();
});

var regexMail = /^[\w\d]+@[\w\d]+\.\w+$/i;
$("#email").change(function () {
    isValidateEmail = validateField($(this), regexMail, "Неправильный формат почтового ящика");
    activeSubmitButton();
});

$("#question").change(function () {
   isValidateReview = validateField($(this), null, "Отзыв не может быть пустым");
   activeSubmitButton();
});
$("#reset").click(function () {
    $("#submit").prop("disabled", true);
});


var activeSubmitButton = function () {
    if(isValidateFio && isValidateEmail && isValidateReview) {
        $("#submit").prop("disabled", false);
    } else {
        $("#submit").prop("disabled", true);
    }
};

