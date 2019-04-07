$(function () {
    $('#form_login').on('blur', function () {
        var request = new XMLHttpRequest();
        request.open('POST', '/home/loginNotExist', true);
        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                if (request.status == 200) {
                    if(request.responseText) {
                        $('#submit').prop("disabled", false);
                    } else {
                        $('#submit').prop("disabled", true);
                        alert("Данный логин уже занят");
                    }
                } else {
                    alert(request.statusText);
                }
            }
        };
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        request.send("login=" + encodeURIComponent($('#form_login').val()));
    });
});


