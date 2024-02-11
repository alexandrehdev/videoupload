@extends('layout.principal')

@section('title','Principal')
@include("partials.header")
@section('content')

   {{ $videos->count() }}
    @foreach($videos as $video)
      <video
      id="my-video"
      class="video-js"
      controls
      preload="auto"
      width="640"
      height="264"
      poster="{{ Storage::url($video->thumb) }}"
      data-setup="{}"
  >
    <source src="{{ Storage::url($video->file) }}" type="video/mp4" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>

    @endforeach

    @include("partials.footer")
@endsection

