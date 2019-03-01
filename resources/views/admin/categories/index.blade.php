@extends('layouts.admin')

@section('content')
    <h1>All Categories</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>

        </tr>
        </thead>
        <tbody>
        @if($categories)
            @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>

        </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop

@section('top_content')
    @include('includes.top')
@stop
