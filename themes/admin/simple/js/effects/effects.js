/**
 * @author The Smiths
 * @since  0.0.5
 * @type   jQuery Effects
 */
 
$(document).ready( function() {
	dropDown.init('#create a', '#popup-add');
})

var dropDown = {
	init: function(hitArea, panel) {
		that = dropDown;
		that.hitArea = $(hitArea);
		that.panel = $(panel);
		
		if(!that.panel.hasClass('open')) that.panel.hide();
	}
}