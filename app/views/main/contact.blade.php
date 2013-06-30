@section('content')
<h2>Contact LaravelBlog</h2>
Please, fill the form below to leave us a message.
<br><br>
{{Form::open(array('route'=>'do_contact'))}}
<div class='control-group'>
	{{Form::label('name', Lang::get('main.contact_name'), array('class'=>'control-label'))}}
	@if($errors->has('name'))
		<div class='error'>{{$errors->first('name')}}
	</div>
	@endif
	<div class='controls'>
	{{Form::text('name')}}
	</div>
</div>
<div class='control-group'>
	{{Form::label('email', Lang::get('main.contact_email'), array('class'=>'control-label'))}}
	@if($errors->has('email'))
		<div class='error'>{{$errors->first('email')}}
	</div>
	@endif
	<div class='controls'>
	{{Form::text('email')}}
	</div>
</div>
<div class='control-group'>
	{{Form::label('subject', Lang::get('main.contact_subject'), array('class'=>'control-label'))}}
	@if($errors->has('subject'))
		<div class='error'>{{$errors->first('subject')}}</div>
	@endif
	<div class='controls'>
	{{Form::text('subject')}}
	</div>
</div>
<div class='control-group'>
	{{Form::label('message', Lang::get('main.contact_message'), array('class'=>'control-label'))}}
	@if($errors->has('message'))
		<div class='error'>{{$errors->first('message')}}</div>
	@endif
	<div class='controls'>
	{{Form::textarea('message')}}
	</div>
</div>
<div class='control-group'>
	<div class='controls'>
		{{Form::submit(Lang::get('main.submit'),array('class'=>'btn btn-success'))}}
	</div>
	{{Form::close()}}
</div>
@stop