window.load=$(document).ready(function(){
	// alert("hi");
	console.log('Page Loaded Successfully');
	$('#zone_cbo').on('change', function(e){
		var id = e.target.value;
		console.log(id);
		$('#circle_cbo').empty();
		$('#division_cbo').empty();
		$('#category_cbo').empty();
		$('#designation_cbo').empty();
		$('#designation_cbo').append('<option value="0" disable="true" Selected hidden> Select Designation</option>');
		$('#category_cbo').append('<option value="0" disable="true" Selected hidden> Select Category</option>');
		$('#division_cbo').append('<option value="0" disable="true" Selected hidden> Select Division </option>');
		$('#circle_cbo').append('<option value="0" disable="true" Selected hidden> Select Circle </option>');
		$('#circle_cbo').append('<option value="10" > Chief Office </option>');
		$.get("{{ URL::to('case/circle?id=')}}" + id,function(data){
			console.log(data);
			$.each(data, function(index, dataObj){
				$('#circle_cbo').append('<option value="'+ dataObj.id +'">'+ dataObj.circle_name +'</option>');
			});
		});   
	});

	/*	Reset Button Click Function */
	$('#reset-btn').click(function(){
		// alert('reset click');
        document.location.reload();
    });  


});