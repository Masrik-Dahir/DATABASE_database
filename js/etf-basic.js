$(document).ready(function(){
	
	$('#table-etf').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"etf-action-basic.php",
			type:"POST",
			data:{
					action:'listETFs'
				 },
			dataType:"json"
		}
	});
	
});