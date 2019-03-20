@extends('layouts.admin');

@section('content')
    <h1>All Posts</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Post link</th>
            <th scope="col">Comments</th>
            <th scope="col">Created_at</th>
            <th scope="col">Update_at</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>
                <img height="50" src="{{$post->photo ? asset($post->photo->file) : 'http://place-hold.it/62x62'}}" alt="">
            </td>
            <td><a href="{{route('posts.edit', $post->slug)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td><a href="{{route('posts.index', $post->id)}}">See Post</a></td>
            <td>Comments</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
        </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-12">
            {{$posts->links()}}
        </div>
    </div>
@stop
