@extends('layouts.app')
@section('content')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>	
	<div class="container" style="text-align: center;">
		<h3>Add New Cases Received in GPF Branch</h3>
	</div>
	<div class="container-fluid" style="width: 90%">
		<form method="post" name="save-form" id="save-form" action="{{route('cases.store')}}">
        	{{ csrf_field() }}
        	<div class="alert alert-success" style="visibility: hidden;" id="message">
            	<p id="result" name="result" style="text-align: center;"></p>
        	</div>
	        {{-- <div>
	            @if(count($errors) > 0)
	                @foreach($errors->all() as $error)
	                    <p class="alert alert-danger">{{$error}}</p>
	                @endforeach
	            @endif    
	        </div> --}}
	   		<div class="table-responsive" id="Combo_details">
		   		<table class="table table-condensed table-striped">
		 			<tr>
		 				<td width="14%" align="left" style="padding-left: 10px;"><span>Zone</span></td>
		 				<td width="17%" align="left"><span>Circle</span></td>
		 				<td width="17%" align="left"><span>Division</span></td>
		 				<td width="17%" align="left"><span>Category</span></td>
		 				<td width="27%" align="left"><span>Designation</span></td>
		 				{{-- <td width="10%" align="center">
		 					<input  type="text" name="division-txt" id="division-txt" style="width: 1px; visibility: hidden; height: 10px;" >
		 					<input  type="text" name="subdivision-txt" id="subdivision-txt" style="width: 1px; visibility: hidden; height: 10px;" >
		 				</td> --}}
		 			</tr>
		 			<tr>
		 				<td>
		 					<select class="form-control input-sm" name="zone_cbo"  id="zone_cbo"  autofocus="autofocus" required  >
							    <option value="" disable="true" Selected hidden>Select Zone</option>
							    @foreach($zones as $zone)

							      <option value="{!! $zone->id !!}" @if(old('zone_cbo') == $zone->id) selected="selected" @endif >{{ $zone->zone_name }}</option>
							    @endforeach
			     			</select>
			     		</td>					
		 				<td>
		 					<select name="circle_cbo" id="circle_cbo" class="form-control input-sm" autofocus="autofocus" required>
							    <option value="">Select Circle</option>
							    
			     			</select>
		 				</td>
		 				<td>
		 					<select name="division_cbo" id="division_cbo"  class="form-control input-sm" autofocus="autofocus" required>
								<option value="">Select Division</option>
							</select>
		 				</td>
		 				<td>
		 					<select name="category_cbo" id="category_cbo" class="form-control input-sm" autofocus="autofocus" required>
								<option value="">Select Category</option>
							</select>
		 				</td>
		 				<td>
		 					<select name="designation_cbo" id="designation_cbo" class="form-control input-sm" autofocus="autofocus" required>
								<option value="">Select Designation</option>
							</select>
		 				</td>
		 				{{-- <td width="10%" align="center">
		 					<button type="button" name="search" id="search" class="btn btn-info input-sm">Search</button>
		 				</td> --}}
		 			</tr>
		 		</table>
		 	</div>
	 		<table class="table table-condensed table-borderless">
                <tr>
                    <th width="15%" >
                        <span>Letter No</span>
                    </th>
                    <th  width="15%" >
                        <span>Letter Date</span>
                    </th>
                    <th width="15%" >
                        <span>Diary No</span>
                    </th>
                    <th width="15%" >
                        <span>Diary Date</span>
                    </th>
                    <th width="15%">
                    	<span>Retirement Date</span>
                    </th>
                    <th width="15%">
                    	<span>Case Relates to</span>
                    </th>
                </tr>
                <tr>  
                    <td>
                        <input class="form-control input-sm" type="text" name="letter_no_txt" id="letter_no_txt" placeholder="Letter No." required value="{{ old('letter_no_txt')}}">
                    </td>
                    <td>
                        <input class="form-control input-sm" type="date" name="letter_dt_txt" id="letter_dt_txt" required value="{{ old('letter_dt_txt')}}" >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="text" name="diary_no_txt" id="diary_no_txt"  placeholder="Diary No." required value="{{ old('diary_no_txt')}}"  >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="date" name="diary_dt_txt" id="diary_dt_txt" required value="{{ old('diary_dt_txt')}}"  >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="date" name="retire_dt_txt" id="retire_dt_txt" required value="{{ old('retire_dt_txt')}}"  >
                    </td>
                    <td>
                        <select name="relatesto_cbo" id="relatesto_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Relates to</option>
                            <option value="{!! 'S1' !!}" @if(old('relatesto_cbo') == 'S1') selected="selected" @endif >{{ 'S1'
                        }}</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="S4">S4</option>
                            <option value="S5">S5</option>
                            <option value="S6">S6</option>
                            <option value="S7">S7</option>

                        </select>
                    </td>
                </tr>
                <tr> 
                 	<th>
                        <span>Employee GPFund No.</span>
                    </th>
                    <th>
                        <span>Employee Code</span>
                    </th>
                    <th  colspan="2">
                        <span>Employee Name</span>
                    </th>
                    <th>
                        <span>Reason of Advance</span>
                    </th>
                </tr>
                <tr>  
                	<td>
                        <input class="form-control input-sm" type="text" name="gpf_no_txt" id="gpf_no_txt" placeholder="GPF No. (e.g : 123)" required value="{{ old('gpf_no_txt')}}">              
                    </td>
                    <td>
                        <input class="form-control input-sm" type="text" name="emp_code_txt" id="emp_code_txt" placeholder="HRMS Employee Code" required value="{{ old('emp_code_txt')}}">       
                    </td>
                    <td colspan="2">
                        <input class="form-control input-sm" type="text" name="emp_name_txt" id="emp_name_txt" placeholder="Employee Name" required value="{{ old('emp_name_txt')}}">
                    </td>
                   	<td>
                        <select name="reason_cbo" id="reason_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Reason</option>
                         {{--    @foreach($motives as $data)
                                <option value="{{$data->id}}">{{$data->motive}}</option>
                            @endforeach --}}
                    </select>
                    </td>    
                    <td>
                        <select name="sanction_year_cbo" id="sanction_year_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Year</option>
                            <option value="2018-2019" selected="true">2018-2019</option>
                            <option value="2019-2020">2019-2020</option>
                        </select>
                    </td>    
                </tr>
				<tr>
                
                    <td colspan="6"  align="center">
                        <div  >
                            <button type="button" name="reset-btn" id="reset-btn" class="btn btn-primary input-sm">Reset</button>
                            <button type="button" name="save-btn" id="save-btn" class="btn btn-primary input-sm">Save</button>
                            <button type="button" class="btn btn-primary input-sm" onclick="window.location='{{ route("cases.index") }}'">Report</button>
                            
                        </div>
                    </td>
                </tr>
            </table>

       {{--  {{ Form::close() }} --}}
    </div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"> 
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>


 {{--  <script src="/resources/js/cases/fill.js"></script> --}}

<script type="text/javascript">
window.load=$(document).ready(function(){
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

	$('#circle_cbo').on('change', function(e){
		var id = e.target.value;
		console.log(id);
		
		$('#division_cbo').empty();
		$('#category_cbo').empty();
		$('#designation_cbo').empty();
		
		$('#designation_cbo').append('<option value="0" disable="true" Selected hidden> Select Designation</option>');
		$('#category_cbo').append('<option value="0" disable="true" Selected hidden> Select Category</option>');
  		$('#division_cbo').append('<option value="0" disable="true" Selected hidden> Select Division </option>');
  		if(id == '10'){
  			;
  			$('#division_cbo').append('<option value="10" selected="true"> Chief Office </option>');
  		}else
  		{
  			
  			$('#division_cbo').append('<option value="11" > SE Office </option>');
		
		$.get("{{ URL::to('case/division?id=')}}" + id,function(data){
			console.log(data);
	  		$.each(data, function(index, dataObj){
    			$('#division_cbo').append('<option value="'+ dataObj.id +'">'+ dataObj.division_name +'</option>');
      		});
		});
		}  	
	});

	$('#circle_cbo').on('change', function(e){
		var id = e.target.value;
		console.log(id);

		$('#category_cbo').empty();
		$('#designation_cbo').empty();
		
		$('#designation_cbo').append('<option value="0" disable="true" Selected hidden> Select Designation</option>');
		$('#category_cbo').append('<option value="0" disable="true" Selected hidden> Select Category</option>');
  		
		$.get("{{ URL::to('case/category')}}", function(data){
			console.log(data);
	  		$.each(data, function(index, dataObj){
    			$('#category_cbo').append('<option value="'+ dataObj.id +'">'+ dataObj.category +'</option>');
      		});
		});  	
	});

	$('#category_cbo').on('change', function(e){
		var id = e.target.value;
		console.log(id);
		$('#designation_cbo').empty();
		$('#designation_cbo').append('<option value="0" disable="true" Selected hidden> Select Designation</option>');
		
		$.get("{{ URL::to('case/designation?id=')}}" + id,function(data){
			console.log(data);
	  		$.each(data, function(index, dataObj){
    			$('#designation_cbo').append('<option value="'+ dataObj.id +'">'+ dataObj.designation +'</option>');
      		});
		});  	
	});

		$('#relatesto_cbo').on('change', function(e){
		var id = e.target.value;
		console.log(id);
		
		$('#reason_cbo').empty();
		$('#reason_cbo').append('<option value="0" disable="true" Selected hidden> Select Reason</option>');
  		
		$.get("{{ URL::to('case/reason')}}", function(data){
			console.log(data);
	  		$.each(data, function(index, dataObj){
    			$('#reason_cbo').append('<option value="'+ dataObj.id +'">'+ dataObj.reason +'</option>');
      		});
		});  	
	});

	// Rest Button
    
    $('#reset-btn').click(function(){
        document.location.reload();
    });	

    // Report Button

    $('#back-btn').click(function(){
    	alert('hi');

    });

    // Save Button

    $('#save-btn').click(function(){
        $('#save-btn').attr('disabled', 'disabled');
        document.getElementById('save-form').submit();
        document.getElementById('save-form').submit();
                $("#save-btn").removeClass('btn-primary');
                $("#save-btn").addClass('btn-success');
                $("#save-btn").text('Saved!');
                var timeoutID = window.setTimeout(function () 
                {
                     alert('Record Saved');
                    $("#save-btn").removeClass('btn-success');
                    $("#save-btn").addClass('btn-primary');
                    $("#save-btn").text('Add New');
                    document.location.reload();
                }, 10000);        
        
    });    
});  
</script>



@endsection