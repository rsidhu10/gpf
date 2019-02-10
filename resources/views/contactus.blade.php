@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12">
			</br></br></br>
			<h1>Contact Us</h1>
			<form>
				<div class="form-group">
					<label id="email" name="email">Email:</label>
					<input type="email" id="email" name="email" class="form-control" >
				</div>
				<div class="form-group">
					<label id="subject" name="subject">Subject:</label>
					<input type="text" id="subject" name="subject" class="form-control">
				</div>
				<div class="form-group">
					<label id="message" name="message">Message:</label>
					<textarea type="text" id="message" name="message" class="form-control">Type your message Here
					</textarea> 	
				</div>
				<div class="form-group">
					<input type="subject" name="submit" class="btn btn-success" value="Send Message"> 	
				</div>
			</form>
		</div>
	</div>

@endsection