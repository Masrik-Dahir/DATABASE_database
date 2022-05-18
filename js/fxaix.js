$(document).ready(function(){
	
	$('#ttemp').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"fxaix-graph.php",
			type:"POST",
			data:{
					action:'listETFs'
				 },
			dataType:"json"
		}
	});
	
});