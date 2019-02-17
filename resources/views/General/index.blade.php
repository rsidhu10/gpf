@extends('layouts.main')

@section('content')
<div class="row" style="margin-top: 80px;"></div>
	
	{!! Form::open(array('route' => 'general.store' ))  !!}
		
			


	<div class="form-group">
	    {{ Form::label('Letter No.', null, ['class' => 'control-label']) }}
	    {{ Form::text('letterno', null, array_merge(['class' => 'form-control-sm'])) }}
	    {{ Form::label('Letter Date.', null, ['class' => 'control-label']) }}
	    {{ Form::date('letterdate', null, array_merge(['class' => 'form-control-sm'])) }}
		{{ Form::label('Dairy No.', null, ['class' => 'control-label']) }}
	    {{ Form::text('dairyno', null, array_merge(['class' => 'form-control-sm'])) }}
	    {{ Form::label('Dairy Date.', null, ['class' => 'control-label']) }}
	    {{ Form::date('dairydate', null, array_merge(['class' => 'form-control-sm'])) }}	


	</div>
	<div class="row">
		{{ Form::submit('Click Me!') }}
	</div>


		{{-- <div class="col-md-4 col-md-offset-1">
			<h4>Register New General Case</h4>
		</div>
		<div class="col-md-4 col-md-offset-1">
			<h4>Register New General Case</h4>
		</div> --}}
	{!! Form::close() !!}	



@stop
