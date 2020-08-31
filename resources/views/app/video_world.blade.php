@extends('layouts.main')
@section('video_world.css')
<link rel="stylesheet" href="/css/other_pages.css">

@endsection
@section('content')
@yield('video_world.css')
<div class="site-wrap">

    <div class="jumbotron ">
        <div class="container">
            <h1 class="text-black">Video World</h1>
            <hr class="my-4">

            <p class="text-black">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
        </div>
    </div>

    @if(count($photos)>0)
    <main class="main-content">

        <div class="glavniR" id="glavni">
            @foreach($photos as $photo)
            @if($photo->media_type == 'png'|| $photo->media_type == 'jpg' || $photo->media_type == 'svg'|| $photo->media_type == 'PNG')
            @else

                <div class="videos col-xl-6 col-lg-6 col-md-6 col-sm-12 grid__post p-3 " data-aos="zoom-in-up" data-aos-once="true">
                    <div class="video__inner">
                        <div class="video__image "  id="mediaContainer" data-toggle="modal" data-target="#modal1" data-myvalue="https://www.youtube.com/embed/{{$photo->url}}" data-index="{{$photo->id}}">
                            <img src="{{$photo->thumbnail}}" alt="Post">
                        </div>
                        <div class="video__content">
                            <span class="ikonica"><img src="/images/Play-BUTTON.svg"></span>
                            <h2 class="video__title">
                                {{$photo->title}}
                            </h2>
                            <div class="video__meta">
                                        {{$photo->description}}
                            </div>
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