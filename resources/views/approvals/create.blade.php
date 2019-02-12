@extends('layouts.main')
@section('stylessheets')
   {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
   <div class="row">
      
      <div class="col-md-8 col-md-offset-2 center ">
         
         <h2 style="margin-top: 20px">Enter New Case</h2>
         <hr>
         @include('partials._messages')

         {!! Form::open(['route' => 'approvals.store', 'data-parsley-validate' =>'']) !!}
            {{ Form::label('zone','Zone:')}}
            {{ Form::text('zone',null,array('class'=>'form-control', 'required' =>''))}}
            {{ Form::label('circle','Circle')}}
            {{ Form::text('circle',null,array('class'=>'form-control' , 'required' =>''))}}
            {{ Form::label('division','Division:')}}
            {{ Form::text('division',null,array('class'=>'form-control' , 'required' =>'', 'data-parsley-type' =>'integer'))}}
            {{ Form::submit('Save',array('class' => 'btn btn-primary btn-lg ', 'style' =>'margin-top:20px'))}}
         {!! Form::close() !!} 
      </div>
   </div>
@endsection
@section('scripts')
   {!! Html::script('js/parsley.min.js') !!}
@endsection