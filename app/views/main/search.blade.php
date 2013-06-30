@section('title')
	Search results - 
	@parent
@stop
@section('content')
	@foreach($data as $d)
	<article class="blog">
            <div class="date">{{$d->created_at}}</div>
            <header>
                <h2>{{HTML::link(URL::route('blog_show',array('id'=>$d->id,'slug'=>$d->slug)), $d->title)}}</h2>
            </header>

            <div class="snippet">
                <p>{{{$d->body}}}</p>
                <p class="continue">{{HTML::link(URL::route('blog_show',array('id'=>$d->id,'slug'=>$d->slug)), Lang::get('main.continue_reading'))}}</p>
            </div>

            <footer class="meta">
                <p>Posted by <span class="highlight">{{$d->author}}</span> at {{$d->created_at}}</p>
                <p>Tags: <span class="highlight">{{$d->tags}}</span></p>
            </footer>
        </article>
	@endforeach

@stop