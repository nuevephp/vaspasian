$(document).ready( function () {
	imageOverlay.init();

	// Remove link when No is clicked
	$('#delete_confirm .delete-no').click( function (e) {
		e.preventDefault();
		$(this).parent().remove();
	})
})


var imageOverlay = {
	init: function () {
		var that = this;
		$('a.overlay').click(function(e) {
			e.preventDefault();
			this.blur();
			var el = $(this);
			that.show(el.attr('href'));
		});
	},
	show: function (link) {
		var that = this;
		$("body").append('<div id="overlay"></div>').css({"overflow-y":"hidden"});
		var overlay = $('#overlay');

		overlay.animate({"opacity":"0.6"}, 200, "linear");

		overlay.html('<img src="'+ link +'" />');

		var overlayImg = overlay.find('img');
		overlayImg.load(function() {
			var imgWidth = overlayImg.width();
			var imgHeight = overlayImg.height();
			overlay.css({
					"top":        "50%",
					"left":        "50%",
					"width":      imgWidth,
					"height":     imgHeight,
					"margin-top": -(imgHeight/2),
					"margin-left":-(imgWidth/2) //to position it in the middle
				}).animate({"opacity":"1"}, 200, "linear");
		});

		overlay.append('<a href="#close" class="close"><p>Close</p></a>');

		overlay.find('a.close').click(function(e) {
			e.preventDefault();
			this.blur();
			that.close(overlay);
		});

		imageOverlay.initButtons();
	},

	initButtons: function () {
	    var linkSelector = "#left-panel a";

	    $(linkSelector).click(function (e) {
		e.preventDefault();

		// turn off current
		var img = $(linkSelector + '.on').removeClass('on').find('img');
		img.attr('src', img.attr('src').slice(0, -4) + "_off.jpg");

		// turn on this one
		img = $(this).addClass('on').find('img');
		img.attr('src', img.attr('src').slice(0, -8) + ".jpg");

		// load main image
		$('#img img').attr('src', this.href);
	    });
	},

	close: function (link) {
		link.animate({"opacity":"0"}, 200, "linear").remove();
	}
};

// for debugging:
var log;
if (window.console && console.log) log = console.log;
else log = function (){}