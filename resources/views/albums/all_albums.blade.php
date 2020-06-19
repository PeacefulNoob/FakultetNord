@extends('layouts.app')

@section('content')

@if(count($albums)>0)
<main class="main-content1">
  <div class="container-fluid ">

    <div class="row" style="padding-bottom:20px">

      <a class="btn back " href="/admin/"><i class="fa fa-arrow-left" aria-hidden="true"></i> Nazad</a>
    </div>
    <div class="allAlRow">
      @foreach($albums as $album)

      <div class="card" style="width: 22rem;    margin: auto;">
        <a href="/admin/adminMedia/{{$album->id}}">

          <img class="card-img-top allAlimg" src="/images/cover_image/{{$album->cover_image}}" alt="Card image cap">

        </a>
        <div class="card-body">
          <h5 class="card-title" style="text-align: center;">
            {{$album->name}}</h5>
          <div class="row">
            <div class="col-md-6 editAlbum ">
              <a href="/admin/albums/edit_album/{{$album->id}}">
                <button type="button" class="btnEdit">Edit</button>
              </a>
            </div>
            <div class="col-md-6 deleteAlbum ">

              <form action="/admin/albums/delete/{{$album->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <button type="submit" class="btnError1">Delete</button>
              </form>
            </div>
          </div>

        </div>
      </div>

      @endforeach
    </div>
  </div>
</main>
@else
<p style="color:white">No photos</p>
@endif


@endsection