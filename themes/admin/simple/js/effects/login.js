/**
 * @author The Smiths
 */
$(function(){
	// validate signup form on keyup and submit
	$('#great_form').validate({
		rules: {
			username: {
				required: true,
				minLength: 5
			},
			password: {
				required: true,
				minLength: 8
			}
		},
		messages: {
			username: {
				required: "Please enter a username.",
				minLength: "No less than 5 characters."
			},
			password: {
				required: "Please provide a password.",
				minLength: "No less than 8 characters."
			}
		}
	})
})