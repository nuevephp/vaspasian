/**
 * @author The Smiths
 */
$(document).ready(function() {
     $(".delete a").click(function(){
		myid = this.href.split("/").reverse();
		//alert();
		var answer = confirm("Are you sure you want to delete?")
		if (answer){
		 $.ajax({
		 	type: 'POST',
			url: this.href,
			success: function(r){
				$('#page_no').html("You have "+r+" pages on your website");
				$('.row'+myid[0]).fadeOut("slow");
			}
		 });
		 }
		 return false;
     });
 });