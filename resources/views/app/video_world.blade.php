@extends('layouts.main')
@section('video_world.css')
<link rel="stylesheet" href="/css/video_world.css">

@endsection
@section('content')
@yield('video_world.css')
<div class="site-wrap">

    <div class="row h-25">

    </div>
    <div class="jumbotron ">
        <div class="container">
            <h1>Naš video svijet</h1>
            <hr class="my-4">

            <p>Opis opis Opis opis Opis opis Opis opis</p>
        </div>
    </div>

    @if(count($photos)>0)
    <main class="main-content">

        <div class="glavniR" id="glavni">
            @foreach($photos as $photo)
            @if($photo->media_type == 'png'|| $photo->media_type == 'jpg' || $photo->media_type == 'svg'|| $photo->media_type == 'PNG')
            @else

            <div class="col-sm-6	col-md-4	col-lg-3	col-xl-3   {{$photo->album_id}}" data-aos="zoom-in-up" data-aos-once="true">

                @if($photo->photo == "null")
                <div id="mediaContainer" class="mediaDivV " data-toggle="modal" data-target="#modal1" data-myvalue="https://www.youtube.com/embed/{{$photo->url}}" data-index="{{$photo->id}}">
                    <img class="picInd" src="{{$photo->thumbnail}}" />
                    @else
                    <div id="mediaContainer" class="mediaDivV" data-toggle="modal" data-target="#modal1" data-myvalue="/images/{{$photo->photo}}" data-index="{{$photo->id}}">
                        <img class="picInd" data-src="/images/thumbnail/{{$photo->thumbnail}}" />
                        @endif
                        <span class="ikonica"><img src="/images/Play-BUTTON.svg"></span>
                    </div>
                    <div class="overlay_video">
                        <div class="col-12 ">
                            <h4 class="heading">{{$photo->title}}</h4>

                        </div>
                        <div class="col-12 ">
                            <p>{{$photo->description}}</p>

                        </div>
                    </div>
                </div>
                @endif

                @endforeach
            </div>

    </main>

    @else
    <p style="color:white">No photos</p>
    @endif
</div>
@endsection