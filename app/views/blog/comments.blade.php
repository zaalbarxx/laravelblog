<section class="comments" id="comments">
    <section class="previous-comments">
            <h3>@lang('main.comments')</h3>
    @if(count($data->comment)>0)
        @foreach($data->comment as $c)
            <article class="comment {{$c->cycle}}" id="comment-{{$c->id}}">
                <header>
                    <p><span class="highlight">{{$c->author}}</span> @lang('main.commented') <time datetime="{{$c->created_at}}">{{$c->created_at}}</time></p>
                </header>
                <p>{{$c->comment}}</p>
            </article>
        @endforeach
    @else
        <p>@lang('main.no_comments_for_post')...</p>
    @endif
    </section>
    @if(count($errors)>0)
        <div class="errors">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </div>
    @endif
    {{Form::open(array('route'=>array('comment_add',$data->id)))}}
        <div class='control-group'>
            {{Form::label('user',Lang::get('main.comment_user'))}}
            {{Form::text('user')}}
        </div>
        <div class='control-group'>
            {{Form::label('body',Lang::get('main.comment_comment'))}}
            {{Form::textarea('body')}}
        </div>
        <div class='control-group'>
            {{Form::submit(Lang::get('main.submit'),array('class'=>'btn btn-success'))}}
        </div>
    {{Form::close()}}
</section>