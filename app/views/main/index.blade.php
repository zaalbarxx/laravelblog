@section('content')
@if(count($data)>0)
@foreach($data as $d)
        <article class="blog">
            <div class="date"><time datetime="{{$d->created_at}}">{{$d->created_at}}</time></div>
            <header>
                <h2>{{HTML::link(URL::route('blog_show', array('id'=>$d->id,'slug'=>$d->slug)), $d->title)}}</a></h2>
            </header>

            <div class="snippet">
                <p>{{$d->body}}</p>
                <p class="continue">{{HTML::link(URL::route('blog_show', array('id'=>$d->id,'slug'=>$d->slug)), Lang::get('main.continue_reading'))}}
                    @if($d->truncated)@endif</a></p>
            </div>
            <footer class="meta">
                <p>@lang('main.comments') :
                @if(count($d->comment)>0)
                    {{$d->comment[0]->counter}}
                @else 
                    0 
                @endif 
                <a href="#comments"></a></p>
                <p>@lang('main.posted_by') <span class="highlight">{{$d->author}}</span> 
                	@lang('main.date_at') {{$d->created_at}}</p>
                <p>@lang('main.tags'): <span class="highlight">{{$d->tags}}</span></p>
            </footer>
        </article>
@endforeach
@else
@lang('main.no_blogs_found')
@endif
@show