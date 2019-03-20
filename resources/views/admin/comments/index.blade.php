@extends('layouts.admin')
@section('content')
    @if(count($comments)>0)
        <h1>All Comments</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Author</th>
                <th scope="col">Email</th>
                <th scope="col">Body</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
            </tr>
            </thead>
            <tbody>
            @if ($comments)
                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->body}}</td>
                        <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                        <td><a href="">View Replies</a></td>
                        <td>{{$comment->created_at->diffForHumans()}}</td>
                        <td>{{$comment->updated_at->diffForHumans()}}</td>
                        <td>
                            @if($comment->is_active == 1)
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentController@update', $comment->id]])!!}
                                <input type="hidden" name="is_active" value="0">
                                {!! Form::submit('Disapprove',['class'=>'btn btn-success btn-sm']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentController@update', $comment->id]])!!}
                                <input type="hidden" name="is_active" value="1">
                                {!! Form::submit('Approve',['class'=>'btn btn-info btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentController@destroy', $comment->id]])!!}
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    @else
        <h1>No Comments at this time</h1>
    @endif
@stop
