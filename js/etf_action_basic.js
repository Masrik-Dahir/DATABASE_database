$(document).ready(function(){
	
	$('#table-employee').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"etf_action_basic.php",
			type:"POST",
			data:{
					action:'listEmployees'
				 },
			dataType:"json"
		}
	});
	
});