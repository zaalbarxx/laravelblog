@section('content')
	{{Form::open(array('route'=>array('do_admin_comment_edit',$data->id)))}}
	<div class='form-controls'>
		{{Form::label('user',Lang::get('main.form_author'))}}
		@if($errors->has('user'))
			<div class='error'>{{$errors->first('user')}}
			</div>
		@endif
		{{Form::text('user',$data->author)}}
	</div>
	<div class='form-controls'>
		{{Form::label('body',Lang::get('main.form_comment'))}}
		@if($errors->has('body'))
			<div class='error'>{{$errors->first('body')}}
			</div>
		@endif
		{{Form::textarea('body',$data->comment)}}
	</div>
	<br>
	{{Form::submit(Lang::get('main.form_edit'),array('class'=>'btn btn-success'))}}
	{{Form::close()}}
@stop