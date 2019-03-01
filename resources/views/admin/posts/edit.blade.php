@extends('layouts.admin');

@section('content')
    @extends('layouts.admin')
@section('content')
    <h1>Edit Post</h1>

    {!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id],'files'=>true]) !!}

    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive" src="{{$post->photo ? asset($post->photo->file) : 'http://place-hold.it/400x400'}}" alt="">
        </div>
        <div class="col-md-9">
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', [''=>'Choose options'] + $categories,null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>


    {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
        </div>

        {!! Form::close() !!}
    </div>
    @include('includes.form_error')
@stop


@stop
