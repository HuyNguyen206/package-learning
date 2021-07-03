@extends('layouts.app')
@section('content')
        <form action="{{route('avatars.store')}}" method="post" class="form" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
                <input name="avatar" type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button class="btn btn-success mt-2">Upload</button>

        </form>
        <div class="row">
        @foreach($avatars as $avatar)
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card h-100" style="width: 18rem;">
                        <img src="{{$avatar->getFullUrl()}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <div class="d-flex justify-content-around">
                                                <form action="{{route('avatars.update', $avatar->id)}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <button type="submit" class="btn"> <i class="text-success fas fa-check fa-2x"></i></button>
                                                </form>
                                                @if(Auth::user()->avatar !== $avatar->getFullUrl('thumb'))
                                                <form action="{{route('avatars.destroy', $avatar->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn"> <i class="text-danger fas fa-trash fa-2x"></i></button>
                                                </form>
                                                @endif
                                                <a target="_blank" href="{{route('avatars.show',  $avatar->id)}}"> <i class="fas fa-eye fa-2x text-secondary"></i></a>
                                                <a href="{{route('avatars.download', $avatar->id)}}">  <i class="fas fa-cloud-download-alt fa-2x"></i></a>

                                            </div>


                        </div>
                    </div>
                </div>
        @endforeach
        </div>
@endsection
