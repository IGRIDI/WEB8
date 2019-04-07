var pages = ['Главная', 'Обо мне', 'Мои интересы', 'Мой фотоальбом', 'Образование', 'Связь со мной', 'Входное тестирование', 'Гостевая книга', 'Блог'];
var date = new Date(2020, 0, 1);

function getCookie(name) {
	var matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name) {
	var newValue;
	var currentValue = parseInt(getCookie(`${name}`));
	if (isNaN(currentValue)) {
		currentValue=0;
	}
	newValue = currentValue + 1;
	document.cookie = `${name}=${newValue}; expires=${date}`;
}


function renderCookieTable(name) {
	var tbl2 = "<table class=\"album history\"";
	document.write(tbl2);
	document.write("<tr>");
		document.write("<th>Страница:</th>");
		document.write("<th>Общее количество посещений:</th>");
	document.write("</tr>");
	for (var i = 0; i < pages.length; i++) {
		document.write("<tr>");
		for (var j = 0; j < 2; j++) {
			if (j===0) {
				document.write("<td>"+pages[i]+"</td>");
			} else if (getCookie(pages[i]) === undefined) {
				document.write("<td>0</td>");
			} else document.write("<td>"+getCookie(pages[i])+"</td>");
		}
		document.write("</tr>");
	}
	document.write("</table>");
}