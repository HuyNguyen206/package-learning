@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{route('posts.store')}}" method="post" class="form">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" id="">
            </div>
            <button type="submit" class="btn btn-primary">Create post</button>
        </form>
    </div>

@endsection
