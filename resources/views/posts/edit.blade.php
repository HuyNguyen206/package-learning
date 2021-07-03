@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('posts.update', $post->id)}}" method="post" class="form">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" id="" value="{{old('title', $post->title)}}">
            </div>
            <button type="submit" class="btn btn-info">Update post</button>
        </form>
    </div>

@endsection
