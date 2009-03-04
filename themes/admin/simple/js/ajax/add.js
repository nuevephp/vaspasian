$(document).ready(function() {
	$('#create a').click( function(e) {
		add.init(this.href);
		e.preventDefault();
	})	
})

var add = {
	init: function(url) {
		$.ajax({
			url: url,
			cache: true,
			success: function(html){
				var area = $("#load-area");
				area.empty();
				area.append(html);
			}
		})
	}
}