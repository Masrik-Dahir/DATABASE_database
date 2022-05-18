$(document).ready(function(){
	
	$('#table-option').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"option-action-basic.php",
			type:"POST",
			data:{
					action:'listExpiredOptions'
				 },
			dataType:"json"
		}
	});
	
});