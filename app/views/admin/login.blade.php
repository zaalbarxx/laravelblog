@section('content')
{{Form::open(array('route'=>'do_login','class'=>'form-inline'))}}
{{Form::label('username',Lang::get('main.form_username'))}}
{{Form::text('username')}}
{{Form::label('password', Lang::get('main.form_password'))}}
{{Form::password('password')}}
{{Form::submit(Lang::get('main.login'),array('class'=>'btn btn-success'))}}
{{Form::close()}}
@stop