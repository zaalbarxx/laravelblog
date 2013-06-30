@section('content')
<table id="comments_table">
    @foreach($data as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->author}}</td>
            <td>{{$d->comment}}</td>
            <td>{{HTML::link(URL::route('admin_comment_edit',array('id'=>$d->id)), 'Edit comment')}}</td>
            <td>{{HTML::link(URL::route('do_admin_comment_delete',array('id'=>$d->id)), 'Delete comment')}}</td>
        </tr>
    @endforeach

</table>
@stop