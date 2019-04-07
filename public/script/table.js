const data = [
	{
		src: "cirilla.jpg",
		srcSmall: "cirilla-sm.jpg",
		title: "Цирилла",
	},
	{
		src: "doctor_who.jpg",
		srcSmall: "doctor_who-sm.jpg",
		title:  "Доктор Кто",
	},
	{
		src: "dovakin.jpg",
		srcSmall: "dovakin-sm.jpg",
		title:  "Довакин",
	},
	{
		src: "geralt.jpg",
		srcSmall:  "geralt-sm.jpg",
		title:  "Геральт",
	},
	{
		src: "illidan.jpg",
		srcSmall:  "illidan-sm.jpg",
		title:  "Иллидан",
	},
	{
		src: "jaina.jpeg",
		srcSmall:  "jaina-sm.jpg",
		title:  "Джайна Праудмур",
	},
	{
		src: "Jean.jpeg",
		srcSmall:  "Jean-sm.jpg",
		title:  "Джин Грей",
	},
	{
		src: "konstantin.jpg",
		srcSmall:  "konstantin-sm.jpg",
		title:  "Джон Константин",
	},
	{
		src: "legolas.jpg",
		srcSmall:  "legolas-sm.jpg",
		title:  "Леголас",
	},
	{
		src: "neo.jpg",
		srcSmall:  "neo-sm.jpg",
		title:  "Нео",
	},
	{
		src: "ragnaros.jpg",
		srcSmall:  "ragnaros-sm.jpg",
		title:  "Рагнарос",
	},
	{
		src: "silvana.jpeg",
		srcSmall:  "silvana-sm.jpg",
		title:  "Сильвана Ветрокрылая",
	},
	{
		src: "tauriel.jpg",
		srcSmall:  "tauriel-sm.jpg",
		title:  "Тауриэль",
	},
	{
		src: "thrall.jpg",
		srcSmall:  "thrall-sm.jpg",
		title:  "Тралл",
	},
	{
		src: "tiranda.png",
		srcSmall:  "tiranda-sm.png",
		title:  "Тиранда Шелест Ветра",
	}
];

(function($) {
	// for (let i=0; i<data.length; i++) {
	// 	$('.img-list').append(`<li><a href="img/${data[i].src}" title="${data[i].title}"><img src="img/${data[i].srcSmall}">${data[i].title}</a></li>`);
	// }

	var $li = $('.img-list').find('> li'),
		$links = $li.find('> a'),
		$lightbox = $('.lightbox'),
		$bigImage = $('.lightbox').find('img'),
		$next = $('.next'),
		$prev = $('.prev'),
		$overlay = $('.overlay'),
		liIndex,
		titleImg,
		targetImg;



	function replaceImg(src, title) {
		$lightbox.find('img').attr('src', src).attr('title', title);
		$lightbox.find('.caption').html(title)
	}

	function getHref(index) {
		return $li.eq(index).find('>a').attr('href');
	}

	function getTitle(index) {
		return $li.eq(index).find('>a').attr('title');
	}

	function closeLigtbox() {
		$lightbox.fadeOut();
	}

	$overlay.click(closeLigtbox);
	$bigImage.click(closeLigtbox);

	$links.click(function(e) {
		e.preventDefault();
		targetImg = $(this).attr('href');
		titleImg = $(this).attr('title');
		liIndex = $(this).parent().index();
		replaceImg(targetImg, titleImg);
		$lightbox.fadeIn();
	});

	$next.click( function() {
		if ( (liIndex + 1) < $li.length ) {
			targetImg = getHref(liIndex + 1);
			titleImg = getTitle(liIndex+1);
			liIndex ++;
		} else {
			titleImg = getTitle(0);
			targetImg = getHref(0);
			liIndex = 0;
		}
		replaceImg(targetImg, titleImg);
	});

	$prev.click( function() {
		if ( (liIndex) > 0 ) {
			targetImg = getHref(liIndex - 1);
			console.log('--targetImg--', targetImg); /*---------------------------------------------------------------------------*/
			titleImg = getTitle(liIndex - 1);
			liIndex --;
		} else {
			targetImg = getHref($li.length - 1);
			titleImg = getTitle($li.length - 1);
			liIndex = $li.length - 1;
		}
		replaceImg(targetImg, titleImg);
	});

})(jQuery);
