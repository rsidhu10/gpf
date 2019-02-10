@extends('layouts.main')
@section('content')
   <div class="row">
      
      <div class="col-md-8 col-md-offset-2 center ">
         
         <h2 style="margin-top: 80px">Enter New Case</h2>
         <hr>
         {!! Form::open(['route' => 'approvals.store']) !!}
            {{ Form::label('zone','Zone:')}}
            {{ Form::text('zone',null,array('class'=>'form-control'))}}
            {{ Form::label('circle','Circle')}}
            {{ Form::text('circle',null,array('class'=>'form-control'))}}
            {{ Form::label('division','Division:')}}
            {{ Form::text('division',null,array('class'=>'form-control'))}}
            {{ Form::submit('Save',array('class' => 'btn btn-primary btn-lg ', 'style' =>'margin-top:20px'))}}
         {!! Form::close() !!} 
      </div>
   </div>
@endsection