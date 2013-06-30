@section('content')
	@if($mode=='create')
		{{Form::open(array('route'=>'do_admin_blog_create'))}}
		<div class="form-controls">
			{{Form::label('author',Lang::get('main.form_author'))}}
		@if($errors->has('name'))
			<div class='error'>{{$errors->first('name')}}
			</div>
		@endif
			{{Form::text('author',null,array('class'=>'input-xxlarge'))}}
		</div>
		<div class="form-controls">
			{{Form::label('title',Lang::get('main.form_title'))}}
					@if($errors->has('title'))
			<div class='error'>{{$errors->first('title')}}
			</div>
		@endif
			{{Form::text('title',null,array('class'=>'input-xxlarge'))}}
		</div>
		<div class="form-controls">
			{{Form::label('blog',Lang::get('main.form_blog'))}}
					@if($errors->has('blog'))
			<div class='error'>{{$errors->first('blog')}}
			</div>
		@endif
			{{Form::textarea('blog',null,array('class'=>'input-xxlarge'))}}
		</div>
		<div class="form-controls">
			{{Form::label('tags',Lang::get('main.form_tags'))}}
					@if($errors->has('tags'))
			<div class='error'>{{$errors->first('tags')}}
			</div>
		@endif
			{{Form::text('tags',null,array('class'=>'input-xxlarge'))}}
		</div>
		{{Form::submit(Lang::get('main.form_create'), array('class'=>'btn btn-success'))}}
		{{Form::close()}}
	@else
		{{Form::open(array('route'=>array('do_admin_blog_edit',$data->id)))}}
		<div class="form-controls">
			{{Form::label('author',Lang::get('main.form_author'))}}
					@if($errors->has('author'))
			<div class='error'>{{$errors->first('author')}}
			</div>
		@endif
			{{Form::text('author',$data->author,array('class'=>'input-xxlarge'))}}
		</div>
		<div class="form-controls">
			{{Form::label('title',Lang::get('main.form_title'))}}
					@if($errors->has('title'))
			<div class='error'>{{$errors->first('title')}}
			</div>
		@endif
			{{Form::text('title',$data->title,array('class'=>'input-xxlarge'))}}
		</div>
		<div class="form-controls">
			{{Form::label('blog',Lang::get('main.form_blog'))}}
					@if($errors->has('blog'))
			<div class='error'>{{$errors->first('blog')}}
			</div>
		@endif
			{{Form::textarea('blog',$data->body,array('class'=>'input-xxlarge'))}}
		</div>
		<div class="form-controls">
			{{Form::label('tags',Lang::get('main.form_tags'))}}
					@if($errors->has('tags'))
			<div class='error'>{{$errors->first('tags')}}
			</div>
		@endif
			{{Form::text('tags',$data->tags,array('class'=>'input-xxlarge'))}}
		</div>
		{{Form::submit(Lang::get('main.form_edit'), array('class'=>'btn btn-success'))}}
		{{Form::close()}}
	@endif

@stop
