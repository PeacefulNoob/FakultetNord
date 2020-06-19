@extends('layouts.app')

@section('content')
<main class="myMain">
    <h1 style="color:white;">{{$album->name}}</h1>
    <a class="btn btn-info" href="/admin/">Go Back</a>
    <a class="btn btn-info" href="/admin/photos/upload_p/{{$album->id}}">Upload media</a>
    <hr>
</main>
@endsection