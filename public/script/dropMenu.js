var hrefs = ['myInterests#hobbi', 'myInterests#loveCinema', 'myInterests#loveBook', 'myInterests#loveMusic'];
var listobject = ['Моё хобби', 'Любимые фильмы', 'Любимые книги', 'Любимая музыка'];

function makelist() {
	document.writeln('<ul>');
	for (var i = 0; i < listobject.length; i++){
		document.writeln('<li><a href=\"' + hrefs[i] + '">' + listobject[i] + '</a>');
	}
	document.writeln('</ul>');
}


makelist(hrefs, listobject);
document.getElementById("inter").style.display = 'none';

function showList() {
	if (document.getElementById("inter").style.display !== 'none'){
		document.getElementById("inter").style.display = 'none';
	} else {
		document.getElementById("inter").style.display = 'block';
	}
}