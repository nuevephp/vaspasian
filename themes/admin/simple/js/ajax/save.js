/**
 * @author The Smiths
 */
$(document).ready(function() {
	$('#install_form').submit(function() {
      var inputs = [];
      $(':input', this).each(function() {
        inputs.push(this.name + '=' + escape((this.type == "checkbox")?this.checked: this.value));
      })
	  
      // now if I join our inputs using '&' we'll have a query string
      $.ajax({
	  	type: "POST",
		url: this.action,
        data: inputs.join('&'),
        timeout: 2000,
        error: function(response) {
            $('#system_message').html(respose).show();
            //console.log("Failed to submit");
        },
        success: function(response) {
		  	$("#system_message").html(response).show();
        }
      })
      // by default - we'll always return false so it doesn't redirect the user.
      return false;
    })
})