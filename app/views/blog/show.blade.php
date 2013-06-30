 @section('content')
   <article class="blog">
        <header>
            <div class="date"><time datetime="{{$data->created_at}}">{{$data->created_at}}</time></div>
            <h2>{{$data->title}}</h2>
        </header>
        <div>
            <p>{{$data->body}}</p>
        </div>
        <footer class="meta">
       		<p>@lang('main.posted_by') <span class="highlight">{{$data->author}}</span> 
       		@lang('main.date_at') {{$data->created_at}}</p>
       		<p>@lang('main.tags'): <span class="highlight">{{$data->tags}}</span></p>
        </footer>
    </article>
@include('blog.comments')
@stop