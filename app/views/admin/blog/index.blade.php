@section('content')
{{HTML::link(URL::route('admin_blog_create'), 'Create new post')}}
<table id="blogs_table">
    @foreach($data as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->title}}</td>
            <td>{{$d->blog}}</td>
            <td>{{HTML::link(URL::route('admin_blog_edit',array('id'=>$d->id)), 'Edit post')}}</td>
            <td>{{HTML::link(URL::route('do_admin_blog_delete',array('id'=>$d->id)), 'Delete post')}}</td>
        </tr>
    @endforeach

</table>
@stop