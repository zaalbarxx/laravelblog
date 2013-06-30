@section('content')
<div class='admin-index container'>
	<div class='span2'>
		<a href='{{URL::route('admin_blog_index')}}'>{{HTML::image('img/blog-icon.png','image')}}</a>
		MANAGE BLOGS
	</div>

	<div class="span2">
		<a href='{{URL::route('admin_comment_index')}}'>{{HTML::image('img/comment-icon.png','image')}}</a>
		MANAGE COMMENTS
</div>
@stop
