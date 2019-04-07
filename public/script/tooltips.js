$(function() {
	const isShowTooltip = [];

	$('[data-tooltip-message]').hover(function() {
		const id = $(this).attr('id');
		if (isShowTooltip.indexOf(id) === -1) {
			const message = $(this).data('tooltip-message');
			$(this).after(`<div class="tooltip-message">${message}</div>`);
			isShowTooltip.push(id);
		}
	}, function () {
		let that = $(this);
		const id = that.attr('id');
		setTimeout(function() {
			that.siblings('.tooltip-message').remove();
			isShowTooltip.splice(isShowTooltip.indexOf(id), 1);
		}, 500)
	})

});