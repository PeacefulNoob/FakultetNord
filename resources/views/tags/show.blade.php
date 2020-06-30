@extends('layouts.main')
@section('other_pages.css')
<link rel="stylesheet" href="/css/blog.css">
@endsection
@section('content')

@yield('other_pages.css')
<nav class="navbar navbar-expand-md navbar-fixed-top adminNav" id="adminNav1">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a id="navbarDropdown" style="color:white;" class="nav-link " href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>
                    <li class="nav-item" style="margin: auto;">
                        <img class="adminIkonica" src="/images/2profil.svg" />
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:white;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Odjavi se') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="myMain ">
<h1>{{$tags->name}}</h1>
<div class="row_articles m-5">

@if(count($tags->posts) > 0)

@foreach($tags->posts as $post)
    <!-- post -->
    <div class="article col-xl-6 col-lg-6 col-md-6 col-sm-12 grid__post p-3 ">
        <div class="article__inner">
            <a class="article__image" href="/posts/{{ $post->id }}">
                <img src="/images/post_images/{{ $post->cover_image }}" alt="Post">
            </a>
            <div class="article__content">
                <div class="article__author">
                    <small> {{ $post->user->name }}</small>

                </div>
                <h2 class="article__title">
                    {{ $post->title }}
                </h2>
                <div class="article__meta">
                    <div class="article-tags">
                        <div class="article-tags__box">
                            <a href="/tag/travel/"> {{$tags->name}}</a>
                        </div>
                    </div>
                    <span class="article__date">{{ $post->created_at }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /post -->
    @endforeach
@else
<div class="postMain">

    <div class="col-md-12">
        <h1> Tag has no posts</h1>
    </div>
</div>
@endif
</div>
</div>
@endsection
