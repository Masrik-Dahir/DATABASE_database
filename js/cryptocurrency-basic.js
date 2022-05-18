$(document).ready(function(){
	
	$('#table-cryptocurrency').DataTable({
		"dom": 'Blfrtip',
		"ordering": false,
		"searching": false,
		"paging": false,
		"responsive": true,
		"ajax":{
			url:"cryptocurrency-action-basic.php",
			type:"POST",
			data:{
					action:'listCryptocurrencies'
				 },
			dataType:"json"
		}
	});
	
});