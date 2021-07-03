@extends('layouts.app')
@section('content')
    <img class="img-fluid" src="{{$avatar->hasGeneratedConversion('portrait') ?  $avatar->getFullUrl('portrait') : $avatar->getFullUrl('card')}}" alt="">
@endsection
