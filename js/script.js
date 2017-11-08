$(document).ready(function(){
	$("#close_mod").click(function(){
		$(".modal").addClass("exit_modal");
		$(".modal").removeClass("show_modal");

	});
	$('#clickme').click(function(){
		$(".modal").removeClass("exit_modal");
		$(".modal").addClass("show_modal");
	});
	
	$('#search_button').click(function(){
		var val= $("#search_text").val();
		
		get_result_set(val, get_type());

		$(".modal").removeClass("exit_modal");
		$(".modal").addClass("show_modal");
	});

	$('#insert_button').click(function(){
		var name = $("#insert_name").val();
		var email = $("#insert_email").val();
		var description = $("#insert_description").val();
		var tags = $("#insert_tags").val();
		
		send_to_database(get_type(), name, email, description, tags);
	});
});