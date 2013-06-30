@section('title')
{{$blog->title}} -
@parent
@stop

 @section('content')
   <article class="blog">
        <header>
            <div class="date"><time datetime="{{$blog->created_at}}">{{$blog->created_at}}</time></div>
            <h2>{{$blog->title}}</h2>
        </header>
        <div>
            <p>{{$blog->body}}</p>
        </div>
        <footer class="meta">
       		<p>@lang('main.posted_by') <span class="highlight">{{$blog->author}}</span> 
       		@lang('main.date_at') {{$blog->created_at}}</p>
       		<p>@lang('main.tags'): <span class="highlight">{{$blog->tags}}</span></p>
        </footer>
    </article>
@include('blog.comments')
@stop