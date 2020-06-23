<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Nord Photography and Video Production">
    <meta name="keywords" content="camera,photo,nord,pixels">
    <meta name="author" content="QQRIQ PeacefulNoob">

    <meta property="og:image" content="https://nordpixels.me/images/nordLogoK.png" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://nordpixels.me/" />
    <meta property="og:title" content="Nord Photography and Video Production" />
    <meta property="og:description" content="Nord Photography and Video Production" />

    <link rel="icon" type="image/png" href="/images/Bar-ikonica.png" />
    <link rel="apple-touch-icon-precomposed" href="/images/Bar-ikonica.png" type="image/png" sizes="152x152" />
    <link rel="apple-touch-icon-precomposed" href="/images/Bar-ikonica.png" type="image/png" sizes="120x120" />
    <link rel="apple-touch-icon" href="/images/Bar-ikonica.png" sizes="180x180" />


    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/gallery.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title> Nord </title>
    {!! htmlScriptTagJsApi([
    'action' => 'homepage',
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch'
    ]) !!}
</head>

<body>


    <div id="loader-wrapper">
        <img id="loader" src="/images/animacija/minic.gif " />
    </div>

    @include('layouts.modal')



    @include('layouts.header')
    @include('layouts.messages')
    @yield('content')
    <a href="#" class="scrollToTop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

    @include('layouts.footer')
</body>


</html>
