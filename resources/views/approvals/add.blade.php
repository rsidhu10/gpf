@extends('layouts.main')
{{-- @section('stylessheets')
   {!! Html::style('css/parsley.css') !!}
@endsection --}}
@section('content')
   <div class="container" style="text-align: center; margin-top:80px; ">
      <h3>Add New Cases Received in GPF Branch</h3>
   </div>
   <div class="container" style="margin-top: 20px;">   
      {{-- <form method="post" name="save-form" id="save-form"
            data-parsley-validate
            action="{{route('cases.store')}}"> --}}
    <form action="{{ route('approvals.store') }}" method="post">        
		
    	{{ csrf_field() }}
         <!--- Message Starts Here      -->
         @include('partials._messages')
         <!-- Ends Here -->
         <div class="row">
            
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Zone</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Circle</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Division</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Category</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Designation</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>GPF No.</label>
            </div>   
         </div>
         <div class="row">
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="zone_cbo" 
                        name="zone_cbo"  
                        class="form-control form-control-sm"  
                        autofocus="autofocus" required  >
                           
                           <option value="" Selected hidden>Select Zone</option>
                           @foreach($zones as $zone)
                              <option value="{!! $zone->id !!}" {{ old('zone_cbo') ==$zone->id ? 'selected' : '' }} >
                                 {{ $zone->zone_name }}
                              </option>
                           @endforeach
                           

               </select>

            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="circle_cbo"
                        name="circle_cbo"  
                        class="form-control form-control-sm" 
                        autofocus="autofocus" required="true">
                        <option value="">Select Circle</option>    
               </select>   
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="division_cbo" 
                        name="division_cbo"  
                        class="form-control form-control-sm"
                        autofocus="autofocus" required>
                        <option value="">Select Division</option>
               </select>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="category_cbo" 
                        name="category_cbo" 
                        class="form-control form-control-sm"
                        autofocus="autofocus" >
                        <option value="">Select Category</option>
               </select>   
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="designation_cbo"
                        name="designation_cbo"  
                        class="form-control form-control-sm" 
                        autofocus="autofocus" >
                        <option value="">Select Designation</option>
               </select>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
            	<div class="form-group{{ $errors->has('gpf_no_txt') ? 'has-error' : ''}}">
	               <input   id="gpf_no_txt" 
	                        name="gpf_no_txt"  
	                        class="form-control form-control-sm" 
	                        placeholder="GPF No. (e.g : 123)" 
	                        type="text" required>
	                @if($errors->has('gpf_no_txt'))
	                	<span class="help-block">
	                		{{ $errors->first('gpf_no_txt')}}
	                	</span>
             		@endif                 
	            </div>
	        </div>    
         </div>
         <div class="row" style="margin-top: 20px;">
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Letter No.</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Letter Date</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Diary No.</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Diary Date</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Retirement Date</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Case Relates to</label>
            </div>   
         </div>
         <div class="row">
            <div class="col-5 col-sm-2 themed-grid-col">
            	<div class="form-group{{ $errors->has('letter_no_txt') ? 'has-error' : ''}}">
	               <input   id="letter_no_txt" 
                        name="letter_no_txt"  
                        class="form-control form-control-sm" 
                        placeholder="Letter No."
                        value="{{ old('letter_no_txt')}}" 
                        type="text" required >
                @if($errors->has('letter_no_txt'))
                	<span class="help-block">
                		{{ $errors->first('letter_no_txt')}}
                	</span>
             	@endif
             	</div>   	
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <div class="form-group{{ $errors->has('letter_dt_txt') ? 'has-error' : ''}}">
	               <input   id="letter_dt_txt"
	                        name="letter_dt_txt"  
	                        class="form-control form-control-sm"
	                        type="date" required >
	                @if($errors->has('letter_dt_txt'))
	                	<span class="help-block">
	                		{{ $errors->first('letter_dt_txt')}}
	                	</span>
	             	@endif
             	</div>        
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               	<div class="form-group{{ $errors->has('diary_no_txt') ? 'has-error' : ''}}">
	               <input   id="diary_no_txt"
	                        name="diary_no_txt"  
	                        class="form-control form-control-sm"  
	                        placeholder="Diary No." 
	                        type="text" required>
	                @if($errors->has('diary_no_txt'))
	                	<span class="help-block">
	                		{{ $errors->first('diary_no_txt')}}
	                	</span>
	             	@endif
             	</div>         
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               	<div class="form-group{{ $errors->has('diary_dt_txt') ? 'has-error' : ''}}">
               <input   id="diary_dt_txt"
                        name="diary_dt_txt"  
                        class="form-control form-control-sm"
                        type="date" required >
                    @if($errors->has('diary_dt_txt'))
	                	<span class="help-block">
	                		{{ $errors->first('diary_no_txt')}}
	                	</span>
	             	@endif
             	</div>           
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               	<div class="form-group{{ $errors->has('diary_dt_txt') ? 'has-error' : ''}}">
	               	<input  id="retire_dt_txt" 
	                        name="retire_dt_txt" 
	                        class="form-control form-control-sm" 
	                        type="date" required >
                    @if($errors->has('retire_dt_txt'))
	                	<span class="help-block">
	                		{{ $errors->first('retire_dt_txt')}}
	                	</span>
	             	@endif
             	</div>           
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
            	<div class="form-group{{ $errors->has('relatesto_cbo') ? 'has-error' : ''}}">
	               	<select id="relatesto_cbo" 
	                        name="relatesto_cbo" 
	                        class="form-control form-control-sm"
	                        autofocus="autofocus" required>
	                        <option value=""  Selected hidden >Select Relates to</option>
	                        <option value="S1">Rajesh Kumar</option>
	                        <option value="S2">Rakesh Kumar</option>
	                        <option value="S3">Nirmal Singh</option>
	                        <option value="S4">Raj Kumar</option>
	                        <option value="S5">Amardeep Singh</option>
	                        <option value="S6">Shagufta Khan</option>
	                        <option value="S7">Rajinder Kaur</option>
	               </select>
	               @if($errors->has('relatesto_cbo'))
		                	<span class="help-block">
		                		{{ $errors->first('relatesto_cbo')}}
		                	</span>
	             	@endif
             	</div>    
            </div>
         </div>
         <div class="row" style="margin-top: 20px;">
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Financial Year</label>
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
               <label>Reason</label>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <label>Employee Code</label>
            </div>
            <div class="col-6 col-sm-2 themed-grid-col">
               <label>Employee Name</label>
            </div>  
         </div>
         <div class="row">
            <div class="col-5 col-sm-2 themed-grid-col">
            	<div class="form-group{{ $errors->has('sanction_year_cbo') ? 'has-error' : ''}}">
	               	<select id="sanction_year_cbo"
	                        name="sanction_year_cbo"  
	                        class="form-control form-control-sm"
	                        autofocus="autofocus" required>
	                        {{-- <option value=""  Selected hidden >Select Year</option> --}}
	                        <option value="2018-2019" selected="true">2018-2019</option>
	               </select>
	               @if($errors->has('sanction_year_cbo'))
		                	<span class="help-block">
		                		{{ $errors->first('sanction_year_cbo')}}
		                	</span>
		            @endif
             	</div>  
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
            	<div class="form-group{{ $errors->has('reason_cbo') ? 'has-error' : ''}}">
	               	<select id="reason_cbo" 
	                        name="reason_cbo" 
	                        class="form-control form-control-sm"
                        	autofocus="autofocus" required>
	                        <option value=""  Selected hidden >Select Reason</option>
	               </select>
	               @if($errors->has('reason_cbo'))
		                	<span class="help-block">
		                		{{ $errors->first('reason_cbo')}}
		                	</span>
		             @endif
             	</div>  
            </div>
            <div class="col-6 col-sm-2 themed-grid-col">
	            <div class="form-group{{ $errors->has('emp_code_txt') ? 'has-error' : ''}}">
	               	<input   id="emp_code_txt" 
	                        name="emp_code_txt"
	                        class="form-control form-control-sm" 
	                        placeholder="HRMS Employee Code" 
	                        type="text" required > 
	                @if($errors->has('retire_dt_txt'))
		                	<span class="help-block">
		                		{{ $errors->first('emp_code_txt')}}
		                	</span>
		             	@endif
             	</div>              
            </div>
            <div class="col-6 col-sm-4 themed-grid-col">
            	<div class="form-group{{ $errors->has('emp_name_txt') ? 'has-error' : ''}}">	
               		<input  id="emp_name_txt"
	                        name="emp_name_txt" 
	                        class="form-control form-control-sm" 
	                        placeholder="Employee Name" 
	                        type="text" required >
                    @if($errors->has('retire_dt_txt'))
		                	<span class="help-block">
		                		{{ $errors->first('emp_name_txt')}}
		                	</span>
		             	@endif
             	</div>      
            </div>
         </div>
         <div class="row" style="margin-top: 30px;">
               <div class="col-md-5 offset-5 ">
                  <button  id="reset-btn" 
                           name="reset-btn"  
                           class="btn btn-primary btn-sm"
                           type="button" >Reset Form
                  </button>
                  
							<button type="submit" class="btn btn-primary btn-sm">Save Record</button>
				</div>
                  {{-- <button  id="save-btn"
                           name="save-btn" 
                           class="btn btn-primary btn-sm"
                           type="submit">Save Record
                  </button> --}}
		

<script type="text/javascript">
window.load=$(document).ready(function(){
  // $('#save-form').parsley(); 
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

    

    // Save Button

    $('#save-btn').click(function(){
      alert('hi');
        $('#save-btn').attr('disabled', 'disabled');
        // document.getElementById('save-form').submit();
        document.getElementById('save-form').submit();
                $("#save-btn").removeClass('btn-primary');
                $("#save-btn").addClass('btn-success');
                $("#save-btn").text(' Record Saved!');
                var timeoutID = window.setTimeout(function () 
                {
                     //alert('Record Saved');
                    $("#save-btn").removeClass('btn-success');
                    $("#save-btn").addClass('btn-primary');
                    $("#save-btn").text('Save Record');
                    document.location.reload();
                }, 5000);        
        
    });    
});  
</script>


@endsection