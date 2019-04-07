

function setBackground(id) {
	var ids = ["MainPage", "AboutMe", "myInterests", "Photoalbum", "Education", "Connection", 'Test', 'History'];
	var pics = ["fon-0.jpg", "fon-1.jpg", "fon-2.jpg", "fon-3.jpg", "fon-4.jpg", "fon-5.jpg", 'fon-6.jpg', 'fon-7.jpg'];


	document.body.style.background = 'url(img/'+pics[ids.indexOf(id)]+') repeat';

}

function restore(id){
	document.body.style.background = 'url(img/fon.jpg) repeat';
}
