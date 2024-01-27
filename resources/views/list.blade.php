@extends('layout.principal')

@section('title','Principal')
@include("partials.header")
@section('content')


    @foreach($videos as $video)

    <video width="400" controls>
        <source src="{{ Storage::url($video->file) }}" type="video/mp4">
        Your browser does not support HTML video.
      </video>

    @endforeach


@endsection