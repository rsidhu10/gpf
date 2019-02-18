@extends('layouts.main')
@section('stylessheets')
   {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
   <div class="container" style="text-align: center; margin-top:20px; ">
      <h3>Add New Cases Received in GPF Branch</h3>
   </div>
   <div class="container" style="margin-top: 10px; font-size: 12px; font-weight: bold">  
      @include('partials._messages')
      @include('partials.errors')

      {!! Form::open(['route' => 'general.store']) !!}
         <div class="row">
            <div class="col-5 col-sm-2 themed-grid-col">
               {{ Form::label('zone','Zone:')}}
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               {{ Form::label('circle','Circle')}}
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               {{ Form::label('division','Division:')}}
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               {{ Form::label('category','Category:')}}
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               {{ Form::label('designation','Designation:')}}
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               {{ Form::label('gpfno','GPF No:')}}
            </div>   
         </div>
         <div class="row">
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="zone_cbo" 
                        name="zone_cbo"  
                        class="form-control form-control-sm"  
                        autofocus="autofocus" required
                        style="font-size: 12px;"  >
                           <option value="" Selected hidden>Select Zone</option>
                           @foreach($zones as $zone)
                              <option value="{!! $zone->id !!}" >
                                 {{ $zone->zone_name }}
                              </option>
                           @endforeach
               </select>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="circle_cbo"
                        name="circle_cbo"  
                        class="form-control form-control-sm" 
                        autofocus="autofocus" required
                        style="font-size: 12px;" >
                        <option value="">Select Circle</option>    
               </select>   
            </div>
            
            <div class="col-5 col-sm-2 themed-grid-col">
                  {{-- {{ Form::select('Select Division', $temp,  array('class' => 'form-control')) }} --}}




               <select  id="division_cbo" 
                        name="division_cbo"  
                        class="form-control form-control-sm"
                        autofocus="autofocus" required
                        style="font-size: 12px;" >
                        <option value="">Select Division</option>
               </select>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="category_cbo" 
                        name="category_cbo" 
                        class="form-control form-control-sm"
                        autofocus="autofocus" required
                        style="font-size: 12px;" >
                        <option value="">Select Category</option>
               </select>   
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <select  id="designation_cbo"
                        name="designation_cbo"  
                        class="form-control form-control-sm" 
                        autofocus="autofocus" required
                        style="font-size: 12px;" >
                        <option value="">Select Designation</option>
               </select>
            </div>
            <div class="col-5 col-sm-2 themed-grid-col">
               <input   id="gpf_no_txt" 
                        name="gpf_no_txt"  
                        class="form-control form-control-sm" 
                        placeholder="GPF No. (e.g : 123)" 
                        type="text" required style="font-size: 12px;" >         
            </div>
         </div>

         <div class="row" style="margin-top: 30px;">
            <div class="col-md-5 offset-5 ">
               <!-- reset buttons -->

               {{ Form::reset('Reset Form'      ,array('class' => 'btn btn-primary btn-sm','id' =>'reset-btn'))}}
               {{ Form::submit('Save Record',array('class' => 'btn btn-primary btn-sm','style' => 'margin-left:10px;'))}}
            </div>
         </div>      
      {!! Form::close() !!} 
   </div>
@endsection
@section('scripts')
   {!! Html::script('js/parsley.min.js') !!}
   {{-- {!! Html::script('js/masterfill.js') !!} --}}

<script type="text/javascript">
   window.load=$(document).ready(function(){
   alert("Why it is not working");
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

   
   $('#reset-btn').click(function(){
      alert('reset click from home');
        document.location.reload();
    });

   
      var consumer_type_array = [];
      consumer_type_array.push({id:0, text:"Residential"});
      consumer_type_array.push({id:1, text:"Commercial"});
      consumer_type_array.push({id:2, text:"Bulk"});
      $("#division_cbo").select2({ placeholder:"Consumer Type", data:consumer_type_array, multiple:false,
          initSelection:function (element, callback) {
              for (current in consumer_type_array) {
                  if (consumer_type_array[current]['id'] == 0) {
                      callback({id:consumer_type_array[current]['id'], text:consumer_type_array[current]['text']});
                      break;
                  }
              }
          }
      });




});
</script>   

@endsection 