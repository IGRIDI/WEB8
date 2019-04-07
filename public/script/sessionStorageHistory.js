var pages = ['Главная', 'Обо мне', 'Мои интересы', 'Мой фотоальбом', 'Образование', 'Связь со мной', 'Входное тестирование', 'Гостевая книга', 'Блог'];


function sessionStorageHistory(name) {
	for (var i = 0; i < pages.length; i++) {
		var iValue = sessionStorage[pages[i]] || 0;
		sessionStorage.setItem(pages[i], iValue);
	}

	sessionStorage.setItem(name, parseInt(sessionStorage.getItem(name)) + 1);

}

function getSessionStorage(key) {
	var tbl2 = "<table class=\"album history\"";
	document.write(tbl2);
	document.write("<tr>");
		document.write("<th>Страница:</th>");
		document.write("<th>Количество посещений за текущий сеанс:</th>");
	document.write("</tr>");
	for (var i = 0; i < pages.length; i++) {
		document.write("<tr>");
		for (var j = 0; j < 2; j++) {
			if (j===0) {
				document.write("<td>"+pages[i]+"</td>");
			} else if (sessionStorage.getItem(pages[i])=== null) {
				document.write("<td>0</td>");
			} else document.write("<td>"+sessionStorage.getItem(pages[i])+"</td>");
		}
		document.write("</tr>");
	}
	document.write("</table>");
}

// function deleteStorage(name) {
// 	localStorage.removeItem(name);
// 	return '';
// }