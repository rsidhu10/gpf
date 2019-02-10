@extends('layouts.main')
@section('content')
   <div class="row">
      <div class="col-md-8 col-md-offset-2">
         <h2>Enter New Case</h2>
         <hr>
          {!! Form::open(['route' => 'approvals/store']) !!}
         {{ Form::label('zone','Zone:',array('class' => 'form-group'))}}
         {{ Form::label('circle','Circle')}}
         {{ Form::label('division','Division:')}}
         {{ Form::text('zone',null,array('class'=>'form-control'))}}
         {{ Form::text('circle',null,array('class'=>'form-control'))}}
         {{ Form::text('division',null,array('class'=>'form-control'))}}
         {{ Form::label('circle','Circle')}}
         {!! Form::close() !!} 
         
         
        
        
      </div>

   </div>
@endsection