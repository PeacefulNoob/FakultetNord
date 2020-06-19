@extends('layouts.main')
@section('other_pages.css')
<link rel="stylesheet" href="/css/other_pages.css">
@endsection
@section('content')
@yield('other_pages.css')

<div class="site-wrap ">
  <div id="myIndex">

    <div class="jumbotron my-5 ">
      <div class="container alDesc ">
        <div class="gallery_slika">
          <img class="album_cover" src="/images/cover_image/logos/{{$album->logo_image}}" alt="{{$album->logo_image}}">
        </div>
        <div class="gallery_naslov">
          <p>{{$album->description}}</p>
        </div>
      </div>
    </div>
  </div>
  @if(count($photos)>0)
  <main class="main-content ">
    <div class="glavniR h-50 m-auto" id="glavniAl">
      @foreach($photos as $photo)
      @if($photo->media_type == 'png'|| $photo->media_type == 'jpg' || $photo->media_type == 'svg'|| $photo->media_type == 'PNG')

      <div class=" media {{$photo->album_id}}" data-aos="zoom-in-up" data-aos-once="true">
        <div class="mediaDiv glry-img mediap">
          <img class="picInd" data-src="/images/{{$photo->photo}}" data-value="{{$photo->id}}" name="/images/{{$photo->photo}}" alt="{{$photo->title}}">

        </div>
      </div>
      @else
      <div class="media {{$photo->album_id}}" data-aos="zoom-in-up" data-aos-once="true">
        @if($photo->photo == "null")
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$photo->url}}"></iframe>
        </div>
        @endif
      </div>
      @endif
      @endforeach
    </div>
  </main>
  @else
  <div class="h-50">
    <p style="color:white">No media</p>
  </div>
  @endif
</div>
</div>
@endsection