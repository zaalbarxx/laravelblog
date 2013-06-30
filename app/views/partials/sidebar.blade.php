<section class="section">
    <header>
        <h3>@lang('main.search')</h3>
    </header>
	{{Form::open(array('route'=>'do_search','method'=>'GET', 'class'=>'form-search'))}}
	{{Form::text('query',null,array('class'=>'search-input search-query'))}}
	{{Form::submit(Lang::get('main.search'),array('class'=>'btn btn-primary'))}}
	{{Form::close()}}
</section>

<section class="section">
	<header>
        <h3>@lang('main.tag_cloud')</h3>
    </header>
	<p class="tags">
		@if(count($tags)>0)
    		@foreach($tags as $tag)
        		<span class="weight-{{$tag['weight']}}">{{$tag['name']}}</span>
    		@endforeach
		@else
        	<p>@lang('main.no_latest_tags')</p>
        @endif
    </p>
</section>

<section class="section">
    <header>
        <h3>@lang('main.latest_comments')</h3>
    </header>
    @if(count($latest_comments)>0)
	    @foreach($latest_comments as $comment)
	        <article class="comment">
	            <header>
	                <p class="small"><span class="highlight">{{$comment['user']}}</span> @lang('main.commented_on')

	                    {{HTML::link($comment['url'].'#comment-'.$comment['id'], $comment['title'])}}
	                    [<em>
	                        <time datetime="{{$comment['created']}}">{{$comment['created']}}</time>
	                    </em>]
	                </p>
	            </header>
	            <p>{{$comment['comment']}}</p>
	            </p>
	        </article>
	    @endforeach
    @else
        <p>@lang('main.no_latest_comments')</p>
    @endif
</section>