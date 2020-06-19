@extends('layouts.main')
@section('other_pages.css')
<link rel="stylesheet" href="/css/other_pages.css">
@endsection
@section('content')
@yield('other_pages.css')

<h1>{{$title}}</h1>
@if(count($services) > 0)
    <ul class="list-group">
        @foreach($services as $service)
            <li class="list-group-item">{{$service}}</li>
        @endforeach
    </ul>
@endif
@endsection