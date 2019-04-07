function showCalendar(date) {
	document.getElementById("dateOfBirth").setAttribute('enabled', '0');
	var yearSelect = document.getElementById("year");
	var monthSelect = document.getElementById("month");
	var week = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];
	var daysInMonth;

	document.getElementById("calendar").style.display = 'inline';
	if (yearSelect.options.length === 0) {
		for (var year = 1900; year < date.getFullYear() + 1; year++) {
			var option = new Option();
			option.text = year;
			option.value = year;
			yearSelect.add(option);
		}
		var months = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
		for (var i = 0; i < 12; i++) {
			var option = new Option();
			option.text = months[i];
			option.value = i;
			monthSelect.add(option);
		}
		yearSelect.options[date.getFullYear() - 1900].selected = true;
		monthSelect.options[date.getMonth()].selected = true;
	} else {
		document.getElementById("calendar").removeChild(document.getElementById("days"));
		var month = document.getElementById("month").options[document.getElementById("month").selectedIndex].value;
		var year = document.getElementById("year").options[document.getElementById("year").selectedIndex].value;
		date = new Date(year, month, 1);
	}
	var table = document.createElement("table");
	table.setAttribute('id', 'days');
	document.getElementById("calendar").appendChild(table);

	var daysCount = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

	if ((date.getMonth() === 1) && (date.getFullYear() % 4 === 0))
		daysInMonth = 29;
	else
		daysInMonth = daysCount[date.getMonth()];
	tr = document.createElement("tr");
	table.appendChild(tr);
	table.style.border = "1px";

	for (i = 0; i < 7; i++) {    // выводим шапку таблицы и напишем первый коммент. время пришло, пожалуй.
		var td = document.createElement("td");
		tr.appendChild(td);
		// td.id = i.toString();
		td.innerHTML = week[i];
		td.style.background = "#FFFACD";
		td.style.border = "2px solid #B3D9FF";
	}
	var datetemp = new Date(date.getFullYear(), date.getMonth(), 0);
	var empty = datetemp.getDay();
	var tr = document.createElement("tr");
	table.appendChild(tr);

	for (i = 0; i < empty; i++) {
		var td = document.createElement("td");
		tr.appendChild(td);
		td.style.border = "2px solid #B3D9FF";
		td.style.background = "#FFFACD";
	}

	var currentDay = 1;

	for (i = empty; i < 7; i++) {
		var td = document.createElement("td");
		tr.appendChild(td);
		td.style.border = "2px solid #B3D9FF";
		td.style.background = "#FFFACD";
		td.innerHTML = currentDay.toString();
		td.setAttribute("id", currentDay+"");
		td.setAttribute("onclick", "setDate(" + (currentDay + "") + ");");
		currentDay++;
	}
	var count = 7;

	while (currentDay <= daysInMonth) {
		if (count === 7) {
			var tr = document.createElement("tr");
			table.appendChild(tr);
			count = 0;
		}
		count++;
		var td = document.createElement("td");
		tr.appendChild(td);
		td.setAttribute("onclick", "setDate(" + (currentDay + "") + ");");
		td.setAttribute("id", currentDay+"");
		td.style.border = "2px solid #B3D9FF";
		td.style.background = "#FFFACD";
		td.innerHTML = currentDay.toString();
		currentDay++;
	}
	for (i = count; i < 7; i++) {
		var td = document.createElement("td");
		tr.appendChild(td);
		td.style.border = "2px solid #B3D9FF";
		td.style.background = "#FFFACD";
	}
	if (document.getElementById("dateOfBirth").value !== ""){
		var regExp = /(\d+)/;
		var cur = document.getElementById("dateOfBirth").value;
		document.getElementById(regExp.exec(cur)[0]).style.backgroundColor = "#FF6347";
	} else {
		date = new Date();
		document.getElementById(date.getDate()).style.backgroundColor = "#FF6347";
	}

}

function redrawCalendar() {
	var month = document.getElementById("month").options[document.getElementById("month").selectedIndex].value;
	var year = document.getElementById("year").options[document.getElementById("year").selectedIndex].value;
	showCalendar(new Date(year, month, 1));
}

function setDate(day){
	var month = document.getElementById("month").options[document.getElementById("month").selectedIndex].value;
	var months = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
	var year = document.getElementById("year").options[document.getElementById("year").selectedIndex].value;
	document.getElementById("dateOfBirth").value = months[month]+  "/" + day + "/" +  year;
	document.getElementById("dateOfBirth").style.backgroundColor = "#F0FFF0";
	hideCalendar();
}

function hideCalendar(){
	document.getElementById("calendar").style.display = 'none';
	document.getElementById("dateOfBirth").setAttribute('enabled', 'enabled');
}