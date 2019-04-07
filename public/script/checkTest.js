function checkTestData() {
    var valid = true;
    var elems = document.testForm;

    var answerCounter = elems.answer.value.split(' ').length;
    var wordCounter = elems.FIO.value.split(' ').length;
    var el1 = document.querySelector(".focusP");
    var el2 = document.querySelector(".focusSelect");
    var el3 = document.querySelector(".focusSelect2");

    if (elems.answer.value === '') {
        alert ( "Пожалуйста, ответьте на Вопрос №1. В ответе должно быть не менее 30 слов." );
        alert("Сейчас слов: 0");
        elems.answer.focus();
        valid = false;
    } else if (answerCounter<30) {
        alert ( "Пожалуйста, ответьте на Вопрос №1. В ответе должно быть не менее 30 слов." );
        alert("Сейчас слов: " + answerCounter);
        elems.answer.focus();
        valid = false;
    }

    if (elems.groups.selectedIndex === 0) {
        alert ( "Пожалуйста, выберите группу, в которой Вы обучаетесь!" );
        el3.style.border = "1px solid red";
        valid = false;
    } else {
        el3.style.border = "";
    }

    if ((elems.answer_r[0].checked === false) && (elems.answer_r[1].checked === false) && (elems.answer_r[2].checked === false)) {
        alert ( "Пожалуйста, ответьте на Вопрос №2 - выберите один из вариантов!" );
        el1.style.border = "1px solid red";
        valid = false;
    } else {
        el1.style.border = "";
    }

    if (elems.answ_sel.selectedIndex === 0) {
        alert ( "Пожалуйста, ответьте на Вопрос №3 - выберите один из вариантов!" );
        el2.style.border = "1px solid red";
        valid = false;
    } else {
        el2.style.border = "";
    }

    if ((wordCounter<3) || elems.FIO.value === '') {
        alert ( "Пожалуйста, заполните поле 'Ваше ФИО' полностью.");
        elems.FIO.focus();
        valid = false;
    }

    return valid;
}