function validateField(element, regex, errorMessage) {
    var parent = element.parent();
    if(!regex) {
        regex = /./;
    }
    if (!regex.test(element.val()) || element.val() == "") {
        if (!parent.hasClass("has-error")) {
            parent.addClass("has-error");
            printError(parent, errorMessage);
        }
        if (parent.hasClass("has-success")) {
            parent.removeClass("has-success");
        }
        return false;
    } else {
        if (parent.hasClass("has-error")) {
            parent.removeClass("has-error");
            removeError(parent);
        }
        if (!parent.hasClass("has-success")) {
            parent.addClass("has-success");
        }
        return true;
    }
}

function printError(element, text) {
    var div = $("<div>").addClass("errorPlaceholder")
        .text(text);
    element.append(div);
}

function removeError(element) {
    element.children().last().remove();
}