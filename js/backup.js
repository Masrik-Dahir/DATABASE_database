$(document).ready(function(){
	
	var tableUser = $('#table-user').DataTable({
		"dom": 'Blfrtip',
		"autoWidth": false,
		"processing":true,
		"serverSide":true,
		"pageLength":15,
		"lengthMenu":[[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]],
		"responsive": true,
		"language": {processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>'},
		"order":[],
		"ajax":{
			url:"user-advanced-action.php",
			type:"POST",
			data:{
					action:'listUsers'
				},
			dataType:"json"
		},
		"columnDefs":[ {"targets":[0], "visible":false} ],
		"buttons": [
				{
					extend: 'excelHtml5',
					title: 'Users',
					filename: 'Users',
					exportOptions: {columns: [1,2,3,4]}
				},
				{
					extend: 'pdfHtml5',
					title: 'Users',
					filename: 'Users',
					exportOptions: {columns: [1,2,3,4]}
				},
				{
					extend: 'print',
					title: 'Users',
					filename: 'Users',
					exportOptions: {columns: [1,2,3,4]}
				}]
	});	

    $("#addUser").click(function(){
		$('#user-form')[0].reset();
		$('#user-modal').modal('show');

		$('.modal-title').html("Add User");
		$('#action').val('AddUser');
		$('#save').val('Add');
	});


	$("#deleteUser").click(function(){
		$('#user-form')[0].reset();
		$('#user-modal').modal('show');
		$('.modal-title').html("Delete User");
		$('#action').val('deleteUser');
		$('#save').val('Add');
	});

	
	$("#user-modal").on('submit','#user-form', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		$.ajax({
			url:"user-advanced-action.php",
			method:"POST",
			data:{
				ID: $('#ID').val(),
				action: $('#action').val(),
			},
			success:function(){
				$('#user-modal').modal('hide');
				$('#user-form')[0].reset();
				$('#save').attr('disabled', false);
				tableUser.ajax.reload();
			}
		})
	});	
	
	
	
	$("#table-user").on('click', '.update', function(){
		var ID = $(this).attr("user_id");
		var action = 'getUser';
		$.ajax({
			url:"user-advanced-action.php",
			method:"POST",
			data:{ID:ID, action:action},
			dataType:"json",
			success:function(data){
				$('#user-modal').modal('show');
				$('#ID').val(ID);
				
				$('#first_name').val(data.first_name);
				$('#last_name').val(data.last_name);
				$('#email_address').val(data.email_address);
				$('#date_of_birth').val(data.date_of_birth);

				$('.modal-title').html("Edit User");
				$('#action').val('updateUser');
				$('#save').val('Save');
			}
		})
	});
	
	$("#table-user").on('click', '.delete', function(){
		var ID = $(this).attr("user_id");		
		var action = "deleteUser";
		if(confirm("Are you sure you want to delete this user?")) {
			$.ajax({
                url:"user-advanced-action.php",
				method:"POST",
				data:{ID:ID, action:action},
				success:function() {					
					tableUser.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
});