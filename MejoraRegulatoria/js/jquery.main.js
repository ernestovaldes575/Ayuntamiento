// page init
jQuery(function() {
	initFadeButtons();
})
// fade buttons init
function initFadeButtons() {
	var animSpeed = 150;
	jQuery('.visual .photo, .kit-button-holder, .brooklyn-holder, .formaticum-holder, .section').each(function() {
		var holder = jQuery(this);
		var btn = holder.find('.btn-holder, a.alt, a.section-alt');
		btn.css({opacity: 0});
		holder.hover(function() {
			btn.show().stop().animate({opacity: 1}, {
				duration: animSpeed 
			})
		},
		function() {
			btn.stop().animate({opacity: 0}, {
				duration: animSpeed,
				complete: function() {
					btn.hide()
				}
			})
		})
	})
}
