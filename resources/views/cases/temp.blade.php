@extends('layouts.app')
@section('content')

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>	
	<div class="container" style="text-align: center;"><h3>Add New Cases Received in GPF Branch</h3></div>
	<div class="container-fluid" style="width: 90%">
	<form method="post" name="save-form" id="save-form" action="{{route('cases.store')}}">
        {{ csrf_field() }}
        <div class="alert alert-success" style="visibility: hidden;" id="message">
            <p id="result" name="result" style="text-align: center;"></p>
        </div>
        <div>
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif    
        </div>
   		<div class="table-responsive" id="Combo_details">
	   		<table class="table table-condensed table-striped">
	 			<tr>
				<td   width="14%" align="left" style="padding-left: 10px;"><span>Zone</span></td>
				<td   width="17%" align="left"><span>Circle</span></td>
				<td   width="17%" align="left"><span>Division</span></td>
				<td   width="17%" align="left"><span>Category</span></td>
				<td   width="27%" align="left"><span>Designation</span></td>
	 				{{-- <td width="10%" align="center">
	 					<input  type="text" name="division-txt" id="division-txt" style="width: 1px; visibility: hidden; height: 10px;" >
	 					<input  type="text" name="subdivision-txt" id="subdivision-txt" style="width: 1px; visibility: hidden; height: 10px;" >
	 				</td> --}}
	 			</tr>
	 			<tr>
	 				<td>
	 					<select class="form-control input-sm" name="zone_cbo" id="zone_cbo"  autofocus="autofocus" required>
						    <option value="" disable="true" Selected hidden>Select Zone</option>
						    @foreach($zones as $zone)
						      <option value="{{$zone->id}}">{{$zone->zone_name}}</option>
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
                        <input class="form-control input-sm" type="text" name="letter_no_txt" id="letter_no_txt" placeholder="Letter No." required >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="date" name="letter_dt_txt" id="letter_dt_txt" required >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="text" name="diary_dt_txt" id="diary_dt_txt" placeholder="Diary No." required >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="date" name="diary_dt_txt" id="diary_dt_txt" required >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="date" name="retire_dt_txt" id="retire_dt_txt" required >
                    </td>
                    <td>
                        <select name="relatesto_cbo" id="relatesto_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Relates to</option>
                            <option value="s1">S1</option>
                            <option value="s2">S2</option>
                            <option value="s3">S3</option>
                            <option value="s4">S4</option>
                            <option value="s5">S5</option>
                            <option value="s6">S6</option>
                            <option value="s7">S7</option>

                        </select>
                    </td>
                    {{-- <td>
                        <select name="approvedby_cbo" id="approvedby_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Approved By</option>
                            <option value="1">HOD Office</option>
                            <option value="2">Circle Office</option> 
                        </select>
                    </td> --}}
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
                        <input class="form-control input-sm" type="text" name="gpf_no_txt" id="gpf_no_txt" placeholder="GPF No. (e.g : 123)" required >              
                    </td>
                    <td>
                        <input class="form-control input-sm" type="text" name="emp_code_txt" id="emp_code_txt" placeholder="HRMS Employee Code" required >              
                    </td>
                    <td colspan="2">
                        <input class="form-control input-sm" type="text" name="emp_name_txt" id="emp_name_txt" placeholder="Employee Name" required >
                    </td>


                    <td>
                        <select name="reason_cbo" id="reason_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Reason</option>
                         {{--    @foreach($motives as $data)
                                <option value="{{$data->id}}">{{$data->motive}}</option>
                            @endforeach
 --}}                        </select>
                    </td>    
                    <td>
                        <select name="sanction_year_cbo" id="sanction_year_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Year</option>
                            <option value="2018-2019" selected="true">2018-2019</option>
                            <option value="2019-2020">2019-2020</option>
                        </select>
                    </td>    
                    <td>
                        <input class="form-control input-sm" type="text" name="approved_amt_txt" id="approved_amt_txt" placeholder="Approved Amount"  required >
                    </td>
                    <td>
                        <select name="category_cbo" id="category_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Category</option>
                            <option value="11">ENGG</option>
                            <option value="12">TECH</option>
                            <option value="13">MIN(HQ)</option>
                            <option value="14">MIN(FIELD)</option>
                            <option value="15">MISC</option>
                            <option value="16">PHE/PB</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        <span>Employee GPFund No.</span>
                    </th>
                    <th colspan="2">
                        <span>Employee Name</span>
                    </th>
                    <th>
                        <span>Designation</span>
                    </th>
                </tr>
                <tr>
                    <td>
                        <input class="form-control input-sm" type="text" name="gpf_no_txt" id="gpf_no_txt" placeholder="GPF No. (e.g : 123)" required >              
                    </td>
                    <td colspan="2">
                        <input class="form-control input-sm" type="text" name="emp_name_txt" id="emp_name_txt" placeholder="Employee Name" required >
                    </td>
                    <td>
                        <select name="designation_cbo" id="designation_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Designation</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        <span>Certificate Issued</span>
                    </th>
                    <th>
                        <span>Certificate No</span>
                    </th>
                    <th>
                        <span>Certificate Date</span>
                    </th>
                    <th>
                        <span>Bill No</span>
                    </th>
                </tr>
                <tr>
                    <td>
                        <select name="certificate_cbo" id="certificate_cbo" class="form-control input-sm" autofocus="autofocus" required>
                            <option value=""  Selected hidden >Select Status</option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </td>
                    <td>
                        <input class="form-control input-sm" type="text" name="certificate_no_txt" id="certificate_no_txt" placeholder="Letter No vide which Certificate Issued" required disabled="true" >
                    </td> 
                    <td>
                        <input class="form-control input-sm" type="date" name="certificate_dt_txt" id="certificate_dt_txt"  required disabled="true">
                    </td>
                    <td>
                        <input class="form-control input-sm" type="text" name="bill_no_txt" id="bill_no_txt" placeholder="Bill No." required >
                    </td>  
                </tr>
                <tr>
                    <th>
                        <span>Bill Date</span>
                    </th>
                    <th>
                        <span>Token No</span>
                    </th>
                    <th>
                        <span>Treasury Voucher No</span>
                    </th>
                    <th>
                        <span>Treasury Voucher Date</span>
                    </th>
                </tr>
                <tr>
                    <td>
                        <input class="form-control input-sm" type="date" name="bill_dt_txt" id="bill_dt_txt"  required >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="text" name="token_no_txt" id="token_no_txt" placeholder="Token Number" required >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="text" name="voucher_no_txt" id="voucher_no_txt" placeholder="Treasury Voucher Number" required >
                    </td>
                    <td>
                        <input class="form-control input-sm" type="date" name="voucher_dt_txt" id="voucher_dt_txt"  required >
                    </td>
                </tr>
			




{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
		$('#division_cbo').append('<option value="0" disable="true" Selected hidden> Select Division </option>');
  		$('#circle_cbo').append('<option value="0" disable="true" Selected hidden> Select Circle </option>');
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
		$.get("{{ URL::to('case/division?id=')}}" + id,function(data){
			console.log(data);
	  		$.each(data, function(index, dataObj){
    			$('#division_cbo').append('<option value="'+ dataObj.id +'">'+ dataObj.division_name +'</option>');
      		});
		});  	
	});

	$('#division_cbo').on('change', function(e){
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
		$('#designation_cbo').append('<option value="0" disable="true" Selected hidden> Select Designation new</option>');
		
		$.get("{{ URL::to('case/designation?id=')}}" + id,function(data){
			console.log(data);
	  		$.each(data, function(index, dataObj){
    			$('#designation_cbo').append('<option value="'+ dataObj.id +'">'+ dataObj.designation +'</option>');
      		});
		});  	
	});

});  
</script>



@endsection