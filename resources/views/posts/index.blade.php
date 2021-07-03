@extends('layouts.app')
@section('content')
    <div class="container">
        @can('write post')
        <a href="{{route('posts.create')}}" class="btn btn-primary">Add new post</a>
        @endcan
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Title
                </th>
                <th>
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        @can('edit post')
                        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-success">Edit</a>
                        @endcan
                            @can('delete post')
                                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            @endcan
                        @can('test permission')
                                <a href="{{route('test')}}" class="btn btn-secondary">Test permission</a>
                            @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
