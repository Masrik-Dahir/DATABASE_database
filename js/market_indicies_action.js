$(document).ready(function(){
	
	$('#table-option').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"exchange-index-action.php",
			type:"POST",
			data:{
					action:'listWeeklyIndexHistory'
				 },
			dataType:"json"
		}
	});
	
});