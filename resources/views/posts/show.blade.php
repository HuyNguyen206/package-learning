@extends('layouts.app')
@section('content')
    <div class="container">
        <post-comments post-id="{{$post->id}}"></post-comments>
        @comments([
        'model' => $post,
        'approved' => true
        ])
    </div>

@endsection
