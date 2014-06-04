$(document).ready(function(){
	
		load_create_ticket_form();
	
});

function load_create_ticket_form()
{
	$.ajax({
		url: '/create-ticket'
	}).done(function(response) {
		$('#create-ticket-form').html(response);
	});
}