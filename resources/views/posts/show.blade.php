@extends('layouts.main')
@section('other_pages.css')
<link rel="stylesheet" href="/css/blog.css">
@endsection
@section('content')

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

@yield('other_pages.css')
<div class="postMain">
    <a href="/posts" class="btn btn-default">Go Back</a>
    <div class="section-row p-4 my-4" >
            <h1 class="text-center">{{ $post->title }}</h1>

        <div class="row my-5">

            <div class="col-12">
                <img class="postPic" style="width:100%" src="/images/post_images/{{ $post->cover_image }}">
                <br><br>
            </div>
            <div class="col-12 p-5">
                <div>
                    {!!$post->body!!}
                </div>
            </div>
        </div>
        <hr>
        <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
        <hr>
    </div>

<!-- comments -->
<div class="section-row p-4 my-4">
    <div class="section-title">
        <h3>Comments</h3>
    </div>
    @if($post->comments->count())
        <div class="post-comments">
            <!-- comment -->
            @foreach($post->comments as $comment)
                <div class="media well">
                    <div class="media-left">
                        <img class="media-object" src="/images/post_images/author.png" alt="">
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <h4>{{ $comment->name }}</h4>
                            <span class="time">{{ $comment->created_at->toFormattedDateString() }}</span>
                            <a href="#" class="reply">Reply</a>
                        </div>
                        <p>{{ $comment->body }}</p>
                    </div>
                </div>
            @endforeach
            <!-- /comment -->
        </div>
    @else
        <div class="post-comments">
            <p>No comments</p>
        </div>
    @endif
</div>
<!-- /comments -->

<!-- reply --> 
<div class="section-row p-4 my-4">
    <div class="section-title">
        <h3>Leave a reply</h3>
    </div>
    <form class="post-reply" method="POST" action="/posts/{{ $post->id }}/comments">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 my-3">
                <div class="form-group">
                    <span>Name *</span>
                    <input class="input" type="text" name="name" required>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 my-3">
                <div class="form-group">
                    <span>Email *</span>
                    <input class="input" type="email" name="email" required>
                </div>
            </div>
            <div class="col-md-12 my-3">
                <div class="form-group ">
                    <textarea class="input" name="body" placeholder="Message" required></textarea>
                </div>
                <button class="btn btn-primary btn-md commB ">Submit</button>
            </div>
        </div>
    </form>
</div>
<!-- /reply -->



@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)

        <div class="row w-25 ml-auto">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' =>
                'pull-right'])!!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {!!Form::close()!!}
            </div>
        </div>
    @endif
@endif
</div>

@endsection
