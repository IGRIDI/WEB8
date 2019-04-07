var changeMode = function () {
    if ($("#form_manual").prop("checked")) {
        $("#form_file").prop("disabled", true);
        $("#form_topic").prop("disabled", false);
        $("#form_author").prop("disabled", false);
        $("#form_photo").prop("disabled", false);
        $("#form_message").prop("disabled", false);
    } else {
        $("#form_file").prop("disabled", false);
        $("#form_topic").prop("disabled", true);
        $("#form_author").prop("disabled", true);
        $("#form_photo").prop("disabled", true);
        $("#form_message").prop("disabled", true);
    }
};

var isValidateTopic = false;
var isValidateAuthor = false;
var isValidateMessage = false;

var activeSubmitButton = function () {
    if (($("#form_manual").prop("checked") && isValidateTopic && isValidateAuthor && isValidateMessage) ||
        $("#form_file")[0].files.length) {
        $("#submit").prop("disabled", false);
    } else {
        $("#submit").prop("disabled", true);
    }
};

$(document).ready(function () {
    $("input[type=radio]").on("change", function () {
        changeMode();
    });

    changeMode();

    $("#form_topic").change(function () {
        isValidateTopic = validateField($(this), null, "Тема не может быть пустой");
        activeSubmitButton();
    });

    $("#form_author").change(function () {
        isValidateAuthor = validateField($(this), null, "Автор не может быть не указан");
        activeSubmitButton();
    });

    $("#form_message").change(function () {
        isValidateMessage = validateField($(this), null, "Отзыв не может быть пустым");
        activeSubmitButton();
    });

    $("#form_file").change(function () {
        activeSubmitButton();
    });
});