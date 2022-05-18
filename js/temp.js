$(document).ready(function(){
	
	$('#table-temp').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"temp-action.php",
			type:"POST",
			data:{
					action:'listETFs'
				 },
			dataType:"json"
		}
	});
	
});