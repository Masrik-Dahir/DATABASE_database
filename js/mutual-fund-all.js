$(document).ready(function(){
	
	$('#table-mutual-fund').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"mutual-fund-action-basic.php",
			type:"POST",
			data:{
					action:'listAllMutualFunds'
				 },
			dataType:"json"
		}
	});
	
});