window.load=$(document).ready(function(){
 
    window.load=$(document).ready(function(){
    $('#zone_cbo').on('change', function(e){
      var zone_id = e.target.value;
      console.log(zone_id);
      $('#circle_cbo').empty();
        $('#circle_cbo').append('<option value="0" disable="true" Selected hidden> Select Circle </option>');
        $.get('case-circle?zone_id=' + zone_id,function(data) {
        //$.get("{{ URL::to('case/circle?zone_id=')}}" + zone_id,function(data){
        console.log(data);
          $.each(data, function(index, dataObj){
          $('#circle_cbo').append('<option value="'+ dataObj.id +'">'+ dataObj.circle_name +'</option>');
            });
      });   
  });
});  
});   