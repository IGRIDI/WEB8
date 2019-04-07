var timeNode = document.getElementById('currentTime');
var weekDays = ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'];
function getCurrDate() {
	var curDate = new Date();
	var dd = curDate.getDate();
	var hh = curDate.getHours();
	var mm = curDate.getMinutes();
	var ss = curDate.getSeconds();
	var MM = curDate.getMonth()+1;
	if (dd < 10) dd = '0' + dd;
	if (hh < 10) hh = '0' + hh;
	if (mm < 10) mm = '0' + mm;
	if (ss < 10) ss = '0' + ss;
	if (MM < 10) MM = '0' + MM;
	return hh+':'+mm+':'+ss+' '+dd+'-'+MM+'-'+curDate.getFullYear()+' '+weekDays[curDate.getDay()];
}

setInterval(function() {
		timeNode.innerHTML = getCurrDate()
	}, 1000
);

$(function () {
	timeNode.innerHTML = getCurrDate()
});

