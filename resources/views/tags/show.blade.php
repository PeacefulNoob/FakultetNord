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
@if(count($tags->posts) > 0)

@foreach($tags->posts as $post)
    <!-- post -->
    <div class="postMain">

        <div class="col-md-12">
            <div class="post post-row">
                <a class="post-img" href="/posts/{{ $post->id }}"><img src="/posts/{{ $post->cover_image }}"
                        alt=""></a>
                <div class="post-body">
                    <div class="post-meta">


                        <span class="post-date">{{ $post->created_at->toFormattedDateString() }}</span>
                    </div>
                    <h3 class="post-title"><a href="/posts/{{ $post->id }}"> {!!$post->title!!}</a></h3>
                    <p> {!!$post->body!!}</p>
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


@endsection
