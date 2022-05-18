$(document).ready(function(){
	
	var tableExchange = $('#table-exchange').DataTable({
		"dom": 'Blfrtip',
		"autoWidth": false,
		"processing":true,
		"serverSide":true,
		"pageLength":15,
		//"lengthMenu":[[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]],
		"responsive": true,
		"language": {processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>'},
		"order":[],
		"ajax":{
			url:"exchange-action.php",
			type:"POST",
			data:{
					action:'listExchanges'
				},
			dataType:"json"
		},
		"buttons": [
				{
					extend: 'excelHtml5',
					title: 'Exchanges',
					filename: 'Exchanges',
					exportOptions: {columns: [0,1,2]}
				},
				{
					extend: 'pdfHtml5',
					title: 'Exchanges',
					filename: 'Exchanges',
					exportOptions: {columns: [0,1,2]}
				},
				{
					extend: 'print',
					title: 'Exchanges',
					filename: 'Exchanges',
					exportOptions: {columns: [0,1,2]}
				}]
	});	
	
	/*$("#addExchange").click(function(){
		$('#exchange-form')[0].reset();
		$('#exchange-modal').modal('show');
		$('.modal-title').html("Add Exchange");
		$('#action').val('addExchange');
		$('#save').val('Add');
	});
	
	$("#exchange-modal").on('submit','#-form', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		$.ajax({
			url:"exchange-action.php",
			method:"POST",
			data:{
				ID: $('#ID').val(),
				firstname: $('#firstname').val(),
				lastname: $('#lastname').val(),
				email: $('#email').val(),
				salary: $('#salary').val(),
				department: $('#department').val(),
				manager: $('#manager').val(),
				job: $('#job').val(),
				action: $('#action').val(),
			},
			success:function(){
				$('#exchange-modal').modal('hide');
				$('#exchange-form')[0].reset();
				$('#save').attr('disabled', false);
				tableExchange.ajax.reload();
			}
		})
	});		
	
	$("#table-exchange").on('click', '.update', function(){
		var ID = $(this).attr("emp_id");
		var action = 'getExchange';
		$.ajax({
			url:'exchange-action.php',
			method:"POST",
			data:{ID:ID, action:action},
			dataType:"json",
			success:function(data){
				$('#exchange-modal').modal('show');
				$('#ID').val(ID);
				$('#firstname').val(data.first_name);
				$('#lastname').val(data.last_name);
				$('#email').val(data.email);
				$('#salary').val(data.salary);
				$('#department').val(data.department_ID);
				$('#manager').val(data.manager_ID);
				$('#job').val(data.job_ID);
				$('.modal-title').html("Edit Exchange");
				$('#action').val('updateExchange');
				$('#save').val('Save');
			}
		})
	});
	
	$("#table-exchange").on('click', '.delete', function(){
		var ID = $(this).attr("emp_id");		
		var action = "deleteExchange";
		if(confirm("Are you sure you want to delete this exchange?")) {
			$.ajax({
				url:'exchange-action.php',
				method:"POST",
				data:{ID:ID, action:action},
				success:function() {					
					tableExchange.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});*/
});